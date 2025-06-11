<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pages extends MY_Controller
{
    public function index()
    {
        $pages = $this->Pages_model->getAllPages();
        foreach ($pages as &$page) {
            $page['tags'] = $this->Pages_model->getTagsArrayForPage($page['id']);
        }
        $data['pages'] = $pages;
        $data['categories'] = $this->db->get('cmsSID_categories')->result_array();
        $this->load->view('cms/pages', $data);
    }
    public function view($slug = null)
    {
        $page = $this->Pages_model->getPageBySlug($slug);
        if (!$page) {
            show_404();
        }
        $data['page'] = $page;
        $this->load->view('cms/page_view', $data); // Optional admin preview page
    }
    public function render_by_path()
    {
        $path = implode('/', $this->uri->segments);
        $page = $this->Pages_model->getPageByPath($path);
        if (!$page || $page['status'] !== 'published') {
            show_404();
        }
        $data['page'] = $page;
        $template = $page['template'] ?? 'default';
        $this->load->view("pages/{$template}", $data);
    }
    public function save()
    {
        // 1. Normalize parent path (split, slugify each segment)
        $rawParent = trim($this->input->post('parent_path') ?? '', " \t\n\r\0\x0B/\\,");
        // Accept commas, backslashes, and slashes as delimiters
        $segments = preg_split('#[\/\\\\,]+#', $rawParent);
        // Slugify each segment (remove blanks)
        $segments = array_filter(array_map(function ($seg) {
            return url_title($seg, 'dash', true);
        }, $segments));
        $parentPath = implode('/', $segments);
        // 2. Normalize slug (user may provide blank)
        $rawSlug = trim($this->input->post('slug') ?? '');
        if ($rawSlug !== '') {
            $slug = url_title($rawSlug, 'dash', true);
        } else {
            // If parentPath exists, get last segment, else fallback to 'untitled'
            $lastSegment = $parentPath ? basename($parentPath) : 'untitled';
            $slug = url_title($lastSegment, 'dash', true);
        }
        // 3. Build the path (no double or leading/trailing slashes)
        $path = $parentPath ? "$parentPath/$slug" : $slug;
        $path = preg_replace('#/+#', '/', $path); // collapse accidental doubles
        $path = trim($path, '/'); // remove leading/trailing slashes
        $tags = $this->input->post('tags');
        $category_id = $this->input->post('category_id');
        $new_category = trim($this->input->post('new_category'));
        if ($category_id === 'add_new' && $new_category !== '') {
            // Prevent duplicate categories (case-insensitive match)
            $existing = $this->db->where('LOWER(name)', strtolower($new_category))->get('cmsSID_categories')->row_array();
            if ($existing) {
                $category_id = $existing['id'];
            } else {
                $this->db->insert('cmsSID_categories', [
                    'name' => $new_category,
                    'slug' => url_title($new_category, 'dash', true)
                ]);
                $category_id = $this->db->insert_id();
            }
        } elseif ($category_id === 'add_new') {
            $category_id = null;
        }
        $status = $this->input->post('status');
        $published_at = ($status === 'published') ? date('Y-m-d H:i:s') : null;
        $data = [
            'title'            => $this->input->post('title'),
            'path'             => $path,
            'slug'             => $slug,
            'h1'               => $this->input->post('h1'),
            'meta_description' => $this->input->post('meta_description'),
            'template'         => $this->input->post('template'),
            'page_type'        => $this->input->post('page_type'),
            'status' => $status,
            'published_at' => $published_at,
            'body'             => $this->input->post('body'),
            'category_id'      => $category_id ?: null,
            'user_id'          => $this->session->userdata('user_id'),
            'created_at'       => date('Y-m-d H:i:s'),
            'updated_at'       => date('Y-m-d H:i:s')
        ];
        if ($this->Pages_model->insertPage($data)) {
            if ($tags) {
                $this->Pages_model->insertTagsForPage($tags, $slug);
            }
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => 'Page and tags saved successfully!',
                    'slug' => $slug,
                    'path' => $path
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Failed to save page.'
                ]));
        }
    }
    public function delete()
    {
        $ids = $this->input->post('page_ids');
        if (!is_array($ids) || empty($ids)) {
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'No page IDs provided']));
        }
        $this->load->model('Pages_model');
        $deleted = 0;
        foreach ($ids as $id) {
            if ($this->Pages_model->deletePage($id)) {
                $deleted++;
            }
        }
        return $this->output->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => 'success',
                'message' => "$deleted page(s) deleted"
            ]));
    }
    public function get($id)
    {
        $page = $this->Pages_model->getPageById($id); // Create this method if you don't have it
        if (!$page) {
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Page not found.']));
        }
        // Optionally add tags as comma-separated if you store them separately
        $page['tags'] = $this->Pages_model->getTagsForPage($id); // Implement as needed
        return $this->output->set_content_type('application/json')
            ->set_output(json_encode(['status' => 'success', 'data' => $page]));
    }
    public function update()
    {
        $id = $this->input->post('id'); // <-- Get the page ID from the form
        // 1. Normalize parent path (split, slugify each segment)
        $rawParent = trim($this->input->post('parent_path') ?? '', " \t\n\r\0\x0B/\\,");
        // Accept commas, backslashes, and slashes as delimiters
        $segments = preg_split('#[\/\\\\,]+#', $rawParent);
        // Slugify each segment (remove blanks)
        $segments = array_filter(array_map(function ($seg) {
            return url_title($seg, 'dash', true);
        }, $segments));
        $parentPath = implode('/', $segments);
        // 2. Normalize slug (user may provide blank)
        $rawSlug = trim($this->input->post('slug') ?? '');
        if ($rawSlug !== '') {
            $slug = url_title($rawSlug, 'dash', true);
        } else {
            // If parentPath exists, get last segment, else fallback to 'untitled'
            $lastSegment = $parentPath ? basename($parentPath) : 'untitled';
            $slug = url_title($lastSegment, 'dash', true);
        }
        // 3. Build the path (no double or leading/trailing slashes)
        $path = $parentPath ? "$parentPath/$slug" : $slug;
        $path = preg_replace('#/+#', '/', $path); // collapse accidental doubles
        $path = trim($path, '/'); // remove leading/trailing slashes
        $tags = $this->input->post('tags');
        $category_id = $this->input->post('category_id');
        $new_category = trim($this->input->post('new_category'));
        if ($category_id === 'add_new' && $new_category !== '') {
            // Prevent duplicate categories (case-insensitive match)
            $existing = $this->db->where('LOWER(name)', strtolower($new_category))->get('cmsSID_categories')->row_array();
            if ($existing) {
                $category_id = $existing['id'];
            } else {
                $this->db->update('cmsSID_categories', [
                    'name' => $new_category,
                    'slug' => url_title($new_category, 'dash', true)
                ]);
                $category_id = $this->db->update_id();
            }
        } elseif ($category_id === 'add_new') {
            $category_id = null;
        }
        $data = [
            'title'            => $this->input->post('title'),
            'path'             => $path,
            'slug'             => $slug,
            'h1'               => $this->input->post('h1'),
            'meta_description' => $this->input->post('meta_description'),
            'template'         => $this->input->post('template'),
            'page_type'        => $this->input->post('page_type'),
            'status'           => $this->input->post('status'),
            'body'             => $this->input->post('body'),
            'category_id'      => $category_id ?: null,
            'user_id'          => $this->session->userdata('user_id'),
            'updated_at'       => date('Y-m-d H:i:s') // Don't touch created_at!
        ];
        if ($this->Pages_model->updatePage($id, $data)) {
            if ($tags) {
                $this->Pages_model->updateTagsForPage($tags, $id);
            }
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => 'Page updated successfully!',
                    'slug' => $slug,
                    'path' => $path
                ]));
        } else {
            return $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Failed to update page.'
                ]));
        }
    }
    public function toggle_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if (!$id || !in_array($status, ['published', 'draft'])) {
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'error', 'message' => 'Invalid input.']));
        }
        // Set published_at based on status
        $published_at = ($status === 'published') ? date('Y-m-d H:i:s') : null;
        if ($this->Pages_model->updatePageStatus($id, $status, $published_at)) {
            return $this->output->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'message' => 'Status updated.',
                    'published_at' => $published_at // <--- Add this for front-end use
                ]));
        }
        return $this->output->set_content_type('application/json')
            ->set_output(json_encode(['status' => 'error', 'message' => 'Failed to update status.']));
    }
    public function show_404()
    {
        // Set the proper HTTP status header
        $this->output->set_status_header('404');
        // Load your custom 404 view
        $this->load->view('errors/html/my_404');
    }
}

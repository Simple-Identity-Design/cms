<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pages extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Pages_model', 'blog_model']);
    }
    // --- VIEWS ---
    public function index()
    {
        $pages = $this->Pages_model->getAllPages();
        foreach ($pages as &$page) {
            $page['tags'] = $this->Pages_model->getTagsArrayForPage($page['id']);
        }
        $data = [
            'pages' => $pages,
            'categories' => $this->db->get('cmsSID_categories')->result_array(),
            'latest_blogs' => $this->blog_model->getBlogs(5)
        ];
        $this->load->view('cms/pages', $data);
    }
    public function view($slug = null)
    {
        $page = $this->Pages_model->getPageBySlug($slug);
        if (!$page) {
            show_404();
        }
        $data = [
            'page' => $page,
            'latest_blogs' => $this->blog_model->getBlogs(5)
        ];
        $this->load->view('cms/page_view', $data);
    }
    public function render_by_path()
    {
        $path = implode('/', $this->uri->segments);
        $page = $this->Pages_model->getPageByPath($path);
        if (!$page || $page['status'] !== 'published') {
            show_404();
        }
        $data = [
            'page' => $page,
            'latest_blogs' => $this->blog_model->getBlogs(5)
        ];
        $template = $page['template'] ?? 'default';
        $this->load->view("pages/{$template}", $data);
    }
    public function create()
    {
        $data = [
            // Pass an empty page array for defaults (fields should match your form structure)
            'page' => [
                'id' => '',
                'title' => '',
                'slug' => '',
                'path' => '',
                'h1' => '',
                'meta_description' => '',
                'template' => 'default',
                'page_type' => '',
                'status' => 'draft',
                'body' => '',
                'category_id' => '',
                'featured_image_path' => '',
            ],
            'tags' => [],
            'categories' => $this->db->get('cmsSID_categories')->result_array(),
            'latest_blogs' => $this->blog_model->getBlogs(5)
        ];
        $this->load->view('cms/add-page', $data);
    }
    public function edit($id)
    {
        $page = $this->Pages_model->getPageById($id);
        if (!$page) show_404();
        $data = [
            'page' => $page,
            'tags' => $this->Pages_model->getTagsArrayForPage($id),
            'categories' => $this->db->get('cmsSID_categories')->result_array(),
            'latest_blogs' => $this->blog_model->getBlogs(5)
        ];
        $this->load->view('cms/edit-page', $data);
    }
    public function content_editor($id)
    {
        $page = $this->Pages_model->getPageById($id);
        if (!$page) show_404();
        $data = ['page' => $page];
        $this->load->view('cms/page_content_editor', $data);
    }
    // --- CRUD: AJAX/API-LIKE HANDLERS ---
    public function save()
    {
        list($parentPath, $slug, $path) = $this->_normalize_path_slug();
        $category_id = $this->_resolve_category($this->input->post('category_id'), trim($this->input->post('new_category')));
        $tags = $this->input->post('tags');
        $status = $this->input->post('status');
        $published_at = ($status === 'published') ? date('Y-m-d H:i:s') : null;
        $data = [
            'title' => $this->input->post('title'),
            'path' => $path,
            'slug' => $slug,
            'h1' => $this->input->post('h1'),
            'meta_description' => $this->input->post('meta_description'),
            'template' => $this->input->post('template'),
            'page_type' => $this->input->post('page_type'),
            'status' => $status,
            'published_at' => $published_at,
            'body' => $this->input->post('body'),
            'category_id' => $category_id ?: null,
            'user_id' => $this->session->userdata('user_id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if ($this->Pages_model->insertPage($data)) {
            $page_id = $this->db->insert_id(); // <-- GET THE ID
            if ($tags) $this->Pages_model->insertTagsForPage($tags, $page_id); // PASS THE ID!
            return $this->_json_success([
                'message' => 'Page and tags saved successfully!',
                'slug' => $slug,
                'path' => $path
            ]);
        }
        return $this->_json_error('Failed to save page.');
    }
    public function update()
    {
        file_put_contents(FCPATH . 'debug.txt', print_r($_FILES, true));
        $id = $this->input->post('id');
        list($parentPath, $slug, $path) = $this->_normalize_path_slug();
        $category_id = $this->_resolve_category($this->input->post('category_id'), trim($this->input->post('new_category')));
        $tags = $this->input->post('tags');
        $data = [
            'title' => $this->input->post('title'),
            'path' => $path,
            'slug' => $slug,
            'h1' => $this->input->post('h1'),
            'meta_description' => $this->input->post('meta_description'),
            'template' => $this->input->post('template'),
            'page_type' => $this->input->post('page_type'),
            'status' => $this->input->post('status'),
            'body' => $this->input->post('body'),
            'category_id' => $category_id ?: null,
            'user_id' => $this->session->userdata('user_id'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        // Handle featured image upload if present
        if (!empty($_FILES['featured_image']['name'])) {
            $upload_result = $this->_upload_featured_image($slug);
            if (isset($upload_result['error'])) {
                return $this->_json_error('Image upload failed: ' . $upload_result['error']);
            }
            // $data['featured_image'] = $upload_result['url']; // Add this if needed in DB
        }
        if ($this->Pages_model->updatePage($id, $data)) {
            if ($tags) $this->Pages_model->updateTagsForPage($tags, $id);
            return $this->_json_success([
                'message' => 'Page updated successfully!',
                'slug' => $slug,
                'path' => $path
            ]);
        }
        return $this->_json_error('Failed to update page.');
    }
    public function delete()
    {
        $ids = $this->input->post('page_ids');
        if (!is_array($ids) || empty($ids)) {
            return $this->_json_error('No page IDs provided');
        }
        $deleted = 0;
        foreach ($ids as $id) {
            if ($this->Pages_model->deletePage($id)) $deleted++;
        }
        return $this->_json_success(['message' => "$deleted page(s) deleted"]);
    }
    public function get($id)
    {
        $page = $this->Pages_model->getPageById($id);
        if (!$page) return $this->_json_error('Page not found.');
        $page['tags'] = $this->Pages_model->getTagsForPage($id);
        return $this->_json_success(['data' => $page]);
    }
    public function toggle_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if (!$id || !in_array($status, ['published', 'draft'])) {
            return $this->_json_error('Invalid input.');
        }
        $published_at = ($status === 'published') ? date('Y-m-d H:i:s') : null;
        if ($this->Pages_model->updatePageStatus($id, $status, $published_at)) {
            return $this->_json_success([
                'message' => 'Status updated.',
                'published_at' => $published_at
            ]);
        }
        return $this->_json_error('Failed to update status.');
    }
    // --- ERROR HANDLING ---
    public function show_404()
    {
        $this->output->set_status_header('404');
        $this->load->view('errors/html/my_404');
    }
    // --- PRIVATE HELPERS ---
    // Normalizes parent path, slug, and builds full path
    private function _normalize_path_slug()
    {
        $rawParent = trim($this->input->post('parent_path') ?? '', " \t\n\r\0\x0B/\\,");
        $segments = preg_split('#[\/\\\\,]+#', $rawParent);
        $segments = array_filter(array_map(function ($seg) {
            return url_title($seg, 'dash', true);
        }, $segments));
        $parentPath = implode('/', $segments);
        $rawSlug = trim($this->input->post('slug') ?? '');
        if ($rawSlug !== '') {
            $slug = url_title($rawSlug, 'dash', true);
        } else {
            $lastSegment = $parentPath ? basename($parentPath) : 'untitled';
            $slug = url_title($lastSegment, 'dash', true);
        }
        $path = $parentPath ? "$parentPath/$slug" : $slug;
        $path = preg_replace('#/+#', '/', $path);
        $path = trim($path, '/');
        return [$parentPath, $slug, $path];
    }
    // Handles category logic for new/added
    private function _resolve_category($category_id, $new_category)
    {
        if ($category_id === 'add_new' && $new_category !== '') {
            $existing = $this->db->where('LOWER(name)', strtolower($new_category))->get('cmsSID_categories')->row_array();
            if ($existing) return $existing['id'];
            $this->db->insert('cmsSID_categories', [
                'name' => $new_category,
                'slug' => url_title($new_category, 'dash', true)
            ]);
            return $this->db->insert_id();
        } elseif ($category_id === 'add_new') {
            return null;
        }
        return $category_id;
    }
    // Handles featured image upload
    private function _upload_featured_image($slug)
    {
        $ext = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
        $cleanSlug = preg_replace('/[^a-z0-9\-]/', '-', strtolower($slug));
        $cleanSlug = preg_replace('/-+/', '-', trim($cleanSlug, '-'));
        $filename = $cleanSlug . '-featured-image.' . $ext;
        $config['upload_path'] = './assets/site-assets/images/uploads';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
        $config['encrypt_name'] = FALSE;
        $config['file_name']    = $filename;
        $config['max_size']     = 2048;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('featured_image')) {
            return ['error' => strip_tags($this->upload->display_errors())];
        }
        $uploaded = $this->upload->data();
        return ['url' => base_url('assets/site-assets/images/uploads/' . $uploaded['file_name'])];
    }
    // JSON helpers
    private function _json_success($arr)
    {
        $arr['status'] = 'success';
        return $this->output->set_content_type('application/json')
            ->set_output(json_encode($arr));
    }
    private function _json_error($message)
    {
        return $this->output->set_content_type('application/json')
            ->set_output(json_encode(['status' => 'error', 'message' => $message]));
    }
}

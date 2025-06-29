<?php
class Pages_model extends CI_Model
{
    public function getAllPages()
    {
        $this->db->select('
    p.*, 
    CONCAT(u.first_name, " ", u.last_name) AS user, 
    CONCAT(LOWER(REPLACE(u.first_name, " ", "-")), "-", LOWER(REPLACE(u.last_name, " ", "-"))) AS author_slug,
    c.name AS category_name, 
    c.slug AS category_slug, 
    c.id AS category_id
');
        $this->db->from('cmsSID_pages p');
        $this->db->join('cmsSID_users u', 'u.user_id = p.user_id', 'left');
        $this->db->join('cmsSID_categories c', 'c.id = p.category_id', 'left');
        // CHANGE THIS LINE:
        $this->db->order_by('p.updated_at', 'DESC');
        return $this->db->get()->result_array();
    }
    public function getPublishedPages($limit = null, $type = null)
    {
        $this->db->where('status', 'published');
        if ($type) {
            $this->db->where('page_type', $type);
        }
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->order_by('published_at', 'DESC');
        return $this->db->get('cmsSID_pages')->result_array();
    }
    public function getPageBySlug($slug)
    {
        return $this->db->get_where('cmsSID_pages', ['slug' => $slug, 'status' => 'published'])->row_array();
    }
    public function getPageByPath($path)
    {
        return $this->db->get_where('cmsSID_pages', ['path' => $path])->row_array();
    }
    public function insertPage($data)
    {
        return $this->db->insert('cmsSID_pages', $data);
    }
    public function deletePage($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('cmsSID_pages');
    }
    public function getSavedPagesByUser($user_id)
    {
        $this->db->select('p.*, sp.saved_at');
        $this->db->from('cmsSID_user_saved_pages sp');
        $this->db->join('cmsSID_pages p', 'sp.page_id = p.id');
        $this->db->where('sp.user_id', $user_id);
        $this->db->order_by('sp.saved_at', 'DESC');
        return $this->db->get()->result_array();
    }
    public function isPageSaved($page_id, $user_id)
    {
        return $this->db
            ->get_where('cmsSID_user_saved_pages', ['page_id' => $page_id, 'user_id' => $user_id])
            ->num_rows() > 0;
    }
    public function savePage($data)
    {
        return $this->db->insert('cmsSID_user_saved_pages', $data);
    }
    public function unsavePage($page_id, $user_id)
    {
        return $this->db->delete('cmsSID_user_saved_pages', [
            'page_id' => $page_id,
            'user_id' => $user_id
        ]);
    }
    // Change $slug to $page_id
    public function insertTagsForPage($tags, $page_id)
    {
        $tagsArray = array_filter(array_map('trim', explode(',', $tags)));
        foreach ($tagsArray as $tagName) {
            $existingTag = $this->db->get_where('cmsSID_tags', ['name' => $tagName])->row_array();
            if (!$existingTag) {
                $this->db->insert('cmsSID_tags', ['name' => $tagName]);
                $tag_id = $this->db->insert_id();
            } else {
                $tag_id = $existingTag['id'];
            }
            $this->db->insert('cmsSID_page_tags', [
                'page_id' => $page_id, // <--- USE THE ID
                'tag_id' => $tag_id
            ]);
        }
        return true;
    }
    public function getPageById($id)
    {
        $this->db->select(
            'p.*, 
         CONCAT(u.first_name, " ", u.last_name) AS user, 
         c.name AS category_name, 
         c.slug AS category_slug, 
         c.id AS category_id'
        );
        $this->db->from('cmsSID_pages p');
        $this->db->join('cmsSID_users u', 'u.user_id = p.user_id', 'left');
        $this->db->join('cmsSID_categories c', 'c.id = p.category_id', 'left');
        $this->db->where('p.id', $id);
        return $this->db->get()->row_array();
    }
    public function updatePage($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('cmsSID_pages', $data);
    }
    public function getTagsForPage($page_id)
    {
        $this->db->select('t.name');
        $this->db->from('cmsSID_page_tags pt');
        $this->db->join('cmsSID_tags t', 'pt.tag_id = t.id', 'left');
        $this->db->where('pt.page_id', $page_id);
        $tags = $this->db->get()->result_array();
        return implode(', ', array_column($tags, 'name'));
    }
    public function updateTagsForPage($tags, $page_id)
    {
        // Remove all existing tags for this page
        $this->db->delete('cmsSID_page_tags', ['page_id' => $page_id]);
        // Add new tags
        $tagsArray = array_filter(array_map('trim', explode(',', $tags)));
        foreach ($tagsArray as $tagName) {
            // Insert tag if not exists
            $existingTag = $this->db->get_where('cmsSID_tags', ['name' => $tagName])->row_array();
            if (!$existingTag) {
                $this->db->insert('cmsSID_tags', ['name' => $tagName]);
                $tag_id = $this->db->insert_id();
            } else {
                $tag_id = $existingTag['id'];
            }
            // Associate with page
            $this->db->insert('cmsSID_page_tags', [
                'page_id' => $page_id,
                'tag_id' => $tag_id
            ]);
        }
        return true;
    }
    public function updatePageStatus($id, $status, $published_at)
    {
        $data = [
            'status' => $status,
            'published_at' => $published_at,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->where('id', $id);
        return $this->db->update('cmsSID_pages', $data);
    }
    public function getTagsArrayForPage($page_id)
    {
        $this->db->select('t.name');
        $this->db->from('cmsSID_page_tags pt');
        $this->db->join('cmsSID_tags t', 'pt.tag_id = t.id', 'left');
        $this->db->where('pt.page_id', $page_id);
        $tags = $this->db->get()->result_array();
        return array_column($tags, 'name');
    }
}

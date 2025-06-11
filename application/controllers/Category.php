<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->database();
    }
    // Optional: index page listing all categories
    public function index()
    {
        $data['categories'] = $this->db->get('cmsSID_categories')->result_array();
        $this->load->view('category/index', $data);
    }
    // View category by slug
    public function view($slug = null)
    {
        if (!$slug) show_404();
        // Get category row
        $category = $this->db->get_where('cmsSID_categories', ['slug' => $slug])->row_array();
        if (!$category) show_404();
        // Get all published pages/posts in this category
        $this->db->select('
        p.*, 
        CONCAT(u.first_name, " ", u.last_name) AS user, 
        CONCAT(LOWER(REPLACE(u.first_name, " ", "-")), "-", LOWER(REPLACE(u.last_name, " ", "-"))) AS author_slug, 
        c.name AS category_name, 
        c.slug AS category_slug, 
        c.id AS category_id
    ')
            ->from('cmsSID_pages p')
            ->join('cmsSID_users u', 'u.user_id = p.user_id', 'left')
            ->join('cmsSID_categories c', 'c.id = p.category_id', 'left')
            ->where([
                'p.category_id' => $category['id'],
                'p.status' => 'published'
            ])
            ->order_by('p.published_at', 'DESC');
        $pages = $this->db->get()->result_array();
        // Use getTagsArrayForPage for proper array type for tags
        foreach ($pages as &$page) {
            $page['tags'] = $this->Pages_model->getTagsArrayForPage($page['id']);
        }
        $data['category'] = $category;
        $data['pages'] = $pages;
        $this->load->view('category/default', $data);
    }
}

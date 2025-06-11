<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tag extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pages_model');
        $this->load->database();
    }
    // Optional: index page listing all tags
    public function index()
    {
        // If you store tags as their own table:
        $data['tags'] = $this->db->get('cmsSID_tags')->result_array();
        $this->load->view('tag/index', $data);
    }
    // View tag by slug (or name)
    public function view($slug = null)
    {
        if (!$slug) show_404();
        // If you have a tags table with slugs:
        $tag = $this->db->get_where('cmsSID_tags', ['slug' => $slug])->row_array();
        if (!$tag) show_404();
        $tag_name = $tag['name'];
        // If you do NOT have a tags table, and only use tag names:
        // $tag_name = urldecode($slug);
        // Get all published pages/posts with this tag
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
            // Join with your pivot table for tags
            ->join('cmsSID_page_tags pt', 'pt.page_id = p.id', 'left')
            ->join('cmsSID_tags t', 't.id = pt.tag_id', 'left')
            ->where([
                't.slug' => $slug, // If using slug
                // 't.name' => $tag_name, // If using name instead
                'p.status' => 'published'
            ])
            ->order_by('p.published_at', 'DESC');
        $pages = $this->db->get()->result_array();
        // Add tags array to each page
        foreach ($pages as &$page) {
            $page['tags'] = $this->Pages_model->getTagsArrayForPage($page['id']);
        }
        $data['tag'] = $tag;
        $data['pages'] = $pages;
        $this->load->view('tag/default', $data);
    }
}

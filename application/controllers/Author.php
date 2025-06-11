<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Author extends CI_Controller
{
    public function view($slug = null)
    {
        if (!$slug) show_404();
        // Find user by slug (add slug field to user table or derive from name/email)
        $users = $this->db->get('cmsSID_users')->result_array();
        $author = null;
        foreach ($users as $u) {
            $generated_slug = strtolower(url_title($u['first_name'] . ' ' . $u['last_name']));
            if ($generated_slug === $slug) {
                $author = $u;
                break;
            }
        }
        if (!$author) show_404();
        $this->db->select('p.*, c.name AS category_name, c.slug AS category_slug')
            ->from('cmsSID_pages p')
            ->join('cmsSID_categories c', 'c.id = p.category_id', 'left')
            ->where([
                'p.user_id' => $author['user_id'],
                'p.status' => 'published'
            ])
            ->order_by('p.published_at', 'DESC');
        $pages = $this->db->get()->result_array();
        foreach ($pages as &$page) {
            $page['tags'] = $this->Pages_model->getTagsArrayForPage($page['id']);
        }
        $data['author'] = $author;
        $data['pages'] = $pages;
        $this->load->view('author/default', $data);
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends CI_Controller
{
    public function index()
    {
        $data['blogs'] = $this->blog_model->getBlogs();
        $this->load->view('blogs', $data); // Load the blog list view
    }
}

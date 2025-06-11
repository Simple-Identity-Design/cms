<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller // <-- Not MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model');
	}
	public function index()
	{
		$data['latest_blogs'] = $this->blog_model->getLatestBlogs();
		$this->load->view('welcome_message', $data); // Or whatever your homepage view is
	}
}

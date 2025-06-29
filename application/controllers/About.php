<?php
defined('BASEPATH') or exit('No direct script access allowed');
class About extends CI_Controller // <-- Not MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['latest_blogs'] = $this->blog_model->getBlogs();
		$this->load->view('about', $data); // Or whatever your homepage view is
	}
}

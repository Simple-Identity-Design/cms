<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('blog_model');
		$data['blogs'] = $this->blog_model->getBlogs();
		$data['allusers'] = $this->loadAllUsers();
		$this->load->view('cms/dashboard', $data);
	}
	public function manage_inventory($deltaID = NULL)
	{
		$data = getBreadcrumbs();
		$data['users'] = $this->data;
		if ($deltaID) {
			$data['product'] = $this->product_model->getSingleDelta($deltaID);
			$this->load->view('manage-product', $data);
		} else {
			$data['deltas'] = $this->product_model->getDeltas();
			$this->load->view('manage-inventory', $data);
		}
	}
	public function add($deltaID = NULL)
	{
		$data = getBreadcrumbs();
		// if($deltaID){
		// 	$data['product'] = $this->product_model->getSingleDelta($deltaID);
		// 	$this->load->view('manage-product', $data);
		// }
		// else{
		// 	$data['deltas'] = $this->product_model->getDeltas();
		// 	$this->load->view('manage-inventory', $data);
		// }
		$this->load->view('add-product', $data);
	}
	public function add_product($deltaID = NULL)
	{
		$product = array(
			'decondi_name' => $this->input->post('decondi_name'),
			'decondi_description' => $this->input->post('decondi_description'),
			'decondi_price' => $this->input->post('decondi_price'),
			'decondi_category' => $this->input->post('decondi_category'),
			'decondi_color' => $this->input->post('decondi_color'),
			'decondi_size_l' => $this->input->post('decondi_size_l'),
			'decondi_size_w' => $this->input->post('decondi_size_w')
		);
		$this->load->view('add-product', $data);
	}
	public function submit()
	{
		// Load validation + model
		$this->load->library('form_validation');
		$this->load->model('Blog_model');
		// Validation rules
		$this->form_validation->set_rules('add-blog-title',       'Title',       'required');
		$this->form_validation->set_rules('add-blog-h1',          'H1',          'required');
		$this->form_validation->set_rules('add-blog-h2',          'H2',          'required');
		$this->form_validation->set_rules('add-blog-slug',        'Slug',        'required');
		$this->form_validation->set_rules('add-blog-description', 'Description', 'required');
		$this->form_validation->set_rules('Category',            'Category',   'required');
		if ($this->form_validation->run() === FALSE) {
			// VALIDATION FAILED → Danger alert
			$this->session->set_flashdata(
				'error_msg',
				'<div class="alert alert-arrow-right alert-icon-right alert-light-danger alert-dismissible fade show m-0 p-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-alert-circle">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="12" y1="8"  x2="12" y2="12"></line>
                      <line x1="12" y1="16" x2="12" y2="16"></line>
                    </svg>
                    <strong>Error!</strong> Failed to add blog. Please fill in all required fields.
                </div>'
			);
			redirect('/admin');
		}
		// VALIDATION PASSED → Gather data
		$title       = $this->input->post('add-blog-title');
		$h1          = $this->input->post('add-blog-h1');
		$h2          = $this->input->post('add-blog-h2');
		$slug        = str_replace(' ', '-', $this->input->post('add-blog-slug'));
		$description = $this->input->post('add-blog-description');
		$category    = $this->input->post('Category');
		$author      = "Kapo";
		$data = [
			'name'        => $title,
			'blog_h1'     => $h1,
			'blog_h2'     => $h2,
			'slug'        => $slug,
			'author'      => $author,
			'topic'       => $category,
			'blog_desc'   => $description,
			'created_at'  => date('Y-m-d H:i:s'),
		];
		if ($this->Blog_model->insert($data)) {
			// INSERT SUCCESS → Success alert
			$this->session->set_flashdata(
				'success_msg',
				'<div class="alert alert-arrow-left alert-icon-left alert-light-success alert-dismissible fade show mb-4" role="alert">
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-bell">
                      <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                      <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <strong>Success!</strong> Blog created successfully.
                </div>'
			);
		} else {
			// INSERT FAILED → Danger alert
			$this->session->set_flashdata(
				'error_msg',
				'<div class="alert alert-arrow-right alert-icon-right alert-light-danger alert-dismissible fade show m-0 p-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-alert-circle">
                      <circle cx="12" cy="12" r="10"></circle>
                      <line x1="12" y1="8"  x2="12" y2="12"></line>
                      <line x1="12" y1="16" x2="12" y2="16"></line>
                    </svg>
                    <strong>Error!</strong> Failed to add blog.
                </div>'
			);
		}
		redirect('/admin');
	}
	public function delete_users()
	{
		$this->load->model('User_model');
		$ids = $this->input->post('ids');
		if (is_array($ids) && !empty($ids)) {
			$this->User_model->delete_multiple_users($ids);
			echo json_encode(['status' => 'success']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No IDs received']);
		}
	}
}

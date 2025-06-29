<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['blogs'] = $this->blog_model->getBlogs();
		$this->load->view('cms/admin', $data);
	}
	public function register_user()
	{
		$this->load->library('form_validation');
		$this->load->model('login_database');
		$this->load->library('upload');
		$this->load->library('image_lib');
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[user_password]');
		$this->form_validation->set_rules('level', 'Level', 'trim|required|integer');
		if ($this->form_validation->run() == FALSE) {
			$errors = strip_tags(validation_errors());
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'status' => 'error',
					'message' => $errors
				]));
			return;
		} else {
			// Clean first and last names to be filesystem safe
			$first = preg_replace('/[^A-Za-z0-9_\-]/', '', strtolower($this->input->post('first_name')));
			$last = preg_replace('/[^A-Za-z0-9_\-]/', '', strtolower($this->input->post('last_name')));
			// Image upload config
			$config['upload_path'] = './assets/site-assets/profile_images/';
			$config['allowed_types'] = 'jpg|jpeg|png|webp';
			$config['max_size']      = 2048; // 2MB
			$config['encrypt_name']  = FALSE;
			$config['overwrite']     = TRUE;
			$config['file_name']     = 'author-' . $first . '-' . $last;
			if (!is_dir($config['upload_path'])) {
				mkdir($config['upload_path'], 0775, true);
			}
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('profile_image')) {
				$errors = strip_tags($this->upload->display_errors());
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode([
						'status' => 'error',
						'message' => "Profile image upload failed: $errors"
					]));
				return;
			}
			$upload_data = $this->upload->data();
			$image_path = $upload_data['full_path'];
			$image_width = $upload_data['image_width'];
			$image_height = $upload_data['image_height'];
			if (
				$image_width < 1200 || $image_height < 1200 ||
				$image_width > 2000 || $image_height > 2000
			) {
				@unlink($image_path);
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode([
						'status' => 'error',
						'message' => "Image must be at least 1200x1200px and no more than 2000x2000px. Yours was {$image_width}x{$image_height}px."
					]));
				return;
			}
			$user = array(
				'user_name'     => $this->input->post('user_name'),
				'user_email'    => $this->input->post('user_email'),
				'first_name'    => $this->input->post('first_name'),
				'last_name'     => $this->input->post('last_name'),
				'level'         => $this->input->post('level'),
				'user_password' => password_hash($this->input->post('user_password'), PASSWORD_BCRYPT),
				'profile_image' => 'assets/site-assets/profile_images/' . $upload_data['file_name'],
				'created_at'    => date('Y-m-d H:i:s')
			);
			$email_check = $this->login_database->email_check($user['user_email']);
			if ($email_check) {
				$this->login_database->register_user($user);
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode([
						'status' => 'success',
						'message' => '<div class="alert alert-success">User registered successfully!</div>'
					]));
				return;
			} else {
				@unlink($image_path);
				$this->output
					->set_content_type('application/json')
					->set_output(json_encode([
						'status' => 'error',
						'message' => '<div class="alert alert-danger">Email is already in use, please try again</div>'
					]));
				return;
			}
		}
	}
	public function delete_users()
	{
		$user_ids = $this->input->post('user_ids');
		// DEBUG: log what's received
		log_message('error', 'Received for deletion: ' . print_r($user_ids, true));
		if (!$user_ids || !is_array($user_ids)) {
			echo json_encode([
				'status' => 'error',
				'message' => 'No users selected.'
			]);
			return;
		}
		// DEBUG: call the model
		$deleted = $this->User_model->delete_users($user_ids);
		if ($deleted) {
			echo json_encode([
				'status' => 'success',
				'message' => 'Selected users have been deleted.'
			]);
		} else {
			log_message('error', 'Delete failed for IDs: ' . print_r($user_ids, true));
			echo json_encode([
				'status' => 'error',
				'message' => 'Failed to delete users.'
			]);
		}
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
		// Load the form validation library
		$this->load->library('form_validation');
		// Set form validation rules
		$this->form_validation->set_rules('add-blog-title', 'Title', 'required');
		$this->form_validation->set_rules('add-blog-h1', 'H1', 'required');
		$this->form_validation->set_rules('add-blog-h2', 'H2', 'required');
		$this->form_validation->set_rules('add-blog-slug', 'Slug', 'required');
		$this->form_validation->set_rules('add-blog-description', 'Description', 'required');
		$this->form_validation->set_rules('Category', 'Category', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_msg', 'Failed to add blog. Please fill in all required fields.');
			redirect('/admin');
		} else {
			// Retrieve form data
			$title = $this->input->post('add-blog-title');
			$h1 = $this->input->post('add-blog-h1');
			$h2 = $this->input->post('add-blog-h2');
			$slug = str_replace(' ', '-', $this->input->post('add-blog-slug'));
			$description = $this->input->post('add-blog-description');
			$category = $this->input->post('Category');
			$author = "Kapo"; // Hard set the author to "Kapo"
			// Prepare data for insertion
			$data = [
				'name' => $title,
				'blog_h1' => $h1,
				'blog_h2' => $h2,
				'slug' => $slug,
				'author' => $author,
				'topic' => $category,
				'blog_desc' => $description,
				'created_at' => date('Y-m-d H:i:s'),
			];
			// Insert data into the database
			if ($this->Blog_model->insert($data)) {
				$this->session->set_flashdata('success_msg', 'Blog created successfully.');
				redirect('/admin');
			} else {
				$this->session->set_flashdata('error_msg', 'Failed to add blog');
				redirect('/admin');
			}
		}
	}
}

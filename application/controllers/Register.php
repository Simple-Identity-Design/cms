<?php
defined('BASEPATH') or exit('No direct script access allowed');
//--------------------------------------------------------------------------------------------------------------
class Register extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('cms/register');
  }
  public function register_user()
  {
    $this->load->library('upload');
    $this->load->library('image_lib');
    // Form validation rules
    $this->form_validation->set_rules('user_name', 'Username', 'trim|required|min_length[5]|max_length[12]');
    $this->form_validation->set_rules('user_email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
    $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
    $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[user_password]');
    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('error_msg', validation_errors('<div class="alert alert-danger">', '</div>'));
      $this->load->view('cms/register');
    } else {
      // Clean first and last names to be filesystem safe (lowercase, no spaces/special chars)
      $first = preg_replace('/[^A-Za-z0-9_\-]/', '', strtolower($this->input->post('first_name')));
      $last = preg_replace('/[^A-Za-z0-9_\-]/', '', strtolower($this->input->post('last_name')));
      // Image upload config
      $config['upload_path'] = './assets/site-assets/profile_images/';
      $config['allowed_types'] = 'jpg|jpeg|png|webp';
      $config['max_size']      = 2048; // 2MB
      $config['encrypt_name']  = FALSE; // <--- Change to FALSE to use your custom file_name
      $config['overwrite']     = TRUE; // Optional, replaces file if user re-registers
      $config['file_name']     = 'author-' . $first . '-' . $last;
      // Ensure upload directory exists
      if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0775, true);
      }
      $this->upload->initialize($config);
      if (!$this->upload->do_upload('profile_image')) {
        $this->session->set_flashdata('error_msg', '<div class="alert alert-danger">Profile image upload failed: ' . $this->upload->display_errors('', '') . '</div>');
        $this->load->view('cms/register');
        return;
      }
      // Get image details
      $upload_data = $this->upload->data();
      $image_path = $upload_data['full_path'];
      $image_width = $upload_data['image_width'];
      $image_height = $upload_data['image_height'];
      // Check min/max dimensions
      if (
        $image_width < 1200 || $image_height < 1200 ||
        $image_width > 2000 || $image_height > 2000
      ) {
        // Delete invalid image
        @unlink($image_path);
        $this->session->set_flashdata('error_msg', '<div class="alert alert-danger">Image must be at least 1200x1200px and no more than 2000x2000px. Yours was ' . $image_width . 'x' . $image_height . 'px.</div>');
        $this->load->view('cms/register');
        return;
      }
      $user = array(
        'user_name'     => $this->input->post('user_name'),
        'user_email'    => $this->input->post('user_email'),
        'first_name'    => $this->input->post('first_name'),
        'last_name'     => $this->input->post('last_name'),
        'profile_image' => 'assets/site-assets/profile_images/' . $upload_data['file_name'],
        'level'         => 3,
        'user_password' => password_hash($this->input->post('user_password'), PASSWORD_BCRYPT),
        'created_at'    => date('Y-m-d H:i:s')
      );
      $email_check = $this->login_database->email_check($user['user_email']);
      if ($email_check) {
        $this->login_database->register_user($user);
        $this->session->set_flashdata('success_msg', '.Registered successfully. You may now log in');
        redirect('/login');
      } else {
        // Optionally, delete the uploaded file if registration fails
        @unlink($image_path);
        $this->session->set_flashdata('error_msg', '<div class="alert alert-danger">.Email is already in use, please try again</div>');
        redirect('/register');
      }
    }
  }
}

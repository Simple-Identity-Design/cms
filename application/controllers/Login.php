<?php
defined('BASEPATH') or exit('No direct script access allowed');
//--------------------------------------------------------------------------------------------------------------
class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $this->load->view('cms/login');
  }
  public function login_view()
  {
    $this->load->view("cms/login");
  }
  public function login_user()
  {
    // Retrieve form inputs
    $user_name     = $this->input->post('user_name');
    $user_password = $this->input->post('user_password');
    // Form validation rules
    $this->form_validation->set_rules('user_name',     'Username', 'trim|required|min_length[4]|max_length[12]');
    $this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[8]');
    if ($this->form_validation->run() === FALSE) {
      // VALIDATION FAILED → Error alert
      $errors = validation_errors();
      $this->session->set_flashdata(
        'error_msg',
        '<div class="alert alert-arrow-right alert-icon-right alert-light-danger alert-dismissible fade show m-0 p-0" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-alert-circle">
                  <circle cx="12" cy="12" r="10"></circle>
                  <line x1="12" y1="8"  x2="12" y2="12"></line>
                  <line x1="12" y1="16" x2="12" y2="16"></line>
                </svg>
                <strong>Error!</strong> ' . $errors . '
            </div>'
      );
      redirect('login');
    }
    // Fetch user data by username
    $user_data = $this->login_database->get_user_by_username($user_name);
    if ($user_data && password_verify($user_password, $user_data->user_password)) {
      // Login successful: set session data
      $this->session->set_userdata([
        'user_id'    => $user_data->user_id,
        'level'      => $user_data->level,
        'user_email' => $user_data->user_email,
        'first_name' => $user_data->first_name,
        'last_name'  => $user_data->last_name,
        'user_name'  => $user_data->user_name,
        'user_age' => $user_data->user_age,
        'user_phone' => $user_data->user_phone,
        'created_at'  => $user_data->created_at,
        'modified_at' => $user_data->modified_at,
        'logged_in'  => true,
      ]);
      $this->data = $this->session->userdata();
      // SUCCESS alert
      $this->session->set_flashdata(
        'success_msg',
        '<div class="alert alert-arrow-left alert-icon-left alert-light-success alert-dismissible fade show m-0 p-0" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-bell">
                  <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                  <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <strong>.Success!</strong> You have logged in successfully
            </div>'
      );
      redirect('/dashboard');
    } else {
      // LOGIN FAILED → Error alert
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
                <strong>Error!</strong> Invalid username or password. Please try again.
            </div>'
      );
      redirect('login');
    }
  }
  public function userDetails()
  {
    // POST data
    $postData = $this->input->post();
    // get data
    $data = $this->login_database->getUserDetails($postData);
    echo json_encode($data);
  }
  function user_profile()
  {
    $this->load->view('user_profile');
  }
  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url());
  }
}

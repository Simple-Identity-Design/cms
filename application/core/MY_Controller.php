<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Block access if user is not logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('/login');
        }
        // Load the User_model once here
        $this->load->model('User_model');
        // Session values
        $this->data = [
            'user_id'     => $this->session->userdata('user_id'),
            'user_name'   => $this->session->userdata('user_name'),
            'user_email'  => $this->session->userdata('user_email'),
            'first_name'  => $this->session->userdata('first_name'),
            'last_name'   => $this->session->userdata('last_name'),
            'user_phone'  => $this->session->userdata('user_phone'),
            'level'       => (int) $this->session->userdata('level'),
            'created_at'  => $this->session->userdata('created_at')
                ? date('F j, Y', strtotime($this->session->userdata('created_at')))
                : 'N/A',
            'user_age'    => $this->session->userdata('user_age') ?? 'N/A',
            'modified_at' => $this->session->userdata('modified_at')
                ? date('F j, Y', strtotime($this->session->userdata('modified_at')))
                : 'N/A',
            // Inject all users here
            'users'       => $this->User_model->get_all_users()
        ];
        // Protect admin-only routes
        if (strtolower($this->router->fetch_class()) === 'admin' && $this->data['level'] !== 1) {
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
                    <strong>.Error!</strong> Access denied
                </div>'
            );
            redirect('/dashboard');
        }
    }
    protected function render($view, $data = [])
    {
        $this->load->view($view, array_merge($this->data, $data));
    }
    protected function loadAllUsers()
    {
        $this->load->model('User_model');
        return $this->User_model->get_all_users();
    }
}

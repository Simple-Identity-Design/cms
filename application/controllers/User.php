<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['allusers'] = $this->loadAllUsers();
        $this->load->view('cms/profile', $data);
    }
    public function profile()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->User_model->get_user($user_id);
        // Your view should echo out:
        //   echo $this->session->flashdata('success_msg');
        //   echo $this->session->flashdata('error_msg');
        // and then render the modal form using $user->first_name, etc.
        $this->load->view('cms/profile', $data);
    }
    /**
     * Handle the form POST from the modal
     */
    public function update()
    {
        if (!$this->input->is_ajax_request()) {
            show_error('No direct script access allowed', 403);
        }
        // Validation rules
        $this->form_validation->set_rules('first_name',     'First Name', 'required');
        $this->form_validation->set_rules('last_name',      'Last Name',  'required');
        $this->form_validation->set_rules('user_name',      'Username',   'required|min_length[4]|max_length[50]');
        $this->form_validation->set_rules('user_email',     'Email',      'required|valid_email');
        $this->form_validation->set_rules('user_password',  'Password',   'min_length[8]');
        $this->form_validation->set_rules('user_age',       'Age',        'required|integer|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('level',          'Level',      'integer');
        header('Content-Type: application/json');
        if ($this->form_validation->run() === FALSE) {
            $errors = validation_errors();
            $alert  = '<div class="alert alert-arrow-right alert-icon-right alert-light-danger alert-dismissible fade show mb-2" role="alert">'
                . '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" '
                . 'stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" '
                . 'class="feather feather-alert-circle">'
                . '<circle cx="12" cy="12" r="10"></circle>'
                . '<line x1="12" y1="8" x2="12" y2="12"></line>'
                . '<line x1="12" y1="16" x2="12" y2="16"></line>'
                . '</svg><strong>Error!</strong> ' . $errors . '</div>';
            echo json_encode(['status' => 'error', 'message' => $alert]);
            return;
        }
        $user_id = $this->session->userdata('user_id');
        $update  = [
            'first_name'  => $this->input->post('first_name'),
            'last_name'   => $this->input->post('last_name'),
            'user_name'   => $this->input->post('user_name'),
            'user_email'  => $this->input->post('user_email'),
            'user_age'    => $this->input->post('user_age'),
            'modified_at' => date('Y-m-d H:i:s'),
        ];
        // Only allow level update if user is an admin
        if ((int) $this->session->userdata('level') === 1) {
            $update['level'] = $this->input->post('level');
        }
        // Optional password update
        if ($pwd = $this->input->post('user_password')) {
            $update['user_password'] = password_hash($pwd, PASSWORD_BCRYPT);
        }
        if ($this->User_model->update_user($user_id, $update)) {
            // Refresh session values
            $this->session->set_userdata([
                'first_name' => $update['first_name'],
                'last_name'  => $update['last_name'],
                'user_name'  => $update['user_name'],
                'user_email' => $update['user_email'],
                'user_age'   => $update['user_age'],
            ]);
            if (isset($update['level'])) {
                $this->session->set_userdata('level', $update['level']);
            }
            $alert = '<div class="alert alert-arrow-left alert-icon-left alert-light-success alert-dismissible fade show mb-2" role="alert">'
                . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                . '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" '
                . 'stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" '
                . 'class="feather feather-bell">'
                . '<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>'
                . '<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>'
                . '</svg><strong>Success!</strong> Profile updated</div>';
            echo json_encode(['status' => 'success', 'message' => $alert]);
        } else {
            $alert = '<div class="alert alert-arrow-right alert-icon-right alert-light-danger alert-dismissible fade show mb-2" role="alert">'
                . '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" '
                . 'stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" '
                . 'class="feather feather-alert-circle">'
                . '<circle cx="12" cy="12" r="10"></circle>'
                . '<line x1="12" y1="8" x2="12" y2="12"></line>'
                . '<line x1="12" y1="16" x2="12" y2="16"></line>'
                . '</svg><strong>Error!</strong> Update failed. Try again</div>';
            echo json_encode(['status' => 'error', 'message' => $alert]);
        }
    }
}

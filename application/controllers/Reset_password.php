<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Reset_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // Make sure this matches your actual model
        $this->load->library('session');
        $this->load->helper('url');
    }
    // Show the password reset form if token is present and valid
    public function index()
    {
        $token = $this->input->get('token');
        if (!$token) {
            show_error('Missing reset token.', 400);
        }
        $data['token'] = $token;
        $this->load->view('cms/reset-password', $data);
    }
    // Handle the reset form submission
    public function update()
    {
        $token = $this->input->post('token', TRUE);
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        // Basic validation
        if (!$token || !$password || !$confirm_password) {
            $this->session->set_flashdata('error_msg', '.All fields are required');
            redirect('reset-password?token=' . urlencode($token));
            return;
        }
        if ($password !== $confirm_password) {
            $this->session->set_flashdata('error_msg', '.Passwords do not match');
            redirect('reset-password?token=' . urlencode($token));
            return;
        }
        if (strlen($password) < 8) {
            $this->session->set_flashdata('error_msg', '.Password must be at least 8 characters');
            redirect('reset-password?token=' . urlencode($token));
            return;
        }
        // Get user by token and check expiry
        $user = $this->User_model->get_user_by_reset_token($token);
        if (!$user || strtotime($user->reset_token_expires) < time()) {
            $this->session->set_flashdata('error_msg', '.This password reset link is invalid or has expired');
            redirect('forgot');
            return;
        }
        // All good—update the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $this->User_model->update_password($user->id, $hashed_password);
        // Clear the reset token and expiry
        $this->User_model->clear_reset_token($user->id);
        $this->session->set_flashdata('success_msg', '.Password reset successfully. You may now log in');
        redirect('login');
    }
}

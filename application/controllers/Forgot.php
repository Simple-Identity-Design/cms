<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Forgot extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model'); // adjust if you use a different model name
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->library('session');
    }
    // Show the forgot password form (GET /forgot)
    public function index()
    {
        $this->load->view('cms/forgot'); // your view file
    }
    // Handle the form submission (POST /forgot/send_reset_link)
    public function send_reset_link()
    {
        $email = $this->input->post('user_email', TRUE);
        $success_message = ".If an account with that email exists, a reset link has been sent. This link expires in 1 hour.";
        // Set up variables, but only use them if user exists
        $subject = $message = $fromEmail = $headers = '';
        $user = $this->User_model->get_user_by_email($email);
        if ($user) {
            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
            $this->User_model->save_reset_token($user->user_id, $token, $expires);
            $reset_link = base_url("reset-password?token=$token");
            $subject = "Password Reset Request";
            $message = "Hi,\n\nClick the following link to reset your password:\n\n" . $reset_link . "\n\nThis link expires in 1 hour.";
            $fromEmail = "info@simpleidentitydesign.com";
            $headers   = "From: Simple Identity Design <" . $fromEmail . ">\r\n";
            $headers  .= "Reply-To: " . $fromEmail . "\r\n";
            $headers  .= "Return-Path: " . $fromEmail . "\r\n";
            $headers  .= "Sender: " . $fromEmail . "\r\n";
            $headers  .= "X-Mailer: PHP/" . phpversion();
            // Send the email via PHP mail() and check if it succeeded
            $mail_sent = mail($email, $subject, $message, $headers);
            if (!$mail_sent) {
                // Optionally log error for admin or show generic error
                $this->session->set_flashdata('error_msg', $success_message);
                redirect('forgot');
                return;
            }
        }
        // Always show same message for security (success or error)
        $this->session->set_flashdata('success_msg', $success_message);
        redirect('forgot');
    }
}

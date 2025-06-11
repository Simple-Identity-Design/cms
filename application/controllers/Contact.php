<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Contact extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Loads CodeIgniter's Form Validation library and your custom ContactMailer
		// No changes needed here unless the mailer class name changes
		$this->load->library(['form_validation', 'contactmailer']);
	}
	public function index()
	{
		// Default view for the contact page
		// CHANGE THIS if your view is located in a different folder or file
		$this->load->view('contact');
	}
	public function submit()
	{
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('message', 'Message', 'required');
		if ($this->form_validation->run()) {
			$name     = $this->input->post('full_name');
			$email    = $this->input->post('email');
			$message  = $this->input->post('message');
			$services = $this->input->post('services');
			$body  = "Name: $name\n";
			$body .= "Email: $email\n";
			if (!empty($services)) {
				$body .= "Interested Services: " . implode(', ', $services) . "\n";
			}
			$body .= "Message: $message\n";
			$sent = $this->contactmailer->send(
				'mcfadden.jonathan10@gmail.com',
				"New Message from $name",
				$body,
				$email
			);
			if ($this->input->is_ajax_request()) {
				header('Content-Type: application/json');
				echo json_encode([
					'status'  => $sent ? 'success' : 'error',
					'message' => $sent
						? "Thanks, $name! Your message was sent successfully."
						: "Oops! Something went wrong. Please try again."
				]);
				exit;
			}
			// Fallback for non-AJAX
			$this->session->set_flashdata($sent ? 'success' : 'error', $sent
				? "Thank you for contacting us, $name! Your message has been sent successfully."
				: "Oops! Something went wrong. Please try again later.");
		} else {
			$errors = validation_errors();
			if ($this->input->is_ajax_request()) {
				header('Content-Type: application/json');
				echo json_encode([
					'status'  => 'error',
					'message' => $errors
				]);
				exit;
			}
			$this->session->set_flashdata('error', $errors);
			$this->session->set_flashdata('form_data', $this->input->post());
		}
		// Only redirect if it's a normal POST
		redirect('/contact');
	}
}

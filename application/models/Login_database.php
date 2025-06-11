<?php
class Login_Database extends CI_model
{
  public function register_user($user)
  {
    $this->db->insert('cmsSID_users', $user);
  }
  public function login_user($data)
  {
    $condition = "user_name =" . "'" . $data['user_name'] . "' AND " . "user_password =" . "'" . $data['user_password'] . "'";
    $this->db->select('*');
    $this->db->from('cmsSID_users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }
  public function get_user_by_username($username)
  {
    $this->db->where('user_name', $username);
    $query = $this->db->get('cmsSID_users'); // Replace 'users' with your actual table name
    if ($query->num_rows() == 1) {
      return $query->row(); // Return the user record
    } else {
      return false; // No user found
    }
  }
  public function email_check($email)
  {
    $this->db->select('*');
    $this->db->from('cmsSID_users');
    $this->db->where('user_email', $email);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return false;
    } else {
      return true;
    }
  }
}

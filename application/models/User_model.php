<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    protected $table = 'cmsSID_users'; // Change if your table name is different
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Fetch a single user by ID
     *
     * @param  int   $id
     * @return object|null
     */
    public function get_user($id)
    {
        return $this->db
            ->where('user_id', $id)
            ->get($this->table)
            ->row();
    }
    /**
     * Update a user's record
     *
     * @param  int    $id
     * @param  array  $data
     * @return bool
     */
    public function update_user($id, array $data)
    {
        return $this->db
            ->where('user_id', $id)
            ->update($this->table, $data);
    }
    // Get user by email
    public function get_user_by_email($email)
    {
        return $this->db->get_where('cmsSID_users', array('user_email' => $email))->row();
    }
    public function get_all_users()
    {
        return $this->db->get('cmsSID_users')->result_array();
    }
    // Save reset token and expiry (add these fields to your users table or use a separate table)
    public function save_reset_token($user_id, $token, $expires)
    {
        $data = array(
            'reset_token' => $token,
            'reset_token_expires' => $expires
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('cmsSID_users', $data);
    }
    public function get_user_by_reset_token($token)
    {
        return $this->db->get_where('cmsSID_users', ['reset_token' => $token])->row();
    }
    public function update_password($user_id, $hashed_password)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('cmsSID_users', [
            'user_password' => $hashed_password
        ]);
    }
    public function clear_reset_token($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update('cmsSID_users', [
            'reset_token' => NULL,
            'reset_token_expires' => NULL
        ]);
    }
    public function delete_users($user_ids)
    {
        if (empty($user_ids)) return false;
        $this->db->where_in('user_id', $user_ids);
        return $this->db->delete('cmsSID_users'); // Table name = 'users'
    }
}

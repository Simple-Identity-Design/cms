<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isLogin()) {
            redirect('/login');
        }
        $users = getSessionVariables('user_name', 'user_id', 'level');
        $this->data = $users;
        // Only allow level 1 users (admins)
        if ($this->data->level != 1) {
            redirect('/');
        }
    }
}

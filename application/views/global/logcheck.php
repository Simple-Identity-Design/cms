<?php
$logged_in  = $this->session->userdata('logged_in');
$first_name = $this->session->userdata('first_name') ?? 'Guest';
$user_level = (int) $this->session->userdata('level');

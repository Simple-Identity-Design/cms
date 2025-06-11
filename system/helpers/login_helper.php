<?php
 defined('BASEPATH') OR exit('no direct access');

 function isLogin()
 {
  if (array_key_exists('logged_in', $_SESSION))
  {
      return true;
  }
  else
  {
    return false;
  }
 }
 function getUserSession()
 {
  $user = array(
    'level' => $_SESSION["level"],
    'name' => $_SESSION["user_name"]
  );
  return $user;
 }
?>
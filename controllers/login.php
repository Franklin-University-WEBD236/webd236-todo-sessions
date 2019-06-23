<?php
include_once "include/util.php";
include_once "models/user.php";

function get_index() {
  renderTemplate(
    "views/login_form.php",
    array(
      'title' => 'Log in',
    )
  );
}

function post_index() {
  $form = safeParam($_POST, 'form');
  $email = safeParam($form, 'email');
  $password = safeParam($form, 'password');
  
  renderTemplate(
    "views/login_form.php",
    array(
      'title' => 'Log in',
      'form' => $form,
    )
  );
}
?>
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
?>
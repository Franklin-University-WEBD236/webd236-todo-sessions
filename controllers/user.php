<?php
include_once "include/util.php";
include_once "models/user.php";

function get_login() {
  renderTemplate(
    "views/login_form.php",
    array(
      'title' => 'Log in',
    )
  );
}

/**
INSERT INTO "user" VALUES(1,'nobody@nowhere.com','v@larM0rghul1s','Arya','Stark');
INSERT INTO "user" VALUES(2,'ironborn@pyke.com','!r0nBorn','Theon','Greyjoy');
INSERT INTO "user" values(3,'alwayspayshisdebts@casterlyrock.com','th3Imp','Tyrion','Lannister');
*/

function post_login() {
  $form = safeParam($_POST, 'form');
  $email = safeParam($form, 'email');
  $password = safeParam($form, 'password');
  
  $user = findByEmailAndPassword($email, $password);
  if (!$user) {
    $errors = array("Bad username/password combination");
    renderTemplate(
      "views/login_form.php",
      array(
        'title' => 'Log in',
        'form' => $form,
        'errors' => $errors,
      )
    );
  } else {
    $_SESSION['user'] = $user;
    redirect("/index");
  }
}

function get_logout() {
  $_SESSION = array();
  session_destroy();
  redirect('/index');
}

function get_register() {
  renderTemplate(
    "views/register_form.php",
    array(
      'title' => 'Create an account',
      'form' => array(),
    )
  );
}

function get_register() {
  $form = safeParam($_POST, 'form');
  if (!form) {
    renderTemplate(
      "views/register_form.php",
      array(
        'title' => 'Create an account',
        'form' => array(),
        'errors' => array("No data submitted."),
      )
    );
  } else {
    $firstName = safeParam($form('firstName'));
    $lastName = safeParam($form('lastName'));
    $email1 = safeParam($form('email1'));
    $email2 = safeParam($form('email2'));
    $password1 = safeParam($form('password1'));
    $password2 = safeP
  }
  renderTemplate(
    "views/register_form.php",
    array(
      'title' => 'Create an account',
      'form' => array(),
    )
  );
}

?>
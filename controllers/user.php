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
    $redirect = $_SESSION['redirect'] ? $_SESSION['redirect'] : "/index";
    restartSession();
    redirect($redirect);
  }
}

function get_logout() {
  restartSession();
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

function verify_account($form) {
  $errors = array();
  
  if (!$form) {
    $errors[] = "No data submitted";
    return $errors;
  }
  
  $email1 = safeParam($form, 'email1');
  if (!$email1) {
    $errors['email1'] = "An email address must be provided";
  }
  $email2 = safeParam($form, 'email2');
  if ($email1 != $email2) {
    $errors['email2'] = "Email addresses must match";
  }
  $password1 = safeParam($form, 'password1');
  if (!$password1 || strlen($password1) < 8) {
    $errors['password1'] = "Passwords must be at least 8 characters long";
  }
  $password2 = safeParam($form, 'password2');
  if ($password1 != $password2) {
    $errors['password1'] = "Passwords must match";
  }
  $firstName = safeParam($form, 'firstName');
  if (!$firstName) {
    $errors['firstName'] = "A first name must be provided";
  }
  $lastName = safeParam($form, 'lastName');
  if (!$lastName) {
    $errors['lastName'] = "A last name must be provided";
  }
  
  return $errors;
}

function post_register() {
  $form = safeParam($_POST, 'form');
  $errors = verify_account($form);
  if ($errors) {
    renderTemplate(
      "views/register_form.php",
      array(
        'title' => 'Create an account',
        'form' => $form,
        'errors' => $errors,
      )
    );
  } else {
    $id = addUser($form['email1'], $form['password1'], $form['firstName'], $form['lastName']);
    restartSession();
    $_SESSION['user'] = findUserById($id);
    redirect("/index");
  }
}
?>
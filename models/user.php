<?php
include_once 'models/db.php';

function findUserById($id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM user WHERE id = ?');
  $st -> bindParam(1, $id);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findByEmailAndPassword($email, $password) {
  global $db;
  $st = $db -> prepare('SELECT * FROM user WHERE email = :email AND password = :password');
  $st -> bindParam(':email', $email);
  $st -> bindParam(':password', $password);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findAllUsers() {
  global $db;
  $st = $db -> prepare('SELECT * FROM user ORDER BY id');
  $st -> execute();
  return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function addUser($email, $password, $firstName="", $lastName="") {
  global $db;
  $statement = $db -> prepare("INSERT INTO user (email, password, firstName, lastName) values (:email, :password, :firstName, :lastName)");
  $statement -> bindParam(':email', $email);
  $statement -> bindParam(':password', $password);
  $statement -> bindParam(':firstName', $firstName);
  $statement -> bindParam(':lastName', $lastName);
  $statement -> execute();
  return $db->lastInsertId();
}
?>
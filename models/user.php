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
  $st = $db -> prepare('SELECT * FROM user WHERE email = ? AND password = ?');
  $st -> bindParam(1, $email);
  $st -> bindParam(1, $pasword);
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
  $statement = $db -> prepare("INSERT INTO user (email, password, firstName, lastName) values (?, ?, ?, ?)");
  $statement -> bindParam(1, $email);
  $statement -> bindParam(2, $password);
  $statement -> bindParam(3, $firstName);
  $statement -> bindParam(4, $lastName);
  $statement -> execute();
  return $db->lastInsertId();
}
?>
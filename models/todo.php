<?php
include_once 'models/db.php';

function findToDoById($id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM todo WHERE id = ?');
  $st -> bindParam(1, $id);
  $st -> execute();
  return $st -> fetch(PDO::FETCH_ASSOC);
}

function findAllCurrentToDos($user_id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM todo WHERE done = 0 AND user_id = :user_id ORDER BY id');
  $st -> bindParam(':user_id', $user_id);
  $st -> execute();
  return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function findAllDoneToDos($user_id) {
  global $db;
  $st = $db -> prepare('SELECT * FROM todo WHERE done != 0  AND user_id = :user_id ORDER BY id');
  $st -> bindParam(':user_id', $user_id);
  $st -> execute();
  return $st -> fetchAll(PDO::FETCH_ASSOC);
}

function addToDo($description, $user_id) {
  global $db;
  $statement = $db -> prepare("INSERT INTO todo (description, done, user_id) values (:description, 0, :user_id)");
  $st -> bindParam(':user_id', $user_id);
  $statement -> bindParam("1, $description);
  $statement -> execute();
  return $db->lastInsertId();
}

function toggleDoneToDo($id) {
  $todo = findToDoById($id);
  updateToDo($id, $todo['description'], $todo['done'] ? 0 : 1);
}

function updateToDo($id, $description, $done) {
  global $db;
  $statement = $db -> prepare("UPDATE todo SET description = ?, done = ? WHERE id = ?");
  $statement -> bindParam(1, $description);
  $statement -> bindParam(2, $done);
  $statement -> bindParam(3, $id);
  $statement -> execute();
}

function deleteToDo($id) {
  global $db;
  $statement = $db -> prepare("DELETE FROM todo WHERE id = ?");
  $statement -> bindParam(1, $id);
  $statement -> execute();
}
?>
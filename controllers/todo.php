<?php
include_once "include/util.php";
include_once "models/todo.php";

function safeParam($arr, $index, $default) {
  if ($arr && isset($arr[$index])) {
    return $arr[$index];
  }
  return $default;
}

function get_view($params) {
  $id = safeParam($params, 0, false);
  if ($id === false) {
    die("No todo id specified");
  }

  $todo = findToDoById($id);
  if (!$todo) {
    die("No todo with id $id found.");
  }
  renderTemplate(
    "views/todo_view.php",
    array(
      'title' => 'Viewing To Do',
      'todo' => $todo
    )
  );
}

function get_list($params) {
  $todos = findAllCurrentToDos();
  $dones = findAllDoneToDos();
  renderTemplate(
    "views/index.php",
    array(
      'title' => 'To Do List',
      'todos' => $todos,
      'dones' => $dones
    )
  );
}

function get_edit($params) {
  $id = safeParam($params, 0, false);
  if (!$id) {
    die("No todo specified");
  }
  $todo = findToDoById($id);
  if (!$todo) {
    die("No todo with id {$id} found.");
  }
  renderTemplate(
    "views/todo_edit.php",
    array(
      'title' => 'Editing To Do',
      'todo' => $todo
    )
  );
}

function post_done($params) {
  $id = safeParam($params, 0, false);
  if (!$id) {
      die("No todo specified");
  }
  toggleDoneToDo($id);
  redirectRelative("index");
}

function post_add($params) {
  $description = safeParam($_POST, 'description', '');
  if (!$description) {
    die("no description given");
  }
  addToDo($description);
  redirectRelative("index");
}

function validate_present($elements) {
  $errors = '';
  foreach ($elements as $element) {
    if (!isset($_POST[$element])) {
      $errors .= "Missing $element\n";
    }
  }
  return $errors;
}

function post_edit($params) {
  $errors = validate_present(array('id', 'description', 'done'));
  if ($errors) {
    die($errors);
  }
  $id = $_POST['id'];
  $description = $_POST['description'];
  $done = $_POST['done'];
  updateToDo($id, $description, $done);
  redirectRelative("index");
}

function post_delete($params) {
  $id = safeParam($params, 0, false);
  if (!$id) {
    die("No todo specified");
  }
  $todo = findToDoById($id);
  if (!$todo) {
    die("No todo found.");
  }
  deleteToDo($id);
  redirectRelative("index");
}

?>
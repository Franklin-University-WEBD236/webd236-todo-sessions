<?php
include_once "include/util.php";
include_once "models/todo.php";
include_once "controllers/todo.php";

function get_index($params) {
    error_log("This should appear in the log" . print_r($_SERVER, true));
    get_list($params);
}

?>
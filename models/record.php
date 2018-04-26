<?php
include_once 'db.inc';

function findRecordById($id) {
    return array(0 => array('id' => 1, 'name' => 'Joe', 'age' => 42));
}

function findRecordAll() {
    return array(0 => array('id' => 1, 'name' => 'Joe', 'age' => 42), 1 => array('id' => 2, 'name' => 'Bob', 'age' => 57));
}
?>
<?php
include_once "include/util.php";
include_once "models/record.php";

function safeGetParam($arr, $index, $default) {
    if ($arr && isset($arr[$index])) {
        return $arr[$index];
    }
    return $default;
}

function get_view($params) {
    $id = safeGetParam($params, 0, "blah");
    $rows = findRecordById($id);
    // render("record", array('id' => $id, 'rows' => $rows));
    renderTemplate("views/testing.php",
        array(
            'title' => 'Templates',
            'id' => $id,
            'rows' => $rows
        ));
}

function get_list($params) {
    $rows = findRecordAll();
    render("record_list", array('rows' => $rows));
}

function get_delete($params) {
    #do the deletion
    redirect_relative("record/view");
}
?>

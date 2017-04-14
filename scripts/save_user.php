<?php

require_once 'session.php';
require_once 'connection.php';
$level_session = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit
$level = isset($_POST['level']) ? $mysqli->real_escape_string($_POST['level']) : '';
$real_name = isset($_POST['real_name']) ? $mysqli->real_escape_string($_POST['real_name']) : '';
$login = isset($_POST['login']) ? $mysqli->real_escape_string($_POST['login']) : '';
$password = isset($_POST['password2']) ? $mysqli->real_escape_string($_POST['password2']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;

$sql = "";
switch ($mode) {
    case "add":
        $sql = "INSERT INTO user (`login`,`real_name`,`level`,`password`) ";
        $sql .= " VALUES('" . $login . "','" . $real_name . "','" . $level . "','" . $password . "')";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Add user Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'edit':
        //if (($user_level == 'admin') || ($user_level == 'reseller')) {
        $sql = "UPDATE user SET login='" . $login . "',real_name='" . $real_name . "',level='" . $level . "'";
        if ($password != "") {
            $sql .= ",password=password('" . $password . "')";
        }
        $sql .= " where id='" . $id . "'";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Edit user Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'delete':
        $sql = "DELETE FROM user where id='" . $id . "'";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Delete user Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
}
$mysqli->close();
print json_encode($response);
?>
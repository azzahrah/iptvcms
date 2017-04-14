<?php

require_once 'session.php';
require_once 'connection.php';
$level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;

$sql = "";
switch ($mode) {
    case 'delete':
        $sql = "DELETE FROM logs where id='" . $id . "'";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Delete log Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
    case 'clear':
        $sql = "DELETE FROM logs";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Clear log Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
}
$mysqli->close();
print json_encode($response);
?>
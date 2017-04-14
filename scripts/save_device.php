<?php
require_once 'session.php';
require_once 'connection.php';
$level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit
$name = isset($_POST['name']) ? $mysqli->real_escape_string($_POST['name']) : '';
$mac = isset($_POST['mac']) ? $mysqli->real_escape_string($_POST['mac']) : '';
$ip = isset($_POST['ip']) ? $mysqli->real_escape_string($_POST['ip']) : '';
$descr = isset($_POST['descr']) ? $mysqli->real_escape_string($_POST['descr']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;

$sql = "";
switch ($mode) {
    case "add":
        $sql = "INSERT INTO devices (`name`,`mac`,`ip`,`descr`) ";
        $sql .= " VALUES('" . $name . "','" . $mac . "','" . $ip . "','" . $descr . "')";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Add Device Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'edit':
        //if (($user_level == 'admin') || ($user_level == 'reseller')) {
        $sql = "UPDATE devices SET name='" . $name . "',ip='" . $ip . "',mac='" . $mac . "',descr='" . $descr . "' where id='". $id ."'";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Edit Device Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'delete':
        $sql = "DELETE FROM Device where id='" . $id . "'";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Delete Device Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
}
$mysqli->close();
print json_encode($response);
?>
<?php
require_once 'session.php';
require_once 'connection.php';
$level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit
$nomor = isset($_POST['nomor']) ? intval($_POST['nomor']) : 0;
$name = isset($_POST['name']) ? $mysqli->real_escape_string($_POST['name']) : '';
$category = isset($_POST['category']) ? $mysqli->real_escape_string($_POST['category']) : '';
$url = isset($_POST['url']) ? $mysqli->real_escape_string($_POST['url']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;

$sql = "";
switch ($mode) {
    case "add":
        $sql = "INSERT INTO channels (`nomor`,`name`,`category`,`url`) ";
        $sql .= " VALUES(";
        $sql .= "'" . $nomor . "','" . $name . "','" . $category . "',";
        $sql .= "'" . $url . "')";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Add Channel Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'edit':
        //if (($user_level == 'admin') || ($user_level == 'reseller')) {
        $sql = "UPDATE channels SET nomor='" . $nomor . "',name='" . $name . "',category='" . $category . "',";
        $sql .= "url='" . $url . "' where id='". $id ."'";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Edit Channel Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'delete':
        $sql = "DELETE FROM channels where id='" . $id . "'";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Delete Channel Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
}
$mysqli->close();
print json_encode($response);
?>
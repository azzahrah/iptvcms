<?php
require_once 'session.php';
require_once 'connection.php';
$level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit
$runningtext = isset($_POST['runningtext']) ? $mysqli->real_escape_string($_POST['runningtext']) : '';
$visible = isset($_POST['visible']) ? intval($_POST['visible']) : 0;
$url = isset($_POST['url']) ? $mysqli->real_escape_string($_POST['url']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;

$sql = "";
switch ($mode) {
    case "add":
        $sql = "INSERT INTO runningtext (`runningtext`,`visible`) ";
        $sql .= " VALUES('" . $runningtext . "','" . $visible . "')";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Add runningtext Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'edit':
        //if (($user_level == 'admin') || ($user_level == 'reseller')) {
        $sql = "UPDATE runningtext SET runningtext='" . $runningtext . "',visible='" . $visible . "' where id='". $id ."'";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Edit runningtext Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        $mysqli->close();
        break;
    case 'delete':
        $sql = "DELETE FROM runningtext where id='" . $id . "'";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Delete runningtext Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
}
$mysqli->close();
print json_encode($response);
?>
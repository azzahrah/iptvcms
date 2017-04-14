<?php
require_once 'session.php';
require_once 'connection.php';
$level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit
$channel_id = isset($_POST['channel_id']) ? intval($_POST['channel_id']) : 0;
$start_time= isset($_POST['start_time']) ? $mysqli->real_escape_string($_POST['start_time']) : '';
$descr= isset($_POST['descr']) ? $mysqli->real_escape_string($_POST['descr']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;

$sql = "";
switch ($mode) {
    case "add":
        $sql = "INSERT INTO schedule (`start_time`,`channel_id`,`descr`) ";
        $sql .= " VALUES(";
        $sql .= "'" . $start_time . "','" . $channel_id . "','" . $descr . "')";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Add Schedule Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'edit':
        //if (($user_level == 'admin') || ($user_level == 'reseller')) {
        $sql = "UPDATE schedule SET start_time='" . $start_time . "',channel_id='" . $channel_id . "',";
        $sql .= "descr='" . $descr . "' where id='". $id ."'";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Edit Schedule Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'delete':
        $sql = "DELETE FROM schedule where id='" . $id . "'";
        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Delete Schedule Success';
        } else {
            $response['msg'] = $mysqli->error;
        }

        break;
}
$mysqli->close();
print json_encode($response);
?>
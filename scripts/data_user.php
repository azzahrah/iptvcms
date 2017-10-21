<?php
require_once("session.php");
require_once("connection.php");
$session_level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : 'user';
$session_id = isset($_SESSION['user_id']) ? $mysqli->real_escape_string($_SESSION['user_id']) : '0';

    
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
$offset = ($page - 1) * $rows;

$sqlQuery = ""; // "SELECT * from view_edit_vehicle";
$sqlCount = ""; // "select count(*) from view_edit_vehicle ";

$response['total'] = 0;
$response['rows'] = array();

$sqlQuery = "SELECT * from view_user where id='". $session_id ."' order by real_name DESC limit $offset,$rows";
$sqlCount = "select count(*) as total from view_user where id='". $session_id ."'";

if($session_level=='admin'){
    $sqlQuery = "SELECT * from view_user order by real_name DESC limit $offset,$rows";
    $sqlCount = "select count(*) as total from view_user";
}
$result = $mysqli->query($sqlCount);
if ($result) {
    $row = $result->fetch_assoc();
    $response['total'] = $row["total"];
    $result->free();
}
$result = $mysqli->query($sqlQuery);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        array_push($response["rows"], $row);
    }
    $result->free();
}
$mysqli->close();
echo json_encode($response);
?>
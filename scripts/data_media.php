<?php
require_once("connection.php");
$session_level = isset($_POST['user_level']) ? $mysqli->real_escape_string($_POST['user_level']) : 'user';
$session_id = isset($_POST['user_id']) ? $mysqli->real_escape_string($_POST['user_id']) : '0';
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
$offset = ($page - 1) * $rows;

$sqlQuery = ""; // "SELECT * from view_edit_vehicle";
$sqlCount = ""; // "select count(*) from view_edit_vehicle ";

$response['total'] = 0;
$response['rows'] = array();

$sqlQuery = "SELECT * from view_media order by id ASC limit $offset,$rows";
$sqlCount = "select count(*) as total from view_media";
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
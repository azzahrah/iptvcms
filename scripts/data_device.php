<?php
require_once("connection.php");
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 15;
$offset = ($page - 1) * $rows;

$sqlQuery = ""; // "SELECT * from view_edit_vehicle";
$sqlCount = ""; // "select count(*) from view_edit_vehicle ";

$response['total'] = 0;
$response['rows'] = array();

$sqlQuery = "SELECT * from devices order by name DESC limit $offset,$rows";
$sqlCount = "select count(*) as total from devices";
$result = $mysqli->query($sqlCount);
if ($result) {
    $row = $result->fetch_assoc();
    $response["total"] = $row["total"];
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
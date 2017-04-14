<?php
require_once("session.php");
require_once("connection.php");
$where = isset($_POST['q']) ? " WHERE name LIKE '%" . $mysqli->real_escape_string($_POST['q']) . "%'" : "";
$sql = "select * from view_channels " . $where;

$rs = $mysqli->query($sql);
$response = array();
if ($rs) {
    while ($row = $rs->fetch_assoc()) {
        array_push($response, $row);
    }
    $rs->free();
}
$mysqli->close();
echo json_encode($response, true);
?>
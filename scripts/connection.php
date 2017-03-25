<?php
$mysqli = new mysqli("localhost", "root", "Azzahrah2014", "iptvcms");
if ($mysqli->connect_errno) {
    echo "Error Connect Database";
    exit;
}
?>

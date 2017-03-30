<?php
require_once 'f.php';
$iptv=new IPTV();
$response=$iptv->load_setting();
echo json_encode($response);
?>
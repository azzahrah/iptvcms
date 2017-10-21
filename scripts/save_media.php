<?php

require_once 'session.php';
require_once 'connection.php';
$level = isset($_SESSION['user_level']) ? $mysqli->real_escape_string($_SESSION['user_level']) : '';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0; //755
$mode = isset($_POST['mode']) ? $mysqli->real_escape_string($_POST['mode']) : ''; //edit
$descr = isset($_POST['descr']) ? $mysqli->real_escape_string($_POST['descr']) : '';
$category = isset($_POST['category']) ? $mysqli->real_escape_string($_POST['category']) : '';

$response = array();
$response['code'] = 'ERROR';
$response['msg'] = '';
$response['mode'] = $mode;




$sql = "";
switch ($mode) {
    case "add":
        
        $sql = "INSERT INTO media (`file`,`descr`) ";
        $sql .= " VALUES(";
        $sql .= "'" . $nomor . "','" . $name . "','" . $category . "',";
        $sql .= "'" . $url . "')";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Add Channel Success';

            if (isset($_FILES['file'])) {
                $errors = array();
                $file_name = $_FILES['file']['name'];
                $file_size = $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));

                $file=date("YmdHisu").".". $file_ext;
                
                $extensions = array("mp4", "avi", "flv");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "mp4s/" . $file_name);
                    echo "Success";
                } else {
                    print_r($errors);
                }
            }
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'edit':
        //if (($user_level == 'admin') || ($user_level == 'reseller')) {
        $sql = "UPDATE media SET nomor='" . $nomor . "',name='" . $name . "',category='" . $category . "',";
        $sql .= "url='" . $url . "' where id='" . $id . "'";

        if ($mysqli->query($sql)) {
            $response['code'] = 'SUCCESS';
            $response['msg'] = 'Edit Channel Success';
        } else {
            $response['msg'] = $mysqli->error;
        }
        break;
    case 'delete':
        $sql = "DELETE FROM media where id='" . $id . "'";
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
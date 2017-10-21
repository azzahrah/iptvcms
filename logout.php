<?php
session_start();
unset($_SESSION['user_id']);// = $row['id'];
unset($_SESSION['user_login']);// = $row['login'];
unset($_SESSION['user_name']);// = $row['real_name'];
unset($_SESSION['user_level']);// = $row['level'];
header('Location:login.php');
?>
<?php
session_start();
error_reporting(0);
$varsesion=$_SESSION['id_admin'];
if($varsesion==null || $varsesion=''){
    die();
}
session_destroy();
header("location:../index.php");
?>
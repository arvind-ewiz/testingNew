<?php
include("loginclass.php");
$user=$_POST[uname];
$pass=$_POST[upass];
$log=new login;
$log->checklogin($user,$pass);
?>

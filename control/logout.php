<?php
session_start();
date_default_timezone_set("Asia/Phnom_Penh");
require('../model/config.php');
require('../model/connect.php');
$classlogout = new db();
$connect     = $classlogout->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$test = $classlogout->checklogs($connect,'logs',"logoutdatetime='".date("Y-m-d H:i:s")."',logouttext='logout'","loguser='".$_SESSION['userkey']."'");
if($test){ echo "ok";}else{ echo 'No';}
unset($_SESSION['id']);
unset($_SESSION['active']);
unset($_SESSION['userkey']);
unset($_SESSION['lang']);
header('location:../index.php');
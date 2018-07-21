<?php
session_start();
require('../model/config.php');
require('../model/connect.php');
$classlogin = new db();
$connect    = $classlogin->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$check      = $classlogin->mysqlshowrow($connect,'scdc_user','username="'.$_POST['username'].'"');
if($check == 0){
    header('location:../index.php?p=n');
}else{
   $info = $classlogin->mysqlselect($connect,Null,'scdc_user','username="'.$_POST['username'].'"');
   while($getinfo = mysqli_fetch_object($info)){
       $getpassword = $_POST['password'];
       if($getinfo->userpassword != $getpassword){
           header('location:../index.php?p=n'); 
       }else{
           $_SESSION['id']      = $getinfo->userid;
           $_SESSION['active']  = $getinfo->useractive;
           $_SESSION['userkey'] = $getinfo->userkey;
           $_SESSION['lang']    = $getinfo->userlanguage;
           $classlogin->insertlogs($connect,'logs',"loguser='".$getinfo->userkey."',logadddatetime='".date("Y-m-d H:i:s")."',logaddtext='".$getinfo->firstname." login'");
           if($getinfo->useractive != 1){
               header('location:logout.php');
           }else{
               header('location:../view/indexview.php');
           }
       }
   }
}
$classlogin->mysqlclose($connect);
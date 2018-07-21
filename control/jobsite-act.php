<?php
require('../model/config.php');
require('../model/connect.php');
$classjobsite = new db();
$connect  = $classjobsite->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(filter_input(INPUT_GET, 'jobsite') == 'insert'){
    $jobcode   = filter_input(INPUT_POST, 'jobcode');
    $jobname   = filter_input(INPUT_POST, 'jobname');
    $promanager = filter_input(INPUT_POST, 'promanager');
    $tolat    = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE jobsite AUTO_INCREMENT = ".$tolat);
    $result    = $classjobsite->mysqlinsert($connect,'jobsite', "jobcode ='".$jobcode."',jobname = '".$jobname."',promanager = '".$promanager."',adddate ='".date("Y-m-d H:i:s")."'");
    if($result == 1){
        header('location:../view/indexview.php?p=jobsite&notification=in');
    }else{
        echo 'No success';
    }
    
}
if (filter_input(INPUT_GET, 'jobsite') == 'edit') {
    $jobsiteid= filter_input(INPUT_POST,'jobsiteid',FILTER_VALIDATE_INT);
    $result   = $classjobsite->mysqlselect($connect,Null,'jobsite',"jobid = {$jobsiteid}");
    $getdata  = mysqli_fetch_object($result);
    $jjobid   = $getdata->jobid;
    $jjobcode = $getdata->jobcode;
    $jjobname   = $getdata->jobname;
    $jpromanager   = $getdata->promanager;
    
    $data_return = array(
        'jjobid'       => $jjobid,
        'jjobcode'     => $jjobcode,
        'jjobname'     => $jjobname,
        'jpromanager'  => $jpromanager
    );
header("Content-type:text/x-json");
echo json_encode($data_return);
}
if(filter_input(INPUT_GET, 'jobsite') == 'update'){
    $jobid     = filter_input(INPUT_POST,'jobid',FILTER_VALIDATE_INT);
    $jobcode   = filter_input(INPUT_POST,'jobcode');
    $jobname   = filter_input(INPUT_POST,'jobname');
    $promanager = filter_input(INPUT_POST,'promanager');
    $result    = $classjobsite->mysqlupdate($connect,'jobsite','jobcode = "'.$jobcode.'",jobname = "'.$jobname.'",promanager = "'.$promanager.'",addmodified ="'.date("Y-m-d H:i:s").'"',"jobid = {$jobid}");
    if($result == 1){
        header('location:../view/indexview.php?p=jobsite&notification=up');
    }else{
        echo "TEXT DO NOT Double-digit";
    }
}
if(filter_input(INPUT_GET, 'jobsite') == 'delete'){
    $jobid = filter_input(INPUT_GET, 'id');
    $result = $classjobsite->mysqldelete($connect, 'jobsite',"jobid = {$jobid}" );
    if ($result == 1) {
        header('location:../view/indexview.php?p=jobsite&notification=de');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}

if(filter_input(INPUT_GET, 'jobsite') == 'change'){
    $id      = filter_input(INPUT_GET, 'id');
    $ac      = filter_input(INPUT_GET, 'ac');
    $result  =  $classjobsite->mysqlupdate($connect,'jobsite','active = "'.$ac.'"',"jobid = {$id}");
    if ($result == TRUE) {
        header('location:../view/indexview.php?p=jobsite&notification=in');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}
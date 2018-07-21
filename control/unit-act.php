<?php
require('../model/config.php');
require('../model/connect.php');
$classunit = new db();
$connect  = $classunit->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(filter_input(INPUT_GET, 'unit') == 'insert'){
    $uniten   = filter_input(INPUT_POST, 'uniten');
    $unitth   = filter_input(INPUT_POST, 'unitth');
    $unitkh   = filter_input(INPUT_POST, 'unitkh');
    $tolat    = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE unit AUTO_INCREMENT = ".$tolat);
    $result    = $classunit->mysqlinsert($connect,'unit', "unitnameen ='".$uniten."',unitnameth = '".$unitth."',unitnamekh = '".$unitkh."',adddate ='".date("Y-m-d H:i:s")."'");
    if($result == 1){
        header('location:../view/indexview.php?p=unit&notification=in');
    }else{
        echo 'No success';
    }
    
}
if (filter_input(INPUT_GET, 'unit') == 'edit') {
    $id       = filter_input(INPUT_POST,'unitid',FILTER_VALIDATE_INT);
    $result   = $classunit->mysqlselect($connect,Null,'unit',"id = {$id}");
    $getdata  = mysqli_fetch_object($result);
    $unitid   = $getdata->id;
    $unitnameen = $getdata->unitnameen;
    $unitnameth   = $getdata->unitnameth;
    $unitnamekh   = $getdata->unitnamekh;
    
    $data_return = array(
        'junitid'     => $unitid,
        'juniten'     => $unitnameen,
        'junitth'     => $unitnameth,
        'junitkh'     => $unitnamekh
    );
header("Content-type:text/x-json");
echo json_encode($data_return);
}
if(filter_input(INPUT_GET, 'unit') == 'update'){
    $unitid     = filter_input(INPUT_POST,'unitid',FILTER_VALIDATE_INT);
    $uniten     = filter_input(INPUT_POST,'uniten');
    $unitth     = filter_input(INPUT_POST,'unitth');
    $unitkh     = filter_input(INPUT_POST,'unitkh');
    $result    = $classunit->mysqlupdate($connect,'unit','unitnameen = "'.$uniten.'",unitnameth = "'.$unitth.'",unitnamekh = "'.$unitkh.'",addmodified ="'.date("Y-m-d H:i:s").'"',"id = {$unitid}");
    if($result == 1){
        header('location:../view/indexview.php?p=unit&notification=up');
    }else{
        echo "TEXT DO NOT Double-digit";
    }
}
if(filter_input(INPUT_GET, 'unit') == 'delete'){
    $unitid = filter_input(INPUT_GET, 'id');
    $result = $classunit->mysqldelete($connect, 'unit',"id = {$unitid}" );
    if ($result == 1) {
        header('location:../view/indexview.php?p=unit&notification=de');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}
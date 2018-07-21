<?php
require('../model/config.php');
require('../model/connect.php');
$classwh = new db();
$connect  = $classwh->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(filter_input(INPUT_GET, 'warehouse') == 'insert'){
    $whname      = filter_input(INPUT_POST, 'whname');
    $whaddress   = filter_input(INPUT_POST, 'whaddress');
    $whcontact   = filter_input(INPUT_POST, 'whcontact');
    $whtel       = filter_input(INPUT_POST, 'whtel');
    $tolat        = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE warehouse AUTO_INCREMENT = ".$tolat);
    $result      = $classwh->mysqlinsert($connect,'warehouse', "whname ='".$whname."',address = '".$whaddress."',contact = '".$whcontact."',tel = '".$whtel."',dateadd ='".date("Y-m-d H:i:s")."'");
    if($result == 1){
        header('location:../view/indexview.php?p=warehouse&notification=in');
    }else{
        echo 'No success';
    }
    
}
if (filter_input(INPUT_GET, 'warehouse') == 'edit') {
    $id       = filter_input(INPUT_POST,'warehouseid',FILTER_VALIDATE_INT);
    $result   = $classwh->mysqlselect($connect,Null,'warehouse',"id = {$id}");
    $getdata  = mysqli_fetch_object($result);
    $whid     = $getdata->id;
    $whname   = $getdata->whname;
    $whaddress   = $getdata->address;
    $whcontact   = $getdata->contact;
    $whtel       = $getdata->tel;
    
    $data_return = array(
        'jwhid'     => $whid,
        'jwhname'     => $whname,
        'jaddress'     => $whaddress,
        'jcontact'     => $whcontact,
        'jtel'         => $whtel
    );
header("Content-type:text/x-json");
echo json_encode($data_return);
}

if(filter_input(INPUT_GET, 'warehouse') == 'update'){
    $whid       = filter_input(INPUT_POST,'whid',FILTER_VALIDATE_INT);
    $whname     = filter_input(INPUT_POST,'whname');
    $whaddress  = filter_input(INPUT_POST,'whaddress');
    $whcontact  = filter_input(INPUT_POST,'whcontact');
    $whtel      = filter_input(INPUT_POST,'whtel');
    $result    = $classwh->mysqlupdate($connect,'warehouse','whname = "'.$whname.'",address = "'.$whaddress.'",contact = "'.$whcontact.'",tel = "'.$whtel.'",datemodified ="'.date("Y-m-d H:i:s").'"',"id = {$whid}");
    if($result == TRUE){
        header('location:../view/indexview.php?p=warehouse&notification=up');
    }else{
        echo "TEXT DO NOT Double-digit";
    }
}
if(filter_input(INPUT_GET, 'warehouse') == 'delete'){
    $whid = filter_input(INPUT_GET, 'id');
    $result = $classwh->mysqldelete($connect, 'warehouse',"id = {$whid}" );
    if ($result == TRUE) {
        header('location:../view/indexview.php?p=warehouse&notification=de');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}

if(filter_input(INPUT_GET, 'warehouse') == 'change'){
    $id      = filter_input(INPUT_GET, 'id');
    $ac      = filter_input(INPUT_GET, 'ac');
    $result  =  $classwh->mysqlupdate($connect,'warehouse','active = "'.$ac.'"',"id = {$id}");
    if ($result == TRUE) {
        header('location:../view/indexview.php?p=warehouse&notification=in');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}
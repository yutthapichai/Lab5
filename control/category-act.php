<?php
require('../model/config.php');
require('../model/connect.php');
$classcate = new db();
$connect  = $classcate->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(filter_input(INPUT_GET, 'cate') == 'insert'){
    $catecode     = filter_input(INPUT_POST, 'catecode');
    $catenameen   = filter_input(INPUT_POST, 'catenameen');
    $catenameth   = filter_input(INPUT_POST, 'catenameth');
    $catenamekh   = filter_input(INPUT_POST, 'catenamekh');
    $tolat        = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE category AUTO_INCREMENT = ".$tolat);
    $result      = $classcate->mysqlinsert($connect,'category', "catecode ='".$catecode."',parentid = '0',catenameen = '".$catenameen."',catenameth = '".$catenameth."',catenamekh = '".$catenamekh."',adddate ='".date("Y-m-d H:i:s")."'");
    if($result == 1){
        header('location:../view/indexview.php?p=category&notification=in');
    }else{
        echo 'No success';
    }
    
}

if(filter_input(INPUT_GET, 'cate') == 'add'){
    $parentid     = filter_input(INPUT_POST, 'cateid');
    $catecode     = filter_input(INPUT_POST, 'catecode');
    $catenameen   = filter_input(INPUT_POST, 'catenameen');
    $catenameth   = filter_input(INPUT_POST, 'catenameth');
    $catenamekh   = filter_input(INPUT_POST, 'catenamekh');
    $tolat        = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE category AUTO_INCREMENT = ".$tolat);
    $result      = $classcate->mysqlinsert($connect,'category', "catecode ='".$catecode."',parentid = '".$parentid."',catenameen = '".$catenameen."',catenameth = '".$catenameth."',catenamekh = '".$catenamekh."',adddate ='".date("Y-m-d H:i:s")."'");
    if($result == 1){
        header('location:../view/indexview.php?p=category&notification=in');
    }else{
        echo 'No success';
    }
    
}

if (filter_input(INPUT_GET, 'cate') == 'edit') {
    $id       = filter_input(INPUT_POST,'cateid',FILTER_VALIDATE_INT);
    $result   = $classcate->mysqlselect($connect,Null,'category',"cateid = {$id}");
    $getdata  = mysqli_fetch_object($result);
    $cateid     = $getdata->cateid;
    $catecode   = $getdata->catecode;
    $catenameen   = $getdata->catenameen;
    $catenameth   = $getdata->catenameth;
    $catenamekh   = $getdata->catenamekh;
    
    $data_return = array(
        'jcateid'         => $cateid,
        'jcatecode'       => $catecode,
        'jcatenameen'     => $catenameen,
        'jcatenameth'     => $catenameth,
        'jcatenamekh'     => $catenamekh
    );
header("Content-type:text/x-json");
echo json_encode($data_return);
}

if(filter_input(INPUT_GET, 'cate') == 'update'){
    $cateid      = filter_input(INPUT_POST,'cateid',FILTER_VALIDATE_INT);
    $catecode    = filter_input(INPUT_POST,'catecode');
    $catenameen  = filter_input(INPUT_POST,'catenameen');
    $catenameth  = filter_input(INPUT_POST,'catenameth');
    $catenamekh  = filter_input(INPUT_POST,'catenamekh');
    $result    = $classcate->mysqlupdate($connect,'category','catecode = "'.$catecode.'",catenameen = "'.$catenameen.'",catenameth = "'.$catenameth.'",catenamekh = "'.$catenamekh.'",datemodified ="'.date("Y-m-d H:i:s").'"',"cateid = {$cateid}");
    if($result == TRUE){
        header('location:../view/indexview.php?p=category&notification=up');
    }else{
        echo "TEXT DO NOT Double-digit";
    }
}

if(filter_input(INPUT_GET, 'cate') == 'delete'){
    $cateid = filter_input(INPUT_GET, 'id');
    $result = $classcate->mysqldelete($connect, 'category',"cateid = {$cateid} or parentid = {$cateid}" );
    if ($result == 1) {
        header('location:../view/indexview.php?p=category&notification=de');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}
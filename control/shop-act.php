<?php
require('../model/config.php');
require('../model/connect.php');
$classshop = new db();
$connect  = $classshop->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(filter_input(INPUT_GET, 'shop') == 'insert'){
    $codeshop  = filter_input(INPUT_POST, 'shopcode');
    $codeshop .= filter_input(INPUT_POST, 'shopcode2');
    $codeshop .= filter_input(INPUT_POST, 'shopcode3');
    $rownum    = $classshop->mysqlshowrow($connect,'shop','shopcode LIKE  "'.$codeshop.'%"');
    if($rownum == 0){ $shopcode4 = "01";}else{  
        for($c=1;$c<=$rownum;$c++){
            $shopid = $c+1;
        } 
        $shopcode4 = sprintf("%02d", $shopid);
    }
    $codeshop .= $shopcode4;
    $shopen   = filter_input(INPUT_POST, 'shopen');
    $shopth   = filter_input(INPUT_POST, 'shopth');
    $shopkh   = filter_input(INPUT_POST, 'shopkh');
    $address  = filter_input(INPUT_POST, 'address');
    $contact  = filter_input(INPUT_POST, 'contact');
    $tel      = filter_input(INPUT_POST, 'tel');
    $email    = filter_input(INPUT_POST, 'email');
    $payment  = filter_input(INPUT_POST, 'payment');
    if($payment == 1){ $payment2 = 'Cash';}else if($payment == 2){ $payment2 = 'Credit 7 day';}else if($payment == 3){ $payment2 = 'Credit 15 day';}else if($payment == 4){ $payment2 = 'Credit 30 day';}else{ $payment2 = '';}
    $tolat    = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE shop AUTO_INCREMENT = ".$tolat);
    $result    = $classshop->mysqlinsert($connect,'shop', "shopcode ='".$codeshop."',shopnameen ='".$shopen."',shopnameth = '".$shopth."',shopnamekh = '".$shopkh."',shopaddress = '".$address."',shopcontact = '".$contact."',shoptel='".$tel."',payment = '".$payment2."',shopemail = '".$email."',dateadd ='".date("Y-m-d H:i:s")."'");
    $idshop    = mysqli_insert_id($connect);
    $a   = filter_input(INPUT_POST, 'a');if($a != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$a."',shopid = '".$idshop."'"); }
    $b   = filter_input(INPUT_POST, 'b');if($b != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$b."',shopid = '".$idshop."'"); }
    $c   = filter_input(INPUT_POST, 'c');if($c != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$c."',shopid = '".$idshop."'"); }
    $d   = filter_input(INPUT_POST, 'd');if($d != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$d."',shopid = '".$idshop."'"); }
    $e   = filter_input(INPUT_POST, 'e');if($e != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$e."',shopid = '".$idshop."'"); }
    $f   = filter_input(INPUT_POST, 'f');if($f != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$f."',shopid = '".$idshop."'"); }
    $g   = filter_input(INPUT_POST, 'g');if($g != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$g."',shopid = '".$idshop."'"); }
    $h   = filter_input(INPUT_POST, 'h');if($h != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$h."',shopid = '".$idshop."'"); }
    $i   = filter_input(INPUT_POST, 'i');if($i != NULL){ $put = $classshop->mysqlinsert($connect, "business","name = '".$i."',shopid = '".$idshop."'"); }
    if($result == 1){
        header('location:../view/indexview.php?p=shop&notification=in');
    }else{
        echo 'No success';
    }
    
}
if (filter_input(INPUT_GET, 'shop') == 'edit') {
    $id           = filter_input(INPUT_POST,'shopid',FILTER_VALIDATE_INT);
    $result       = $classshop->mysqlselect($connect,Null,'shop',"shopid = {$id}");
    $getdata      = mysqli_fetch_object($result);
    $shopid       = $getdata->shopid;
    $shopnameen   = $getdata->shopnameen;
    $shopnameth   = $getdata->shopnameth;
    $shopnamekh   = $getdata->shopnamekh;
    $shopaddress  = $getdata->shopaddress;
    $shopcontact  = $getdata->shopcontact;
    $shoptel      = $getdata->shoptel;
    $shopemail    = $getdata->shopemail;
    
    $data_return = array(
        'jshopid'     => $shopid,
        'jshopen'     => $shopnameen,
        'jshopth'     => $shopnameth,
        'jshopkh'     => $shopnamekh,
        'jaddress'    => $shopaddress,
        'jcontact'    => $shopcontact,
        'jtel'        => $shoptel,
        'jemail'      => $shopemail
    );
header("Content-type:text/x-json");
echo json_encode($data_return);
}
if(filter_input(INPUT_GET, 'shop') == 'update'){
    $shopid      = filter_input(INPUT_POST,'shopid',FILTER_VALIDATE_INT);
    $shopen      = filter_input(INPUT_POST,'shopen');
    $shopth      = filter_input(INPUT_POST,'shopth');
    $shopkh      = filter_input(INPUT_POST,'shopkh');
    $shopaddress = filter_input(INPUT_POST,'shopaddress');
    $shopcontact = filter_input(INPUT_POST,'shopcontact');
    $shoptel     = filter_input(INPUT_POST,'shoptel');
    $shopemail   = filter_input(INPUT_POST,'shopemail',FILTER_VALIDATE_EMAIL);
    $result      = $classshop->mysqlupdate($connect,'shop','shopnameen = "'.$shopen.'",shopnameth = "'.$shopth.'",shopnamekh = "'.$shopkh.'",shopaddress = "'.$shopaddress.'",shopcontact = "'.$shopcontact.'",shoptel="'.$shoptel.'",shopemail = "'.$shopemail.'",datemodified ="'.date("Y-m-d H:i:s").'"',"shopid = {$shopid}");
    if($result == 1){
        header('location:../view/indexview.php?p=shop&notification=up');
    }else{
        echo "TEXT DO NOT Double-digit";
    }
}
if(filter_input(INPUT_GET, 'shop') == 'delete'){
    $shopid = filter_input(INPUT_GET, 'id');
    $result = $classshop->mysqldelete($connect, 'shop',"shopid = {$shopid}" );
    $result2 = $classshop->mysqldelete($connect, 'business',"shopid = {$shopid}" );
    if ($result == 1) {
        header('location:../view/indexview.php?p=shop&notification=de');
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}
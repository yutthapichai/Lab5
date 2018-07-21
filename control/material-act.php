<?php
require('../model/config.php');
require('../model/connect.php');
require('../model/function.php');
$classmat = new db();/* if you change page you have to all change */
$connect  = $classmat->mysqlconnect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
if (filter_input(INPUT_GET, 'what') == 'edit') {
    $id       = filter_input(INPUT_POST,'matid',FILTER_VALIDATE_INT);
    $result   = $classmat->mysqlselect($connect,Null,'tbl_item',"item_id = {$id}");
    $getdata  = mysqli_fetch_object($result);
    $item_id        = $getdata->item_id;
    $mat_code       = $getdata->mat_code;
    $item_name_en   = $getdata->item_name_en;
    $item_name_th   = $getdata->item_name_th;
    $item_name_kh   = $getdata->item_name_kh;
    $unitprice      = $getdata->unitprice;
    $unit           = $getdata->unit;
    $matlocation    = $getdata->location;
    
    $data_return = array(
        'jitem_id'      => $item_id,
        'jmat_code'     => $mat_code,
        'jitem_name_en' => $item_name_en,
        'jitem_name_th' => $item_name_th,
        'jitem_name_kh' => $item_name_kh,
        'junitprice'    => $unitprice,
        'junit'         => $unit,
        'jlocation'     => $matlocation
    );
header("Content-type:text/x-json");
echo json_encode($data_return);

}


if(filter_input(INPUT_GET, 'what') == 'update'){
    $matid        = filter_input(INPUT_POST,'matid',FILTER_VALIDATE_INT);
    $matcode      = filter_input(INPUT_POST,'matcode');
    $matnameen    = filter_input(INPUT_POST,'matnameen');
    $matnameth    = filter_input(INPUT_POST,'matnameth');
    $matnamekh    = filter_input(INPUT_POST,'matnamekh');
    $matunit      = filter_input(INPUT_POST,'matunit');
    $matunitprice = filter_input(INPUT_POST,'matunitprice');
    $matlocation  = filter_input(INPUT_POST,'matlocation');
    $result       = $classmat->mysqlupdate($connect,'tbl_item','mat_code = "'.$matcode.'",item_name_en = "'.$matnameen.'",item_name_th = "'.$matnameth.'",item_name_kh = "'.$matnamekh.'",unitprice = "'.$matunitprice.'",unit="'.$matunit.'",location = "'.$matlocation.'"',"item_id = {$matid}");
    if($result == 1){
        
        $perpage = 15;$x = "";
        $total = $classmat->mysqlshowrow($connect,'tbl_item',NULL);
        $totalpage = ceil($total / $perpage);
        for ($i = 1; $i <= $totalpage; $i++) {
            if($matid <= ($i*15)){ $x = $i;break;}
        }
        
        header('location:../view/indexview.php?p=material&notification=up&page='.$x);//&page='.$matid.'
    }else{
        echo "TEXT DO NOT Double-digit";
    }
}


if(filter_input(INPUT_GET, 'what') == 'insert'){
    $option1  = filter_input(INPUT_POST, 'option11');
    $option2  = filter_input(INPUT_POST, 'option22');
    $option3  = filter_input(INPUT_POST, 'option33');
    $option4  = filter_input(INPUT_POST, 'option44');
    $option5  = filter_input(INPUT_POST, 'option55');
    $option6  = filter_input(INPUT_POST, 'mats');
    $option7  = filter_input(INPUT_POST, 'option66');

    if($option1 == NULL){ $option11 = '0';}else{
        $result1  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option1."' and active = 1");/*defent cateid */
        $getcate1 = mysqli_fetch_object($result1);
        $option11 = $getcate1->catecode;
    }
    if($option2 == NULL){ $option22 = '0';}else{
        $result2  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option2."' and active = 1");
        $getcate2 = mysqli_fetch_object($result2);
        $option22 = $getcate2->catecode;
    }
    if($option3 == NULL){ $option33 = '0';}else{
        $result3  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option3."' and active = 1");
        $getcate3 = mysqli_fetch_object($result3);
        $option33 = $getcate3->catecode;
    }
    if($option4 == NULL){ $option44 = '0';}else{
        $result4  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option4."' and active = 1");
        $getcate4 = mysqli_fetch_object($result4);
        $option44 = $getcate4->catecode; 
    }
    if($option5 == NULL){ $option55 = '00';}else{
        $result5  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option5."' and active = 1");
        $getcate5 = mysqli_fetch_object($result5);
        $option55 = $getcate5->catecode;
    }    
    if($option7 == NULL){ $option77 = '0';}else{
        $result7  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option7."' and active = 1");
        $getcate7 = mysqli_fetch_object($result7);
        $option77 = $getcate7->catecode;
    }     
    
    $matcode  = $option11;
    $matcode .= $option22;
    $matcode .= $option33;
    $matcode .= $option44;
    $matcode .= $option55;
    $matcode .= $option6;                                                       /*-*/
    $matcode .= $option77;
    $rownum   = $classmat->mysqlshowrow($connect,'tbl_item','mat_code LIKE  "'.$matcode.'%"');
    if($rownum == 0){ $option88 = "01";}else{  
        for($c=1;$c<=$rownum;$c++){
            $mat_id = $c+1;
        } 
        $option88 = sprintf("%02d", $mat_id);
    }
    $matcode .= $option88;
    $matnameen    = filter_input(INPUT_POST, 'matnameen');
    $matnameth    = filter_input(INPUT_POST, 'matnameth');
    $matnamekh    = filter_input(INPUT_POST, 'matnamekh');
    $matunit      = filter_input(INPUT_POST, 'matunit');
    $matunitprice = filter_input(INPUT_POST,'matunitprice');
    $matlocation  = filter_input(INPUT_POST, 'matlocation');
    $tolat        = mysqli_insert_id($connect)+1;
    mysqli_query($connect,"ALTER TABLE tbl_item AUTO_INCREMENT = ".$tolat);
    $result    = $classmat->mysqlinsert($connect,'tbl_item', "mat_code ='".$matcode."',item_name_en = '".$matnameen."',item_name_th = '".$matnameth."',item_name_kh = '".$matnamekh."',unitprice = '".$matunitprice."',unit='".$matunit."',location = '".$matlocation."',date_add ='".date("Y-m-d H:i:s")."'");
    if($result == 1){
        
        $perpage = 15;
        $total = $classmat->mysqlshowrow($connect,'tbl_item',NULL);
        $totalpage = ceil($total / $perpage);
        
        header('location:../view/indexview.php?p=material&notification=in&page='.$totalpage);
    }else{
        echo 'No success';
    }
    
}


if(filter_input(INPUT_GET, 'what') == 'add'){
    $matids   = filter_input(INPUT_POST, 'matids');
    $option1  = filter_input(INPUT_POST, 'option1');
    $option2  = filter_input(INPUT_POST, 'option2');
    $option3  = filter_input(INPUT_POST, 'option3');
    $option4  = filter_input(INPUT_POST, 'option4');
    $option5  = filter_input(INPUT_POST, 'option5');
    $option6  = filter_input(INPUT_POST, 'mats');
    $option7  = filter_input(INPUT_POST, 'option6');

    if($option1 == NULL){ $option11 = '0';}else{
        $result1  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option1."' and active = 1");/*defent cateid */
        $getcate1 = mysqli_fetch_object($result1);
        $option11 = $getcate1->catecode;
    }
    if($option2 == NULL){ $option22 = '0';}else{
        $result2  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option2."' and active = 1");
        $getcate2 = mysqli_fetch_object($result2);
        $option22 = $getcate2->catecode;
    }
    if($option3 == NULL){ $option33 = '0';}else{
        $result3  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option3."' and active = 1");
        $getcate3 = mysqli_fetch_object($result3);
        $option33 = $getcate3->catecode;
    }
    if($option4 == NULL){ $option44 = '0';}else{
        $result4  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option4."' and active = 1");
        $getcate4 = mysqli_fetch_object($result4);
        $option44 = $getcate4->catecode; 
    }
    if($option5 == NULL){ $option55 = '00';}else{
        $result5  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option5."' and active = 1");
        $getcate5 = mysqli_fetch_object($result5);
        $option55 = $getcate5->catecode;
    }
    if($option7 == NULL){ $option77 = '0';}else{
        $result7  = $classmat->mysqlselect($connect,"catecode", "category","cateid = '".$option7."' and active = 1");
        $getcate7 = mysqli_fetch_object($result7);
        $option77 = $getcate7->catecode;
    }     

    $matcode  = $option11;
    $matcode .= $option22;
    $matcode .= $option33;
    $matcode .= $option44;
    $matcode .= $option55;
    $matcode .= $option6;                                                       /*-*/
    $matcode .= $option77;
    $rownum = $classmat->mysqlshowrow($connect,'tbl_item','mat_code LIKE  "'.$matcode.'%"');
    if($rownum == 0){ $option88 = "01";}else{  
        for($c=1;$c<=$rownum;$c++){
            $mat_id = $c+1;
        } 
        $option88 = sprintf("%02d", $mat_id);
    }
    $matcode .= $option88;

    $result   = $classmat->mysqlupdate($connect,'tbl_item', "mat_code ='".$matcode."'","item_id = {$matids}");
    if($result == 1){
        
        $perpage = 15;$x = "";
        $total = $classmat->mysqlshowrow($connect,'tbl_item',NULL);
        $totalpage = ceil($total / $perpage);
        for ($i = 1; $i <= $totalpage; $i++) {
            if($matids <= ($i*15)){ $x = $i;break;}
        }
        
        header('location:../view/indexview.php?p=material&notification=up&page='.$x);
    }else{
        echo 'No success';
    }
    
}


if(filter_input(INPUT_GET, 'what') == 'addimage'){
    $addidimg  = filter_input(INPUT_POST, 'addidimg');
    $result1   = $classmat->mysqlselect($connect,'image','tbl_item',"item_id = {$addidimg}");
    $getdata   = mysqli_fetch_object($result1);
    $idimage   = $getdata->image;
    if($idimage != ""){ unlink("../upload/".$idimage); }
    $image     = my_upload($_FILES['pic']);
    $result2    = $classmat->mysqlupdate($connect,'tbl_item', "image ='".$image."'","item_id = {$addidimg}");
    if($result2 == 1){
        
        $perpage = 15;$x = "";
        $total = $classmat->mysqlshowrow($connect,'tbl_item',NULL);
        $totalpage = ceil($total / $perpage);
        for ($i = 1; $i <= $totalpage; $i++) {
            if($addidimg <= ($i*15)){ $x = $i;break;}
        }
        
        header("location:../view/indexview.php?p=material&notification=up&page=".$x);
    }else{
        echo 'No success';
    }
    
}


if(filter_input(INPUT_GET, 'what') == 'delete'){
    $matids    = filter_input(INPUT_GET, 'id');
    $result3   = $classmat->mysqlselect($connect,'image','tbl_item',"item_id = {$matids}");
    $getdata   = mysqli_fetch_object($result3);
    $idimage   = $getdata->image;
    if($idimage != ""){ unlink("../upload/".$idimage); }
    $result = $classmat->mysqldelete($connect, 'tbl_item',"item_id = {$matids}" );
    if ($result == 1) {
        
        $perpage = 15;$x = "";
        $total = $classmat->mysqlshowrow($connect,'tbl_item',NULL);
        $totalpage = ceil($total / $perpage);
        for ($i = 1; $i <= $totalpage; $i++) {
            if($matids <= ($i*15)){ $x = $i;break;}
        }
        
        header('location:../view/indexview.php?p=material&notification=de&page='.$x);
    } else {
        echo "TEXT DO NOT Double-digit";
    }
}


if(filter_input(INPUT_GET, 'what') == 'a'){
    $cateid    = filter_input(INPUT_GET, 'cateid');
    $total     = $classmat->mysqlshowrow($connect,'category',"parentid = '".$cateid."' and active = 1");
    if($total == 0){
        ?>
        <option value="" disabled selected>No data in Category</option>
        <?php    
    }else{
        ?>
        <option value="" disabled selected>Select</option>
        <?php
        $result    = $classmat->mysqlselect($connect,NULL, "category","parentid = '".$cateid."' and active = 1 order by catecode asc");
        while($getdata = mysqli_fetch_object($result)){ 
        ?>
        <option value="<?php echo $getdata->cateid; ?>">(<?php echo $getdata->catecode.") ".$getdata->catenameen;?></option>
        <?php 
        } 
    }
}
if(filter_input(INPUT_GET, 'what') == 'b'){
    $cateid    = filter_input(INPUT_GET, 'cateid');    
    $total     = $classmat->mysqlshowrow($connect,'category',"parentid = '".$cateid."' and active = 1");
    if($total == 0){
        ?>
        <option value="" disabled selected>No data in Category</option>
        <?php    
    }else{
        ?>
        <option value="" disabled selected>Select</option>
        <?php
        $result    = $classmat->mysqlselect($connect,NULL, "category","parentid = '".$cateid."' and active = 1 order by catecode asc");
        while($getdata = mysqli_fetch_object($result)){ 
        ?>
        <option value="<?php echo $getdata->cateid; ?>">(<?php echo $getdata->catecode.") ".$getdata->catenameen;?></option>
        <?php 
        } 
    }
}
if(filter_input(INPUT_GET, 'what') == 'c'){
    $cateid    = filter_input(INPUT_GET, 'cateid');
    $total     = $classmat->mysqlshowrow($connect,'category',"parentid = '".$cateid."' and active = 1");
    if($total == 0){
        ?>
        <option value="" disabled selected>No data in Category</option>
        <?php    
    }else{
        ?>
        <option value="" disabled selected>Select</option>
        <?php
        $result    = $classmat->mysqlselect($connect,NULL, "category","parentid = '".$cateid."' and active = 1 order by catecode asc");
        while($getdata = mysqli_fetch_object($result)){ 
        ?>
        <option value="<?php echo $getdata->cateid; ?>">(<?php echo $getdata->catecode.") ".$getdata->catenameen;?></option>
        <?php 
        } 
    } 
}
if(filter_input(INPUT_GET, 'what') == 'd'){
    $cateid    = filter_input(INPUT_GET, 'cateid');
    $total     = $classmat->mysqlshowrow($connect,'category',"parentid = '".$cateid."' and active = 1");
    if($total == 0){
        ?>
        <option value="" disabled selected>No data in Category</option>
        <?php    
    }else{
        ?>
        <option value="" disabled selected>Select</option>
        <?php
        $result    = $classmat->mysqlselect($connect,NULL, "category","parentid = '".$cateid."' and active = 1 order by catecode asc");
        while($getdata = mysqli_fetch_object($result)){ 
        ?>
        <option value="<?php echo $getdata->cateid; ?>">(<?php echo $getdata->catecode.") ".$getdata->catenameen;?></option>
        <?php 
        } 
    }
}
if(filter_input(INPUT_GET, 'what') == 'e'){
    $cateid    = filter_input(INPUT_GET, 'cateid');
    $total     = $classmat->mysqlshowrow($connect,'category',"parentid = '".$cateid."' and active = 1");
    if($total == 0){
        ?>
        <option value="" disabled selected>No data in Category</option>
        <?php    
    }else{
        ?>
        <option value="" disabled selected>Select</option>
        <?php
        $result    = $classmat->mysqlselect($connect,NULL, "category","parentid = '".$cateid."' and active = 1 order by catecode asc");
        while($getdata = mysqli_fetch_object($result)){ 
        ?>
        <option value="<?php echo $getdata->cateid; ?>">(<?php echo $getdata->catecode.") ".$getdata->catenameen;?></option>
        <?php 
        } 
    }
}
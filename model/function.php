<?php
	
function my_upload($file){
	
	$newfile_name = "";
		
	if($file["tmp_name"] != NULL){
		
		
		//echo "<pre>";
		//echo print_r($file);
		
		$folder_upload = "../upload/" ; //โฟรเดอร์เก็บ
		$my_file= $file["tmp_name"]  ; //ไฟล์ต้นทางที่ TEMP
		
		//get exteension
		$ext = pathinfo( $file["name"] , PATHINFO_EXTENSION); ///  photo.jpg 
		
		//create new name
		$newfile_name = date("Y-m-dHis").rand(1,10).".".$ext ;
		
		$goto 	=  $folder_upload.$newfile_name ; // ; // ไฟล์ปลายที่ต้องการการเก็บ  

		
		if( move_uploaded_file( $my_file , $goto ) )	{
			
			//echo "Copy/Upload Complete";
		}
	}
	
	return $newfile_name ;
}


?>
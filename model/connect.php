<?php
date_default_timezone_set("Asia/Phnom_Penh");
class db{
    public function mysqlconnect($host,$username,$password,$dbname){
        $connect = mysqli_connect($host,$username,$password,$dbname);
        return $connect;
    }
    public function mysqlshowrow($connect,$table,$event){
        if($event != NULL){
            $objqry = mysqli_query($connect,"SELECT * FROM ".$table." WHERE ".$event);
        }else{
            $objqry = mysqli_query($connect,"SELECT * FROM ".$table);
        }
        $objShow = mysqli_num_rows($objqry);
        return $objShow;
    }
    public function mysqlselect($connect,$field,$table,$event){
        if($field == Null && $event == Null){
            $objqry = mysqli_query($connect,"SELECT * FROM ".$table);
        }else if($field == Null){
            $objqry = mysqli_query($connect,"SELECT * FROM ".$table." WHERE ".$event);
        }else if($event == Null){
            $objqry = mysqli_query($connect,"SELECT ".$field." FROM ".$table);
        }else{
            $objqry = mysqli_query($connect,"SELECT ".$field." FROM ".$table." WHERE ".$event);
        }
        return $objqry;
    }
    public function mysqlinsert($connect,$table,$set){
        return mysqli_query($connect,"INSERT INTO ".$table." SET ".$set);
    }
    public function mysqlupdate($connect,$table,$set,$event){
        if($event == NULL){
            return mysqli_query($connect,"UPDATE ".$table." SET ".$set);
        }else{
            return mysqli_query($connect,"UPDATE ".$table." SET ".$set." WHERE ".$event);
        }
    }
    public function insertlogs($connect,$table,$text){
        return $this->mysqlinsert($connect,$table,$text);
    }

    public function checklogs($connect,$table,$set,$event){ 
        return $this->mysqlupdate($connect,$table,$set,$event);
    }
    
    public function mysqldelete($connect,$table,$event){
        return mysqli_query($connect, "DELETE FROM ".$table." WHERE ".$event);
    }

    public function mysqlclose($connect){
        return mysqli_close($connect);
    }
}
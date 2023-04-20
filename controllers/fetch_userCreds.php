<?php   
    require_once("important/class.database.php");
    session_start();                    
        
    $ConDB = new ClassDbConn;
    $eCon = $ConDB->NewCon();
    if($eCon == true){
        try{

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
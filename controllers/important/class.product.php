<?php

require_once('class.database.php');
require_once('connect_AWS.php');

// $hostname = getenv('HTTP_HOST');
// echo $hostname;
class Product{
    // const HOST = getenv('HTTP_HOST');
    // const DIR_SA = "/all-products/";
    // private $variable;

    // creating folder with index.php from database
    private $Table = 'products';

    public function createPage($Title){
        if(!empty($Title)){
            $Title = str_replace(' ', '-', $Title);

            if (!file_exists($Title)) {
            // Create folder if it doesn't exist
                mkdir(__DIR__ . "/../../all-products/" . $Title);
    
                $newPage = fopen(__DIR__ . "/../../all-products/" . $Title . "/index.php", "w");
                fwrite($newPage, "<br/>Date: " . date('Y-m-d H:i:s') . "<br/>Created file for " . $Title . "<br/>");
                fclose($newPage);
                
            } else {
                // Folder already exists, do nothing
                echo "Folder already exists, file creation skipped.";
            }
        }

    }

    public function fetch($PID){
        try{
            $ConDB = new ClassDbConn;
            $eCon = $ConDB->NewCon();
            if($eCon == true){
                $Pid = [ 'id' => $PID];
               $PJSON = $ConDB->GSelect($eCon, $this->Table, $Pid, '', '');
               return $PJSON; 
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: ../..all-products/error_logger.php");
            exit();
        }
    }

    public function modify($of, $changes){
        try{
            $ConDB = new ClassDbConn;
            $eCon = $ConDB->NewCon();
            if($eCon == true){
                $eUpdate = $ConDB->Update($eCon, $this->Table, $changes, $of);
                    if($eUpdate == "true"){
                        return "true";
                    }else{
                        return "false";
                    }
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: ../..all-products/error_logger.php");
            exit();
        }
    }

    // public function NewOrder(){

    // }

    // public function fetchOrders(){

    // }

    // public function newReview(){

    // }


    public function fetchReview($PID){
        try{
            $ConDB = new ClassDbConn;
            $eCon = $ConDB->NewCon();
            if($eCon == true){
                $Q = 'SELECT u.username, r.rating, r.rating_comment, r.date_reviewed FROM reviews r JOIN products p ON r.product_id = p.id JOIN clients u ON r.user_id = u.id WHERE p.id = '.$PID;
                // ($mysql, $table, $where, $order, $limit)
               $PJSON = $ConDB->General($eCon, $Q);
                //echo json_encode($PJSON); 
               return $PJSON; 
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: ../..all-products/error_logger.php");
            exit();
        }
    }

    public function fetchRandN($N){
        // SELECT * FROM products WHERE date_archived IS NULL ORDER BY RAND() LIMIT 3;
        try{
            $ConDB = new ClassDbConn;
            $eCon = $ConDB->NewCon();
            if($eCon == true){
                $ord = ['rand'];
                // $ord = ['name'=>'asC'];
                $that = ["date_archived" => 'NULL'];
                // ($mysql, $table, $where, $order, $limit)
               $PJSON = $ConDB->GSelect($eCon, $this->Table, $that, $ord, $N);
            //    echo json_encode($PJSON); 
               return $PJSON; 
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: ../..all-products/error_logger.php");
            exit();
        }
    }
}
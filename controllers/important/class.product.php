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

    // public function add(){
    private $Table = 'products';
    // }

    public function createPage($Title){
        if(!empty($Title)){
            $Title = str_replace(' ', '-', $Title);

            // $parentDir = dirname(__DIR__); // get the parent directory of the current directory
            // $newDir = $parentDir."/".$Title;
            // Check if folder already exists
            // if (!is_dir($Title)) {
            if (!file_exists($Title)) {
            // Create folder if it doesn't exist
                mkdir(__DIR__ . "/../../all-products/" . $Title);
    
                $newPage = fopen(__DIR__ . "/../../all-products/" . $Title . "/index.php", "w");
                fwrite($newPage, "<br/>Date: " . date('Y-m-d H:i:s') . "<br/>Created file for " . $Title . "<br/>");
                fclose($newPage);
            
    
    
                // mkdir("../../".$Title);
    
                // $newPage = fopen("../all-products/".$Title."/index.php", "w");
                // fwrite($newPage,"<br/>Date: ".date('Y-m-d H:i:s')."<br/>Created file for ".$Title." <br/>");
                // fclose($newPage);
                
            } else {
                // Folder already exists, do nothing
                echo "Folder already exists, file creation skipped.";
            }
        }

        // $folderName = "myFolder";
        // $fileName = "myFile.txt";

        // // Check if folder already exists
        // if (!is_dir($folderName)) {
        //     // Create folder if it doesn't exist
        //     mkdir($folderName);

        //     // Create new file inside the folder
        //     $filePath = $folderName . "/" . $fileName;
        //     $file = fopen($filePath, "w");
        //     fwrite($file, "Hello World!");
        //     fclose($file);

        //     echo "Folder and file created successfully.";
        // } else {
        //     // Folder already exists, do nothing
        //     echo "Folder already exists, file creation skipped.";
        // }

    }

    public function fetch($PID){
        
        try{
            $ConDB = new ClassDbConn;
            $eCon = $ConDB->NewCon();
            if($eCon == true){
                $Pid = [ 'id' => $PID];
               $PJSON = $ConDB->Select($eCon, $this->Table, $Pid);
               return $PJSON; 
            }
        }catch(Exception $e){
            $_SESSION['error'] = $e->getMessage();
            header("Location: ../..all-products/error_logger.php");
            exit();
        }
    }

    // public function fetchALL(){

    // }

    // public function modify(){

    // }

    // public function NewOrder(){

    // }

    // public function fetchOrders(){

    // }

    // public function newReview(){

    // }

    // public function fetchReview(){

    // }

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

// $wError = fopen("../errorlog/user_errorlog/errorlog.txt", "a");
// fwrite($wError,"\n
// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// Date: ".date('Y-m-d H:i:s')."
// Error: ".wordwrap(str_replace($br, $spc, $ERROR), 80, "\n")." 
// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// \n");
// fclose($wError);
// }
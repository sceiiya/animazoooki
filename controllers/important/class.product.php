<?php

include('class.database.php');
// $hostname = getenv('HTTP_HOST');
// echo $hostname;
class Product{
    // const HOST = getenv('HTTP_HOST');
    // const DIR_SA = "/all-products/";
    // private $variable;

    // creating folder with index.php from database

    // public function add(){

    // }

    public function createPage($Title){
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

    // public function fetch(){

    // }

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
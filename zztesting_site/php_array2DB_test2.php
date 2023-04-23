<?php

// $colors = ['red', 'orange', 'yellow', 'green', 'violet' ];

// method 1
// $P_colors = json_encode($colors);
// return ["red","orange","yellow","green","violet"]

// method 2
// $P_colors = serialize($colors);
// return a:5:{i:0;s:3:"red";i:1;s:6:"orange";i:2;s:6:"yellow";i:3;s:5:"green";i:4;s:6:"violet";}

// method 3
// $P_colors = implode(",", $colors);
// return red,orange,yellow,green,violet

// echo $P_colors;











include("controllers/important/class.database.php");

$ConDB = new ClassDbConn;
$eCon = $ConDB->NewCon();
if ($eCon == true){
    try{


        $images = [
            'https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f7367fabc1.34613290.png',
            'https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f7378a8612.52425586.png',
            'https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f737bcba11.45704356.png',
            'https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f738857c13.35927131.png'
        ];
        
        // method 1
        // $P_images = json_encode($images);
        // return ["https:\/\/animazoooki-img.s3.ap-southeast-1.amazonaws.com\/products\/6443f7367fabc1.34613290.png","https:\/\/animazoooki-img.s3.ap-southeast-1.amazonaws.com\/products\/6443f7378a8612.52425586.png","https:\/\/animazoooki-img.s3.ap-southeast-1.amazonaws.com\/products\/6443f737bcba11.45704356.png","https:\/\/animazoooki-img.s3.ap-southeast-1.amazonaws.com\/products\/6443f738857c13.35927131.png"]
        // will be stored to database:
        // ["https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f7367fabc1.34613290.png","https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f7378a8612.52425586.png","https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f737bcba11.45704356.png","https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f738857c13.35927131.png"]

        // method 2
        // $P_images = serialize($images);
        // return a:4:{i:0;s:92:"https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f7367fabc1.34613290.png";i:1;s:92:"https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f7378a8612.52425586.png";i:2;s:92:"https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f737bcba11.45704356.png";i:3;s:92:"https://animazoooki-img.s3.ap-southeast-1.amazonaws.com/products/6443f738857c13.35927131.png";}
        
        
        // method 3
        // $P_images = implode(",", $images);
        // return 
        
        // echo $P_images;
        // echo strlen($P_images);
        $data = [ "images" => json_encode($images)];

        $eInsert = $ConDB->Insert($eCon, "products", $data);
        if($eInsert == "true"){
            echo "Sign-up Success";
        }else{
            echo "Sign-up Failed";
        }


        // for retrieval of array
        $DataOf = ['id' => "41"];
        $ImgData = $ConDB->Select($eCon, 'products', $DataOf);
        // if($validU["result"] == "true" && $DData["password"] == $valueP){
            // $FFF;
            foreach (json_decode($ImgData['images']) as $key => $value) {
                echo "link is: ".$value."  from the  ".$key."<br/>";
            }
            // print_r( "Images are: ".$FFF);
                // session_destroy();
                echo "<br/>";
            foreach (json_decode($ImgData['images']) as $key => $value) {
                echo "<img src='".$value."' width='500' height='500'>"."<br/>";
            }


        // }else{
        //     echo "user does not exist";
        // }





















    } catch(Exception $e) {
        echo "error";
        session_start();
        $_SESSION['error'] = $e->getMessage();
        header("Location: controllers/error_logger.php");
        exit();
    }

}else{
    echo "not connected";
}


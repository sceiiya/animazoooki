<?php
    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/');
        exit();
    }else if( $_SESSION['admaccess'] == 'Agent') {
        header('Location: /admin/');
        exit();
    }else {
        $admAccess = $_SESSION['admaccess'];
        $admUsername = $_SESSION['admusername'];
    }
    
    include("../important/class.database.php");
    require_once '../../vendor/autoload.php';
    require_once('../important/connect_AWS.php');
    
    use Aws\S3\S3Client;
    
    // S3 client configuration
    $client = new S3Client([
        'version' => 'latest',
        'region' => 'ap-southeast-1',
        'credentials' => [
            'key' => $accessKeyId,
            'secret' => $secretAccessKey,
        ],
    ]);
    
    $AllImgs = [];
    // Check if files are uploaded
    try{
    if(isset($_FILES['file'])) {
        $files = $_FILES['file'];
    
        // Loop through up to 4 files
        for ($i = 0; $i < min(4, count($files['name'])); $i++) {
            // Check if file is an image
            if (substr($files['type'][$i], 0, 5) === 'image') {
                $fileName = $files['name'][$i];
                $fileTmpName = $files['tmp_name'][$i];
    
                // Generate a unique file name
                $newFileName = uniqid('', true) . '.' . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                //14 uid + 8 
                // Determine content type based on file extension
                $contentType = mime_content_type($fileTmpName);
    
                // Upload file to S3 bucket with metadata
                $result = $client->putObject([
                    'Bucket' => $bucketName,
                    'Key' => 'products/' .$newFileName,
                    'Body' => fopen($fileTmpName, 'rb'),
                    'ACL' => 'public-read',
                    'ContentType' => $contentType,
                ]);
    
                // Generate the URL of the uploaded file
                $url = $result->get('ObjectURL');
    
                // echo 'File uploaded successfully. URL: <a href="' . $url . '">link<a/><br/>';
                // echo 'CDN URL: <a href="' . $distDomain .$s3Folder . $newFileName .'">cdn link</a><br/>';
                $FinURL = $distDomain.$s3Folder.$newFileName;
                // array_push($myArray, "apple");
                // $AllImgs = $FinURL;
                // echo $FinURL. '<br/>';
                $strFinURL = $FinURL;
                // echo 'string is'.$strFinURL. '<br/>';
                array_push($AllImgs, $strFinURL);
            } else {
                // return false;
                // exit();
                // echo 'no '.$i;
                // echo 'Image for Variation '.$i.' is empty. Please put files by modifying the product<br/>';
                
                // make a taoster saying image #1 or 3 is empty, edit them on modify page
            }
        }
    }
    } catch (Aws\S3\Exception\S3Exception $e) {
        if ($e->getAwsErrorCode() === 'RequestTimeTooSkewed') {
            $_SESSION['error'] = '<br>'.'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.'Request Time Too Skewed'.'<br>'.'Your device time is behind, Please update to real time or sync time'.'<br>'.$e->getAwsErrorCode();
            header("Location: error_logger.php");
            exit();
        } else {
            $_SESSION['error'] = '<br>'.'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$e->getAwsErrorCode();
            header("Location: error_logger.php");
            exit();
        }
    }catch(Exception $err){
        $_SESSION['error'] = '<br>'.'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$err->getMessage();
        header("Location: error_logger.php");
        exit();
    }









    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();

        $sizez = $_POST['sizes'];
        $sizez = explode(', ', strtoupper($sizez));
        $sizez = json_encode($sizez);

        $variation = $_POST['variation'];
        $variation = explode(', ', strtoupper($variation));
        $variation = json_encode($variation);

        $AllImgs = json_encode($AllImgs);
        $productData = [
            "name" => $_POST['name'],
            "category" => $_POST['category'],
            "series" => $_POST['series'],
            "price" => $_POST['price'],
            "stocks" => $_POST['stocks'],
            "sizes" => $sizez,
            "variation" => $variation,
            "description" => addslashes($_POST['description']),
            "designer" => $_POST['designer'],
            "manufacturer" => $_POST['manufacturer'],
            "images" => $AllImgs,
            "date_added" => date("Y-m-d H:i:s"),
            "added_by" => $_SESSION['admusername'],
        ];

        $eInsert = $ConDB->Insert($eCon, "products", $productData);
        if($eInsert == 'true'){
            // echo $productData;
            // echo "Add Product Success";
            // return "Add Product Success";
            // header('http://localhost/admin/dashboard/index.php');
            // header('Location: ../../admin/dashboard/');
            header('Location: ../../admin/dashboard/?status=success');


            // header('../../admin/dashboard/index.php');
            exit();
        }else{
            // echo "Add Product Failed";
            // return "Add Product Failed";
            // header('http://localhost/admin/dashboard/index.php');
            // header('Location: ../../admin/dashboard/');
            header('Location: ../../admin/dashboard/?status=failed');


            // header('../../admin/dashboard/index.php');
            exit();
        }
        // header('Location: ../../admin/dashboard/?status=error');

    } catch(Exception $e) {
        $_SESSION['error'] = '<br>'.'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$e->getMessage();
        header("Location: error_logger.php");
        exit();
    }


    

    // $ConDB = new ClassDbConn;
    // $eCon = $ConDB->NewCon();

    // $productData = [           
    //     "series" => $_POST['series'],
    //     "price" => $_POST['price'],
    //      "image" => $AllImgs
    //      ];
    // $eInsert = $ConDB->Insert($eCon, "products", $productData);
    // if($eInsert == "true"){
    //     echo $productData;
    //     // echo "Add Product Success";
    // }else{
    //     echo "Add Product Failed";
    // }

    // $productData = [
    //     "series" => $_POST['series'],
    //     "price" => $_POST['price'],
    //     "image" => $AllImgs
    // ];
    
    // $eInsert = $ConDB->Insert($eCon, "products", $productData);
    // if($eInsert == "true"){
    //     echo "Add Product Success";
    // }else{
    //     echo "Add Product Failed";
    // }
    

    // if ($dbConnection == true) {
    //     $Pcode = $_POST['code'];  
    //     $Pname = $_POST['name'];
    //     $Pprice = $_POST['price'];
    //     $Pqty = $_POST['qty'];
    //     $Pdesc = $_POST['description'];
        
    //     if( $Pcode == "" || $Pname == "" || $Pprice == "" || $Pqty == "" || $Pdesc == "") {
    //         echo "Incomplete";
    //         mysqli_close($dbConnection);
    //     } else { 
    //         try {
    //                 $qInsert = "INSERT INTO $dbDatabase.`products` 
    //                     (`category`, `name`, `price`, `stocks`, `description`, `date_added`, `added_by`) 
    //                     VALUES 
    //                     ('{$Pcode}', '{$Pname}', '{$Pprice}', '{$Pqty}', '{$Pdesc}','".date("Y-m-d H:i:s")."', '{$admUsername}')";
        
    //                 $eInsert = mysqli_query($dbConnection, $qInsert);
                    
    //                     if ($eInsert == true) {
    //                         echo "Product info saved!";
    //                         mysqli_close($dbConnection);
    //                     } else {
    //                         echo "Failed to save!";
    //                         mysqli_close($dbConnection);
    //                     }
    //         } catch(Exception $e) {
    //             echo 'Error: ' .$e->getMessage();
    //             mysqli_close($dbConnection);
    //         }

    //     }

    // } else {
    //     echo "Failed to connect, please call system administrator!";
    // }
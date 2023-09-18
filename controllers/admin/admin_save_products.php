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
                $FinURL = $distDomain.$s3Folder.$newFileName;
                $strFinURL = $FinURL;
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
            "name" =>addslashes($_POST['name']),
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
            header('Location: ../../admin/dashboard/?status=success');
            exit();
        }else{
            header('Location: ../../admin/dashboard/?status=failed');
            exit();
        }
    } catch(Exception $e) {
        $_SESSION['error'] = '<br>'.'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$e->getMessage();
        header("Location: error_logger.php");
        exit();
    }
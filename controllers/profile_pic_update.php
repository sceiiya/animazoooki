<?php
    session_start();

    // $_SESSION['userid'];
    
    include("important/class.database.php");
    require_once '../vendor/autoload.php';
    require_once('important/connect_AWS.php');

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
    
    // Check if files are uploaded
    try{
        // Check if a file is uploaded
        if(isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
        
            // Generate a unique file name
            $newFileName = uniqid('', true) . '.' . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Determine content type based on file extension
            $contentType = mime_content_type($fileTmpName);
        
            // Upload file to S3 bucket
            $result = $client->putObject([
                'Bucket' => $bucketName,
                'Key' => 'profiles/' .$newFileName,
                'Body' => fopen($fileTmpName, 'rb'),
                'ACL' => 'public-read',
                'ContentType' => $contentType,
            ]);
        
            // Generate the URL of the uploaded file
            $url = $result->get('ObjectURL');
            $FinURL = $distDomain.'/profiles/'.$newFileName;
            // echo 'File uploaded successfully. URL: ' . $url;
        }
    } catch (Aws\S3\Exception\S3Exception $e) {
        if ($e->getAwsErrorCode() === 'RequestTimeTooSkewed') {
            $_SESSION['error'] = '<br>'.'Request Time Too Skewed'.'<br>'.'Your device time is behind, Please update to real time or sync time'.'<br>'.$e->getAwsErrorCode();
            header("Location: error_logger.php");
            exit();
        } else {
            $_SESSION['error'] = $e->getAwsErrorCode();
            header("Location: error_logger.php");
            exit();
        }
    }catch(Exception $err){
        $_SESSION['error'] = $err->getMessage();
        header("Location: error_logger.php");
        exit();
    }
    
    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();
        if ($eCon == true){
            $pic = ['profile_img' => $FinURL];
            $of = ['username' => $_SESSION['username']];
            $eUpdate = $ConDB->Update($eCon, 'clients', $pic, $of);
                if($eUpdate == "true"){
                    $_SESSION['profile_img'] = $FinURL;
                    echo "true";
                }
        }    
    }catch(Exception $e){
        echo "false";
        $_SESSION['error'] = $e->getMessage();
        header("Location: error_logger.php");
        exit();
    } 
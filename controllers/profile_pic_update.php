<?php
    session_start();

    // $_SESSION['userid'];
    
    include("important/class.database.php");
    require_once '../vendor/autoload.php';
    require_once('important/connect_AWS.php')

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
    if(isset($_FILES['profile_picture'])) {
        // $files = $_FILES['file'];
    // FinURL
        // Loop through up to 4 files
        // for ($i = 0; $i < min(4, count($files['name'])); $i++) {
            // Check if file is an image
            $profilePic = $_FILES['profile_picture'];
            if (substr($profilePic['type'], 0, 5) === 'image') {
                $fileName = $profilePic['name'];
                $fileTmpName = $profilePic['tmp_name'];
    
                // Generate a unique file name
                $newFileName = uniqid('', true) . '.' . strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                //14 uid + 8 

                // Determine content type based on file extension
                $contentType = mime_content_type($fileTmpName);
    
                // Upload file to S3 bucket with metadata
                $result = $client->putObject([
                    'Bucket' => $bucketName,
                    'Key' => 'profile/' .$newFileName,
                    'Body' => fopen($fileTmpName, 'rb'),
                    'ACL' => 'public-read',
                    'ContentType' => $contentType,
                ]);
    
                $url = $result->get('ObjectURL');
    
                $FinURL = $distDomain.'/profile/'.$newFileName;
                // $strFinURL = $FinURL;
            } else {
            }
        }
    // }
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

    require_once("important/class.database.php");
    
    session_start();
    
    try{
        $ConDB = new ClassDbConn;
        $eCon = $ConDB->NewCon();
        if ($eCon == true){
            $pic = [
                'profile_img' => $FinURL,
            ];
            $of = ['username' => $_SESSION['username']];
            $eUpdate = $ConDB->Update($eCon, 'clients', $pic, $of);
                if($eUpdate == "true"){
                    $_SESSION['profile_img'] = $FinURL;
                    echo "updated";
                }
        }    
    }catch(Exception $e){
        $_SESSION['error'] = $e->getMessage();
        header("Location: error_logger.php");
        exit();
    } 
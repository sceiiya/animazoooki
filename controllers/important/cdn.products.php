<?php
require_once('connect_AWS.php');

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
            // $FinURL = $distDomain.$s3Folder.$newFileName;
            $FinURL = $distDomain.$s3Folder.$newFileName;
            echo $FinURL. '<br/>';
            $strFinURL = '"'.$FinURL.'"';
            echo 'string is'.$strFinURL. '<br/>';
            array_push($AllImgs, $strFinURL);
            // $AllImgs = $FinURL;
        } else {
            echo 'Image for Variation '.$i.' is empty. Please put files by modifying the product<br/>';
            
            // make a taoster saying image #1 or 3 is empty, edit them on modify page
        }
    }
}
    echo'raw is:  ';
    print_r($AllImgs);
    $O1 = json_encode($AllImgs);
    echo'<br/>';
    $O2 = json_encode($O1);
    echo'json encode is:  ';
    echo ($O2);
    $O3 = json_decode($O2);
    echo'<br/>';
    echo'json decoded is:  ';
    echo ($O3);
    $O4 = implode(", ", $AllImgs);
    echo'<br/>';
    echo'implode is:  ';
    echo $O4;
    echo'<br/>';echo'<br/>';
    echo $finale = "[".$O4."]";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image to AWS S3 Bucket</title>
    <style>
    .preview-container {
        position: relative;
        display: flex;
        flex-direction: row;
        width: 100%;
    }
    .preview-container div{
        display: flex;
        flex-direction: column;
        height: max-content;
        width: 25%;
        padding: 10px;
        align-items: center;
        aspect-ratio: 1 / 1;
        object-fit: cover;
    }
    .preview-container div label{
        display: none;
    }
    .preview {
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
        height: 100%;
        width: 100%;
        aspect-ratio: 1 / 1;
        object-fit: cover;
        cursor: pointer;
        /* height: calc(100%-2rem); */
    }
    .preview img {
        width: 100%;
        height: 100%;
    }
    .file-input {
        position: absolute;
        /* top: 0;
        left: 0;
        opacity: 0; */
        display: none;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
</style>

</head>
<body>
<form action="cdn.products.php" method="post" enctype="multipart/form-data">

                <div class="form-outline mb-3">
                    <label for="">Product Series</label>
                    <input type="text" id="adminProdSer" class="form-control" maxlength="30"/>
                </div>


                <div class="form-outline mb-3">
                    <label for="">Product Price</label>
                    <input type="number" id="adminProdPrice" class="form-control" max='9999999'/>
                </div>

    <div class="preview-container">
        <div>
            <label for="file1">Choose an image:</label>
            <input type="file" name="file[]" id="file1" accept="image/*" class="file-input" required>
            <div class="preview"><img src="animazoooki_onload.png"></div>
        </div>

        <div>
            <label for="file2">Choose an image:</label>
            <input type="file" name="file[]" id="file2" accept="image/*" class="file-input">
            <div class="preview"><img src="animazoooki_onload.png"></div>
        </div>

        <div>
            <label for="file3">Choose an image:</label>
            <input type="file" name="file[]" id="file3" accept="image/*" class="file-input">
            <div class="preview"><img src="animazoooki_onload.png"></div>
        </div>

        <div>
            <label for="file4">Choose an image:</label>
            <input type="file" name="file[]" id="file4" accept="image/*" class="file-input">
            <div class="preview"><img src="animazoooki_onload.png"></div>
        </div>
    </div>

    <input type="submit" value="Upload">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.file-input').on('change', function() {
        const previewContainer = $(this).parent();
        const preview = previewContainer.find('.preview');
        preview.html('');
        const files = $(this)[0].files;

        for (let i = 0; i < files.length && i < 4; i++) {
            const file = files[i];
            const reader = new FileReader();
            const fileType = file.type;

            if (fileType.match('image.*')) {
                reader.addEventListener('load', () => {
                    const img = $('<img>').attr('src', reader.result);
                    preview.html(img);
                });
                reader.readAsDataURL(file);
            }
        }
    });

    $('.preview').on('click', function() {
        const fileInput = $(this).parent().find('.file-input');
        fileInput.click();
    });
});
</script>
</body>
</html>

<!-- form outie -->
<form action="0bugadmin_save_products.php" method="post" enctype="multipart/form-data">
<!-- <form action="" method="post" id='SubmitNewProduct'enctype="multipart/form-data"> -->

<div class="modal modal-xl" id="addProductModal">
    <div class="modal-dialog">
        <div class="modal-content p-4 cpborder modalbg">

            <div class="add-list-cont">
                <h3 class="txtc mb-4">Product Info</h3>

                <!-- form outie -->
                <!-- <form action="../../controllers/admin/admin_save_products.php" method="post" enctype="multipart/form-data"> -->
                <div class="form-outline mb-3">
                    <label for="">Product Name</label>
                    <input type="text" id="adminProdName" name='name' class="form-control" maxlength="150" required/>
                </div>
                <!-- in div to row >>>>>-->
                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Category</label>
                    <input type="text" id="adminProdCat" name='category' class="form-control" maxlength="30" required/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Series</label>
                    <input type="text" id="adminProdSer" name='series' class="form-control" maxlength="30" required/>
                </div>
                </div>
                <!-- <<<<<<<<<<<<  out div to row -->

                <!-- in div to row >>>>>>>>>>>-->
                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Price</label>
                    <input type="number" id="adminProdPrice" name='price' class="form-control" max='9999999' required/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Stocks</label>
                    <input type="number" id="adminProdQty" name='stocks' class="form-control" max='9999999' required/>
                </div>
                </div>
                <!-- <<<<<<<<<<< out div to row -->

                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Sizes</label>
                    <input type="text" id="adminProdSizes" name='sizes' class="form-control" maxlength="200" required/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Variation</label>
                    <input type="text" id="adminProdVar" name='variation' class="form-control" maxlength="200" required/>
                </div>
                </div>

                <div class="form-outline mb-3">
                    <label for="">Product Description</label>
                    <textarea type="text" id="adminProdDesc" name='description' rows="10" cols="50" class="form-control pDescription" maxlength="1000" required></textarea>
                </div>

                <!-- in div to row >>>>>>>>>>>-->
                <div class="row">
                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Designer</label>
                    <input type="text" id="adminProdDesig" name='designer' class="form-control" maxlength="40"/>
                </div>

                <div class="form-outline col-md-6 mb-4">
                    <label for="">Product Manufacturer</label>
                    <input type="text" id="adminProdManuf" name='manufacturer' class="form-control" maxlength="40"/>
                </div>
                </div>
                <!-- <<<<<<<<<<< out div to row -->

                <!-- <div class="form-outline mb-2">
                    <label for="">Product Image</label>
                    <input type="file" id="adminProdImage" class="form-control" accept="image/*" />
                </div> -->

                    <div class="preview-container">
                        <div>
                            <!-- <label for="file1">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg1" accept="image/*" class="file-input" required>
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file2">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg2" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file3">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg3" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>

                        <div>
                            <!-- <label for="file4">Choose an image:</label> -->
                            <input type="file" name="file[]" id="prodimg4" accept="image/*" class="file-input">
                            <div class="preview"><img src="/controllers/important/animazoooki_onload.png"></div>
                        </div>
                    </div>


                <div class="flex-row d-flex justify-content-between">
                <button type="button" id="saveProduct" class="btn redbgwhitec mb-1 mt-3">Add Product</button>
                <button type="button" class="btn mb-1 mt-3" data-bs-dismiss="modal">Close</button>
                    
                <!-- form button -->
                <!-- <input type="submit" value="Upload">
                </form> -->


                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="confirm-addProd">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">


            <div class="modal-header">
                <h4 class="modal-title">ADD PRODUCT</h4>
            </div>


            <div class="modal-body">
                Are you sure you want to add this product?
                <br>
                <br>
            </div>


            <div class="modal-footer flex-row d-flex justify-content-between">
                <input type="submit" value="Yes" id="yes-addProd" class="btn redbgwhitec">
                <!-- <button type="button" id="yes-addProd" class="btn redbgwhitec">Yes</button> -->
                <button type="button" class="btn" data-bs-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>

<!-- <input type="submit" value="Upload"> -->
</form>

<?php
    session_start();

    // if(!isset($_SESSION['admusername'])){
    //     header('Location: /admin/index.php');
    // }else if( $_SESSION['admaccess'] == 'Agent') {
    //     header('Location: /admin/index.php');
    // }else {
    //     $admAccess = $_SESSION['admaccess'];
    //     $admUsername = $_SESSION['admusername'];
    // }
    
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
                return false;
                exit();
                // echo 'no '.$i;
                // echo 'Image for Variation '.$i.' is empty. Please put files by modifying the product<br/>';
                
                // make a taoster saying image #1 or 3 is empty, edit them on modify page
            }
        }
    }
    } catch (Aws\S3\Exception\S3Exception $e) {
        if ($e->getAwsErrorCode() === 'RequestTimeTooSkewed') {
            $_SESSION['error'] = '<br>'.'Request Time Too Skewed'.'<br>'.'Your device time is behind, Please update to real time or sync time'.'<br>'.$e->getAwsErrorCode();
            header("Location: error_logger.php");
            exit();
        } else {
            $_SESSION['error'] = '<br>'.'<br>'.$e->getAwsErrorCode();
            header("Location: error_logger.php");
            exit();
        }
    }catch(Exception $err){
        $_SESSION['error'] = '<br>'.'<br>'.$err->getMessage();
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
            "description" => $_POST['description'],
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
        header('Location: ../../admin/dashboard/?status=success');

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
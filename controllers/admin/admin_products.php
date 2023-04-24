<?php
    include("../important/connect_DB.php");

    session_start();

    if(!isset($_SESSION['admusername'])){
        header('Location: /admin/index.php');
    }else{
        $admAccess = $_SESSION['admaccess'];
    }

    $class = '';
    $display = '';
    if($admAccess == 'System Admin' || $admAccess == 'Supervisor') {
        $class = 'filler';
        $display = 'default';
    } else {
        $class = 'disabled';
        $display = 'none';

    }

    $qSelect = "SELECT * FROM $dbDatabase .`products` WHERE `date_archived` IS NULL ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    if ($eSelect == true) {
        try{ 
            // $rowsz = mysqli_fetch_array($eSelect);
            // $rowImgg = $rowsz['images'];
            // $rowImg = json_decode($rowImgg);
            // echo $rowImg[0];
            $sHtml = "
                    <table id='admin_prod_tbl' class='table table-striped table-hover'>
                        <tr>
                            <th style='display:none'>Product ID</th>  
                            <th>Product Category</th>
                            <th>Product Series</th>
                            <th>Product Image</th>
                            <th>Product Name</th>    
                            <th>Price</th>
                            <th>Stocks</th>
                            <th>Action</th>
                        </tr>
                ";
            while($rows = mysqli_fetch_array($eSelect)) {
                try{
                // $rowsz = mysqli_fetch_array($eSelect);
                // $rowImgg = $rowsz['images'];
                $rowImg = json_decode($rows['images']);
                // print_r($rowImg[0]);
                
                $sHtml .= "<tr>
                        <td style='display:none'>".$rows['id']."</td>
                        <td>".$rows['category']."</td>
                        <td class='prod_desc'>".$rows['series']."</td>
                        <td class='adPListImgCont'><img class='adPListImg' loading='lazy' id='imgtest' src='".$rowImg[0]."' onerror='defaultimg(this);'></td>
                        <td>".$rows['name']."</td>
                        <td class='autoNumeric'>".$rows['price']."</td>
                        <td class='autoNumeric'>".$rows['stocks']."</td>
                        <td>
                            <button class='btn btn-light $class' onclick=modify('".$rows['id']."')>Modify</button>&nbsp;
                            <button class='btn $class redbgwhitec' onclick=archive('".$rows['id']."')>Delete</button>
                        </td>
                    ";
                } catch(Exception $e) {
                    $_SESSION['error'] = 'Level : '.$admAccess.'<br>'.'Admin User : '.$admUsername.'<br>'.$e->getMessage();
                    header("Location: error_logger.php");
                    exit();
                }
            }

            $sHtml .= "</table>
                <button id='addProduct' style='display: $display;' onclick='addProduct()'>Add Product</button>
                ";
            
            echo $sHtml;
        } catch (Exception $e){
            echo "error";
            mysqli_close($dbConnection);
        }
    } else {
        echo "Failed to connect, please call system administrator!";
    }

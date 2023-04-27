<?php
include("../important/connect_DB.php");
include("../../fpdf/fpdf.php");

session_start();

if(!isset($_SESSION['admusername'])){
    header('Location: /admin/index.php');
}else if($_SESSION['admaccess'] == 'Agent'){
    header('Location: /admin/index.php');
}else {
    $admAccess = $_SESSION['admaccess'];
    $admUsername = $_SESSION['admusername'];
    $admId = $_SESSION['admid'];    
    $admFirstName = $_SESSION['admfirstname'];
    $admLastName = $_SESSION['admlastname'];
    $admEmail = $_SESSION['admemail'];
}

    $qSelect = "SELECT * FROM $dbDatabase .`products` ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

        if($eSelect == true) {

            try{
                $pdf =  new FPDF('L');
                $pdf->AddPage('L');

                $pdf->SetFont('Arial','',24);
                $pdf->Cell(280,20,"PRODUCTS REPORT", 0, 1, 'C');
                $pdf->Ln(10);
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(40,10,"Image", 1, 0, 'C');
                $pdf->Cell(15,10,"ID", 1, 0, 'C');
                $pdf->Cell(40,10,"Name", 1, 0, 'C');
                $pdf->Cell(40,10,"Category", 1, 0, 'C');
                $pdf->Cell(40,10,"Series", 1, 0, 'C');
                $pdf->Cell(20,10,"Price", 1, 0, 'C');
                $pdf->Cell(25,10,"Stocks", 1, 0, 'C');
                $pdf->Cell(15,10,"Sold", 1, 0, 'C');
                $pdf->Cell(45,10,"Designer", 1, 0, 'C');
                $pdf->Cell(40,10,"Manufacturer", 1, 1, 'C');

                if ($eSelect == true) {
                    $x = 25;
                    $y = 50;
                    while($rows = mysqli_fetch_assoc($eSelect)) {

                        // $image = 'C:\Users\Cesar\Downloads\profile.png';

                        // $pdf->Image('C:\Users\Cesar\Downloads\profile.png', $x, $y, 10, 0, 'PNG');
                        $imgFile = json_decode($rows['images']);
                        // $img1 = $imgFile[0];
                        if(empty ($imgFile)) {
                            $img1 = "https://d1k3w7ix829ymi.cloudfront.net/products/64494584377912.57404639.png";
                        } else {
                            $img1 = $imgFile;
                        }
                        print_r($img1);
                        $x += 1;
                        echo "counter :" . $x;
                        $pdf->Image($img1[0], $x, $y, 10, 0, 'PNG');
                        $pdf->Cell(40,10,'', 1, 0, 'L');
                        $pdf->Cell(15,10,$rows['id'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['name'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['category'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['series'], 1, 0, 'L');
                        $pdf->Cell(20,10,$rows['price'], 1, 0, 'L');
                        $pdf->Cell(25,10,$rows['stocks'], 1, 0, 'L');
                        $pdf->Cell(15,10,$rows['sold'], 1, 0, 'L');
                        $pdf->Cell(45,10,$rows['designer'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['manufacturer'], 1, 1, 'L');
                        $y += 10;
                    }
                }

                $pdf->Output('F', '../../reports/pdf/products.pdf', true);
            } catch(Exception $e) {
                echo "error";
            }
        } else {
            echo "Failed to connect, please call system administrator!";
        }
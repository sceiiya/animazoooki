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

    $qSelect = "SELECT * FROM $dbDatabase .`clients` ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

        if($eSelect == true) {

            try{
                $pdf =  new FPDF('L');
                $pdf->AddPage('L', 'Legal');

                $pdf->SetFont('Arial','',24);
                $pdf->Cell(340,20,"CUSTOMERS REPORT", 0, 1, 'C');
                $pdf->Ln(10);
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(15,10,"ID", 1, 0, 'C');
                $pdf->Cell(40,10,"Name", 1, 0, 'C');
                $pdf->Cell(30,10,"Username", 1, 0, 'C');
                $pdf->Cell(40,10,"Email", 1, 0, 'C');
                $pdf->Cell(25,10,"Password", 1, 0, 'C');
                $pdf->Cell(25,10,"Contact No.", 1, 0, 'C');
                $pdf->Cell(40,10,"Shipping Address", 1, 0, 'C');
                $pdf->Cell(40,10,"Billing Address", 1, 0, 'C');
                $pdf->Cell(30,10,"Total Orders", 1, 0, 'C');
                $pdf->Cell(20,10,"Status", 1, 0, 'C');
                $pdf->Cell(35,10,"Date Added", 1, 1, 'C');

                if ($eSelect == true) {

                    while($rows = mysqli_fetch_assoc($eSelect)) {

                        $pdf->Cell(15,10,$rows['id'], 1, 0, 'C');
                        $pdf->Cell(40,10,$rows['name'], 1, 0, 'L');
                        $pdf->Cell(30,10,$rows['username'], 1, 0, 'C');
                        $pdf->Cell(40,10,$rows['email'], 1, 0, 'L');
                        $pdf->Cell(25,10,$rows['password'], 1, 0, 'C');
                        $pdf->Cell(25,10,$rows['contactno'], 1, 0, 'C');
                        $pdf->Cell(40,10,$rows['default_shipping_address'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['billing_address'], 1, 0, 'L');
                        $pdf->Cell(30,10,$rows['total_orders'], 1, 0, 'C');
                        $pdf->Cell(20,10,$rows['status'], 1, 0, 'L');
                        $pdf->Cell(35,10,$rows['date_added'], 1, 1, 'L');
                    }
                }

                $pdf->Output('F', '../../reports/pdf/customers.pdf', true);
            } catch(Exception $e) {
                echo "error";
            }
        } else {
            echo "Failed to connect, please call system administrator!";
        }
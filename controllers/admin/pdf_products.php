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
                $pdf->AddPage('L', 'LEGAL');

                $pdf->SetFont('Arial','',24);
                $pdf->Cell(320,20,"PRODUCTS REPORT", 0, 1, 'C');
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

                        $imgFile = json_decode($rows['images']);
                        $img = "";
                        if(empty ($imgFile)) {
                            $img1[0] = '../../admin/listing/product_img/animazoooki_onload.png';
                        } else {
                            $img1 = $imgFile;
                        }
                        $ext = pathinfo($img1[0], PATHINFO_EXTENSION);

                        $pdf->Image($img1[0], $x, $y, 10, 0, strtoUpper($ext));
                        $pdf->Cell(40,10,'', 1, 0, 'L');
                        $pdf->Cell(15,10,$rows['id'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['name'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['category'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['series'], 1, 0, 'L');
                        $pdf->Cell(20,10,$rows['price'], 1, 0, 'C');
                        $pdf->Cell(25,10,$rows['stocks'], 1, 0, 'C');
                        $pdf->Cell(15,10,$rows['sold'], 1, 0, 'C');
                        $pdf->Cell(45,10,$rows['designer'], 1, 0, 'L');
                        $pdf->Cell(40,10,$rows['manufacturer'], 1, 1, 'L');
                        $y += 10;
                    }
                }

                $pdf->Output('F', '../../reports/pdf/products.pdf', true);

                require_once('../../phpmailer/class.phpmailer.php');

                $mail = new PHPMailer();
                
                $mail->IsSMTP();
                $mail->SMTPAuth 	= true;
            
                $mail->Host 	  = 'smtp.hostinger.com';
                include("../important/connect_Email.php");
                $mail->FromName   = "System Administrator";
                $mail->SMTPSecure = 'ssl';
                $mail->Port 	  = 465;                        
                
                $mail->AddAddress($admEmail, $admUsername);
                $mail->AddAttachment("../../reports/pdf/products.pdf");
            
                $mail->Subject = "Products Report";
                $mail->Body = nl2br("
                See attached document for the report.
                
                ");
                
                $mail->IsHTML(true);

                if(!$mail->Send()) {
                    echo "Email not sent!";
                } else {
                    echo "Email sent!";
                }
                mysqli_close($dbConnection);
            } catch(Exception $e) {
                echo $e;
            }
        } else {
            echo "Failed to connect, please call system administrator!";
        }
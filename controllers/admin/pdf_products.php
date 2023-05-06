<?php

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


// require __DIR__ . '/vendor/autoload.php';
require_once("../important/connect_DB.php");
require_once ('../../vendor/autoload.php');


$qSelect = "SELECT * FROM $dbDatabase .`products` ORDER BY `id` DESC";
$eSelect = mysqli_query($dbConnection, $qSelect);


use \Fpdf\Fpdf;


// Instantiate the FPDF class and add a new page
$pdf = new Fpdf('L');
function addPDFheader($pdf){
    $pdf->SetFont('Arial','',24);
    $pdf->Cell(320,20,"PRODUCTS REPORT", 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(12,10,"Image", 1, 0, 'C');
    $pdf->Cell(15,10,"ID", 1, 0, 'C');
    $pdf->Cell(100,10,"Name", 1, 0, 'C');
    $pdf->Cell(40,10,"Category", 1, 0, 'C');
    $pdf->Cell(38,10,"Series", 1, 0, 'C');
    $pdf->Cell(22,10,"Price", 1, 0, 'C');
    $pdf->Cell(22,10,"Stocks", 1, 0, 'C');
    $pdf->Cell(22,10,"Sold", 1, 0, 'C');
    $pdf->Cell(28,10,"Designer", 1, 0, 'C');
    $pdf->Cell(28,10,"Manufacturer", 1, 1, 'C');    
}


$pdf->AddPage('L', 'LEGAL');
addPDFheader($pdf);


$x = 11;
$y = 50;
if ($eSelect == true) {
    $rows = mysqli_fetch_assoc($eSelect);
    $nrows = mysqli_num_rows($eSelect);
    $rowsPerPage = 13;
    for ($nr = 0; $rows !== null; $rows = mysqli_fetch_assoc($eSelect)) {
        $imgFile = json_decode($rows['images']);
        $img = "";
        if (empty($imgFile)) {
            $img1[0] = '../../admin/listing/product_img/animazoooki_onload.png';
        } else {
            $img1 = $imgFile;
        }


        if ($nr == 13) {
            $pdf->PageNo();
            $pdf->AddPage('L', 'LEGAL');
            addPDFheader($pdf);
            $y = 50;
            $nr = 1;
        }else{
            $nr++;
        }
        $ext = pathinfo($img1[0], PATHINFO_EXTENSION);
   
        $pdf->Image($img1[0], $x, $y, 10, 0, strtoUpper($ext));
        $pdf->Cell(12,10,'', 1, 0, 'L');
        $pdf->Cell(15,10,$rows['id'], 1, 0, 'L');
        $pdf->Cell(100,10,$rows['name'], 1, 0, 'L');
        $pdf->Cell(40,10,$rows['category'], 1, 0, 'L');
        $pdf->Cell(38,10,$rows['series'], 1, 0, 'L');
        $pdf->Cell(22,10,$rows['price'], 1, 0, 'C');
        $pdf->Cell(22,10,$rows['stocks'], 1, 0, 'C');
        $pdf->Cell(22,10,$rows['sold'], 1, 0, 'C');
        $pdf->Cell(28,10,$rows['designer'], 1, 0, 'L');
        $pdf->Cell(28,10,$rows['manufacturer'], 1, 1, 'L');
        $y += 10;
    }
}


$pdf->Output('F', '../../reports/pdf/products.pdf', true);

        require '../../vendor/autoload.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        if($eSelect == true) {

            try{
                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host       = 'smtp.hostinger.com';
                $mail->SMTPAuth   = true;                  
                include('../important/connect_Email.php');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->setFrom('support@animazoooki.wd49p.com', 'System Administrator');
                $mail->addAddress($admEmail, $admUsername);
                $mail->addAttachment('../../reports/pdf/products.pdf');
                $mail->isHTML(true);
                $mail->Subject = "Products Report as PDF File";
                $mail->Body    = nl2br("
                             See attached document for the report.
                            
                             ");

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
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

    // require __DIR__ . '/vendor/autoload.php';
    require_once("../important/connect_DB.php");
    require_once ('../../vendor/autoload.php');

    $qSelect = "SELECT * FROM $dbDatabase .`orders` ORDER BY `orderid` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    use \Fpdf\Fpdf;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Instantiate the FPDF class and add a new page
$pdf = new Fpdf('L');
function addPDFheader($pdf){
    $pdf->SetFont('Arial','',24);
    $pdf->Cell(350,20,"ORDERS REPORT", 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(15,10,"Order ID", 1, 0, 'C');
    $pdf->Cell(15,10,"User ID", 1, 0, 'C');
    $pdf->Cell(30,10,"Product Code", 1, 0, 'C');
    $pdf->Cell(40,10,"Product Name", 1, 0, 'C');
    $pdf->Cell(25,10,"Order Total", 1, 0, 'C');
    $pdf->Cell(25,10,"Order Quantity", 1, 0, 'C');
    $pdf->Cell(40,10,"Payment Method", 1, 0, 'C');
    $pdf->Cell(40,10,"Shipping Method", 1, 0, 'C');
    $pdf->Cell(40,10,"Date Ordered", 1, 0, 'C');
    $pdf->Cell(25,10,"Order Status", 1, 0, 'C');
    $pdf->Cell(35,10,"Date Delivered", 1, 1, 'C');    
}

$pdf->AddPage('L', 'Legal');
addPDFheader($pdf);

        if($eSelect == true) {
            try{
                $rows = mysqli_fetch_assoc($eSelect);
                $nrows = mysqli_num_rows($eSelect);
                $rowsPerPage = 13;
                for ($nr = 0; $rows !== null; $rows = mysqli_fetch_assoc($eSelect)) {
                    if ($nr == 13) {
                        $pdf->PageNo();
                        $pdf->AddPage('L', 'LEGAL');
                        addPDFheader($pdf);
                        $y = 50;
                        $nr = 1;
                    }else{
                        $nr++;
                    }

                    $pdf->Cell(15,10,$rows['orderid'], 1, 0, 'C');
                    $pdf->Cell(15,10,$rows['user_id'], 1, 0, 'C');
                    $pdf->Cell(30,10,$rows['product_code'], 1, 0, 'C');
                    $pdf->Cell(40,10,$rows['product_name'], 1, 0, 'L');
                    $pdf->Cell(25,10,$rows['order_total'], 1, 0, 'C');
                    $pdf->Cell(25,10,$rows['product_quantity'], 1, 0, 'C');
                    $pdf->Cell(40,10,$rows['payment_method'], 1, 0, 'C');
                    $pdf->Cell(40,10,$rows['shipping_method'], 1, 0, 'L');
                    $pdf->Cell(40,10,$rows['date_ordered'], 1, 0, 'C');
                    $pdf->Cell(25,10,$rows['order_status'], 1, 0, 'C');
                    $pdf->Cell(35,10,$rows['date_delivered'], 1, 1, 'L');
                } 
                                    
                $pdf->Output('F', '../../reports/pdf/orders.pdf', true);

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host       = 'smtp.hostinger.com';
                $mail->SMTPAuth   = true;                  
                include('../important/connect_Email.php');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->setFrom('support@animazoooki.wd49p.com', 'System Administrator');
                $mail->addAddress($admEmail, $admUsername);
                $mail->addAttachment('../../reports/pdf/orders.pdf');
                $mail->isHTML(true);
                $mail->Subject = "Orders Report as PDF File";
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
                echo "error";
            }
        } else {
            echo "Failed to connect, please call system administrator!";
        }
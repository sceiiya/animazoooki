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

    $qSelect = "SELECT * FROM $dbDatabase .`clients` ORDER BY `id` DESC";
    $eSelect = mysqli_query($dbConnection, $qSelect);

    use \Fpdf\Fpdf;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

        // Instantiate the FPDF class and add a new page
$pdf = new Fpdf('L');
function addPDFheader($pdf){
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
                
                $pdf->Output('F', '../../reports/pdf/customers.pdf', true);

                $mail = new PHPMailer();

                $mail->isSMTP();
                $mail->Host       = 'smtp.hostinger.com';
                $mail->SMTPAuth   = true;                  
                include('../important/connect_Email.php');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->setFrom('support@animazoooki.wd49p.com', 'System Administrator');
                $mail->addAddress($admEmail, $admUsername);
                $mail->addAttachment('../../reports/pdf/customers.pdf');
                $mail->isHTML(true);
                $mail->Subject = "Customers Report as PDF File";
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
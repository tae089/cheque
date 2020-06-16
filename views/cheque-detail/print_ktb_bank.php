<?php 
use yii\helpers\Html;
use app\models\Bank;
use app\models\Contact;

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF/tcpdf.php');
	

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
       // $img_file = K_PATH_IMAGES.'ktb_bank.jpg';
       // $this->Image($img_file, 0, 0, 245, 90, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, [245 ,90], true, 'UTF-8', false);
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Chqueue');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('thsarabun', '', 13);
//$pdf->AddPage('L', 'A5 PORTRAIT');
// add a page
$pdf->AddPage();

$pdf->SetXY(20, 2);
$pdf->Write(0, Yii::$app->numbertostring->showDateThai($data['cheque_date']));

$pdf->SetXY(17, 7);
$pdf->Write(0,$data['contactname']);

$pdf->SetXY(18, 13);
$pdf->Write(0, number_format($data['cheque_amont']));

//วันที่
$arr = Yii::$app->numbertostring->showDateNumber($data['cheque_date']);
$pdf->SetXY(181, 4);
$pdf->Write(0, $arr[0]);

$pdf->SetXY(187, 4);
$pdf->Write(0, $arr[1]);

$pdf->SetXY(193, 4);
$pdf->Write(0, $arr[2]);

$pdf->SetXY(199, 4);
$pdf->Write(0,$arr[3]);

$pdf->SetXY(206, 4);
$pdf->Write(0, $arr[4]);

$pdf->SetXY(212, 4);
$pdf->Write(0,$arr[5]);

$pdf->SetXY(218, 4);
$pdf->Write(0, $arr[6]);

$pdf->SetXY(224, 4);
$pdf->Write(0, $arr[7]);

$pdf->SetXY(80, 21);
$pdf->Write(0,$data['contactname']);

$pdf->SetXY(95, 30);
$pdf->Write(0,Yii::$app->numbertostring->num2wordsThai($data['cheque_amont']));

$pdf->SetXY(170, 37);
$pdf->Write(0, '** '.number_format($data['cheque_amont']).' **');
// Print a text

//$pdf->writeHTML($html, true, false, true, false, '');



// --- example with background set on page ---

// remove default header
$pdf->setPrintHeader(false);


// Clean any content of the output buffer
ob_end_clean();

//Close and output PDF document
$pdf->Output('chqueue.pdf', 'I');

?>
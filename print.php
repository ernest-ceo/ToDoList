<?php
declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';
use \Mpdf\Mpdf;

if(isset($_POST['print']))
{
    $mpdf = new Mpdf();
    $content[0] = 'list.php';
    $listToPrint[0] =  'layouts/printMain.php';
    $mpdf->WriteHTML($listToPrint);
    $mpdf->Output('List.pdf', 'D');
}
header('location: list.php');
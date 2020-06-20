<?php 

//IMPORTAÇÕES

//IMPORTAR O MPDF
include('../pdf/vendor/autoload.php');

//IMPORTAR O 'reportDAO.php'
include('php/reportDAO.php');

//IMPORTAR O MODELO
include('modelo/index.php');

//IMPORTAR O CSS do MODELO
$css = file_get_contents('modelo/style.css');

$mpdf = new \Mpdf\Mpdf([]);

$mode = pegarModelo($reports);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($mode,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->SetFooter('{PAGENO}');

$mpdf->Output('Relatorio_Reports.pdf','I');

 ?>
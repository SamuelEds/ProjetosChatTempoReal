<?php 

include('../pdf/vendor/autoload.php');
include('modelo/index.php');
include('php/moderadorDAO.php');
$css = file_get_contents('modelo/style.css');

$modelo = pegarModelo($moderador);

$mpdf = new \Mpdf\Mpdf([]);

$mpdf->writeHtml($css,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($modelo,\Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->SetFooter('{PAGENO}');

$mpdf->Output('Relatorio_Moderador','I');

 ?>
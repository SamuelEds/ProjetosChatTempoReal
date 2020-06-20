<?php 

//INCLUDES

//INCLUDE DO MPDF
include('../pdf/vendor/autoload.php');

//IMPORTAR O MODELO
include('modelo/index.php');

//IMPORTAR O usuariosDAO
include('php/usuariosDAO.php');

//IMPORTAR O CSS
$css = file_get_contents('modelo/style.css');

//var_dump($usuarios);
$mpdf = new \Mpdf\Mpdf([]); //INSTANCIAR O MPDF

$mod = pegarModelo($usuarios); //PEGAR O MODELO

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS); //GERAR O CSS
$mpdf->writeHtml($mod, \Mpdf\HTMLParserMode::HTML_BODY); //GERAR O HTML

$mpdf->SetFooter('{PAGENO}');

$mpdf->Output('Relatorio_usuarios.pdf','I');



 ?>
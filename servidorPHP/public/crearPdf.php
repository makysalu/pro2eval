<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$_POST["html"]
/*
$html="<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><meta http-equiv='X-UA-Compatible' content='ie=edge'><title>Registro</title><script src='./js/modernizr-custom.js'></script><script src='./js/registro.js'></script><script src='https://code.jquery.com/jquery-1.12.0.min.js'></script><script src='./js/bootstrap.min.js'></script><script src='https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js'></script><link rel='stylesheet' href='./css/normalize.css'><link rel='stylesheet' href='./css/font.css'><link rel='stylesheet' href='./css/style.css'><link rel='stylesheet' href='./css/bootstrap.min.css'></head><body>"
$html.=echo $_POST["html"];
$html.="</section>";
$html.="</body></html>";
echo $html;
*/
/*
// Introducimos HTML de prueba






 
// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();
 
// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("letter", "portrait");
//$pdf->set_paper(array(0,0,104,250));
 
// Cargamos el contenido HTML.
$pdf->load_html(utf8_decode($html));
 
// Renderizamos el documento PDF.
$pdf->render();
 
// Enviamos el fichero PDF al navegador.
$pdf->stream('reportePdf.pdf');


function file_get_contents_curl($url) {
	$crl = curl_init();
	$timeout = 5;
	curl_setopt($crl, CURLOPT_URL, $url);
	curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
	$ret = curl_exec($crl);
	curl_close($crl);
	return $ret;
}
*/
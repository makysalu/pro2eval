<?php
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$_POST["html"];

$html="<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><meta http-equiv='X-UA-Compatible' content='ie=edge'><title>Registro</title><script src='./js/modernizr-custom.js'></script><script src='./js/registro.js'></script><script src='https://code.jquery.com/jquery-1.12.0.min.js'></script><script src='./js/bootstrap.min.js'></script><script src='https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js'></script><link rel='stylesheet' href='./css/normalize.css'><link rel='stylesheet' href='./css/font.css'><link rel='stylesheet' href='./css/style.css'><link rel='stylesheet' href='./css/bootstrap.min.css'><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>";
$html.="<style>#logo{position: absolute; right: 0px;top: 100px;}<style>";
$html.="</head><body class='mr-5'><section class='container'>";
$html.="<header class='vw-100 p-4 text-center bg-light display-3'>Factura</header>";
$html.="<div  d-flex justify-content-between'>";
$html.="<div style='padding-top:10px'><h3>Estamos</h3><p>Av. Generalitat Valenciana Nº 4, Valencia, cd 23008 <br>TLF: 911-419-607<br>FAX: 915-991-908<br>Email: urbanshoot@hotmail.com<br>Web: urbanshoot.com<br></p></div></div>";
$html.="<div id='logo'><img src='img/dibujo.svg.png' width='100px' alt='...'></div>";
$html.="<br></br>";
$html.=$_POST["html"];
$html.="</section>";
$html.="</body></html>";


// Introducimos HTML de prueba
 
$dompdf = new DOMPDF();
$dompdf->load_html($html); 
$dompdf->render();    
$pdf = $dompdf->output();
ob_end_clean();
$dompdf->stream('fichero.pdf');
exit;
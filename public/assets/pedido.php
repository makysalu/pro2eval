<?php
    $seccion="<section class='container mb-5'>";
        $seccion.="<article class='mb-4'>";
            $seccion.="<header class='h2 text-center'>Pedido</header>";
            $seccion.="<table class='table'>";
                $seccion.="<thead class='thead-dark'><th scope='col'>Id Pedido</th><th scope='col'>Fecha</th><th scope='col'>DNI Cliente</th></thead>";
                $seccion.="<tbody><td>$pedido->idPedido</td><td>$pedido->fecha</td><td>$pedido->dniCliente</td></tbody>";
            $seccion.="</table>";
        $seccion.="</article>";
        $seccion.="<article>";
            $seccion.="<header class='h2 text-center'>Lineas Pedido</header>";
            $seccion.="<table class='table'>";
                $seccion.="<thead class='thead-dark'><th>Id Linea</th><th>Nombre Producto</th><th>Cantidad</th><th>Precio</th></thead>";
                $seccion.="<tbody>";
                    for ($cont=0; $cont < $_SESSION["total"]; $cont++) {
                        $seccion.="<tr><td>".$cont."</td><td>".$_SESSION["Carro"]["nombre"][$cont]."</td><td>".$_SESSION["Carro"]["cantidad"][$cont]."</td><td>".$_SESSION["Carro"]["precio"][$cont]."</td></tr>";
                    }
                    $seccion.="<tr><td colspan='2' id='confirmar_vacio'></td><td id='confirmar_total'>Precio Total</td><td id='confirmar_totalres'>$total</td></tr>";
                $seccion.="</tbody>";
            $seccion.="</table>";
        $seccion.="</article>";
    $seccion.="</section>";
    echo $seccion;
<?php
    $seccion="<section class='container p-0 pb-52'>";
        $seccion.="<header class='text-center display-4 text-white m-0 mb-4 p-5 bg-secondary'>Resumen del pedido</header>";
        $seccion.="<article class='mb-4 p-4' >";
            $seccion.="<header class='h2 text-center'>Pedido</header>";
            $seccion.="<table class='table'>";
                $seccion.="<thead class='thead-dark'><th scope='col'>Id Pedido</th><th scope='col'>Fecha</th><th scope='col'>DNI Cliente</th></thead>";
                $seccion.="<tbody><td>$pedido->idPedido</td><td>$pedido->fecha</td><td>$pedido->dniCliente</td></tbody>";
            $seccion.="</table>";
        $seccion.="</article>";
        $seccion.="<article class='mt-5 mb-4 p-4'>";
            $seccion.="<header class='h2 text-center'>Lineas Pedido</header>";
            $seccion.="<table class='table pr-4 pl-4'>";
                $seccion.="<thead class='thead-dark'><th>Id Linea</th><th>Nombre Producto</th><th>Cantidad</th><th>Precio</th></thead>";
                $seccion.="<tbody>";
                $cont=0;
                foreach ($carro as $lineaCarro) {
                    $cont=$cont+1;
                    $seccion.="<tr><td>".$cont."</td><td>".$lineaCarro["nombre"]."</td><td>".$lineaCarro["cantidad"]."</td><td>".$lineaCarro["precio"]*$lineaCarro["cantidad"]."</td></tr>";
                }
                    $seccion.="<tr><td colspan='2' id='confirmar_vacio'></td><td id='confirmar_total'>Precio Total</td><td id='confirmar_totalres'>$total</td></tr>";
                $seccion.="</tbody>";
            $seccion.="</table>";
        $seccion.="</article>";
    $seccion.="</section>";
    echo $seccion;
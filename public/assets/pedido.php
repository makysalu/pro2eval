<?php
    $seccion="<section class='container p-0'>";
        $seccion.="<header class='header-section text-center font-weight-bold display-md-4 text-white m-0 p-3 p-md-5 bg-secondary'>Resumen Pedido</header>";
        $seccion.="<article class='mb-4 p-0 p-sd-4' >";
            $seccion.="<header class='h2 text-center'>Pedido</header>";
            $seccion.="<table class='table'>";
                $seccion.="<tr class='thead-dark'><th scope='col'>Id Pedido</th><th scope='col'>Fecha</th><th scope='col'>DNI Cliente</th></tr>";
                $seccion.="<tr><td>$pedido->idPedido</td><td>$pedido->fecha</td><td>$pedido->dniCliente</td></tr>";
            $seccion.="</table>";
        $seccion.="</article>";
        $seccion.="<article class='mt-5 mb-4 p-0 p-sd-4'>";
            $seccion.="<header class='h2 text-center'>Lineas Pedido</header>";
            $seccion.="<table class='table pr-4 pl-4'>";
                $seccion.="<tr class='thead-dark'><th>Id Linea</th><th>Nombre Producto</th><th>Cantidad</th><th>Precio</th></tr>";
                $html="<article class='mb-4 p-0 p-sd-4' ><header class='h2 text-center'>Pedido</header><table class='table'><tr class='thead-dark'><th scope='col'>Id Pedido</th><th scope='col'>Fecha</th><th scope='col'>DNI Cliente</th></tr><tr><td>$pedido->idPedido</td><td>$pedido->fecha</td><td>$pedido->dniCliente</td></tr></table></article><article class='mt-5 mb-4 p-0 p-sd-4'><header class='h2 text-center'>Lineas Pedido</header><table class='table pr-4 pl-4'><tr class='thead-dark'><th>Id Linea</th><th>Nombre Producto</th><th>Cantidad</th><th>Precio</th></tr>";
                $cont=0;
                foreach ($carro as $lineaCarro) {
                    $cont=$cont+1;
                    $seccion.="<tr><td>".$cont."</td><td>".$lineaCarro["nombre"]."</td><td>".$lineaCarro["cantidad"]."</td><td>".$lineaCarro["precio"]*$lineaCarro["cantidad"]."</td></tr>";
                    $html.="<tr><td>".$cont."</td><td>".$lineaCarro["nombre"]."</td><td>".$lineaCarro["cantidad"]."</td><td>".$lineaCarro["precio"]*$lineaCarro["cantidad"]."</td></tr>";
                }
                    $seccion.="<tr><td colspan='2' id='confirmar_vacio'></td><td id='confirmar_total'>Precio Total</td><td id='confirmar_totalres'>$total</td></tr>";
              
            $seccion.="</table>";
        $seccion.="</article>";
        $html.="<tr><td colspan='2' id='confirmar_vacio'></td><td id='confirmar_total'>Precio Total</td><td id='confirmar_totalres'>$total</td></tr></table></article>";

    echo $seccion;
    ?>
    <form action="../download-pdf/" method="post">
        <div class='d-flex justify-content-end p-3'>
            <input type="hidden" value="<?php echo $html ?>" name="html">
            <button type="submit" id="download-pdf" class="btn btn-secondary p-3">Download PDF</button>
        </div>
    </form>
</section>

<script>
    this.document.getElementById("download-pdf").addEventListener('click',function(){
        $('#modal-pdf').removeClass("d-none").addClass("d-flex");
    });

</script>
                
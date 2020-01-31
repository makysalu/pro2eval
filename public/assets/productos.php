<section class="container-fluid">
    <article class="row row-cols-1 row-cols-md-3">
        <?php     
            foreach($productos as $producto){
                /*echo "<div class='productoCliente'>";
                    echo "<a href='detalle.php?idProducto=".$producto["idProducto"]."'>";
                    echo "<img src="."'./img/productos/".$producto['foto']."' alt=''>";
                    echo "<p>";
                        echo "<span id='datoMarca'>".$producto["marca"]."</span><br>";
                        echo "<span id='datoNombre'>".$producto["nombre"]."</span><br>";
                        echo "<span id='datoPrecio'>".$producto["precio"]."€</span>";
                    echo "</p>";
                    echo "</a>";
                echo "</div>";*/
                /*echo "<div class='card'>";
                    echo "<img src='./img/productos/".$producto['foto']."' class='card-img-top img-producto' alt='...'>";
                    echo "<div class='card-body'>";
                        echo "<h5 class='card-title text-center'>".$producto["nombre"]."</h5>";
                        echo "<p class='card-text text-center'>".$producto["marca"]."</p>";
                        echo "<h3 class='card-text text-center'>".$producto["precio"]."€</h3>";
                        echo "<a href='#' class='btn btn-primary d-flex justify-content-center'>Go somewhere</a>";
                    echo "</div>";
                echo "</div>";*/

               
                echo "<div class='col-6 col-md-3 col-lg-2 mb-4'>";
                    echo "<div class='card h-100'>";
                        echo "<img src="."'./img/productos/".$producto['foto']."' class='card-img-top' alt='...'>";
                        echo "<div class='card-body d-flex flex-column'>";
                            echo "<h5 class='card-title text-center'>".$producto["nombre"]."</h5>";
                            echo "<span class='card-text text-center'>".$producto["marca"]."</span>";
                            echo "<span class='card-text text-center h4'>".$producto["precio"]."€</span>";
                        echo "</div>";
                        echo "<a href='detalle.php?idProducto=".$producto["idProducto"]."' class='btn btn-dark d-flex justify-content-center'>Comprar</a>";
                    echo "</div>";
                echo "</div>";
                    
            }
        ?>
    </article>
</section>

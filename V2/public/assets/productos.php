<section class="container  pt-4">
    <article class="row row-cols-1">
        <?php     
            foreach($productos as $producto){
                echo "<div class='col-6 col-md-3 mb-4'>";
                    echo "<div class='card h-100'>";
                        echo "<img src="."'./img/productos/".$producto['foto']."' class='card-img-top' alt='...'>";
                        echo "<div class='card-body d-flex flex-column p-2'>";
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

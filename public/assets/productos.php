<section class="container bg-white p-0">
    <div id="carouselExampleIndicators" class="carousel slide m-0" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
                <?php 
                    echo "<img src='".IMG."/urban.jpg' class='d-block d-md-none w-100 col p-0' alt='...'>";
                    echo "<img src='".IMG."/urban2.jpg' class='d-none d-md-block w-100 col p-0' alt='...'>";
                 ?>
            </div>
            <div class="carousel-item">
                <?php 
                    echo "<img src='".IMG."/banner.jpeg' class='d-block d-md-none w-100 col p-0' alt='...'>";
                    echo "<img src='".IMG."/banner2.jpeg' class='d-none d-md-block w-100 col p-0' alt='...'>";
                 ?>
            </div>
            <div class="carousel-item">
            <?php 
                    echo "<img src='".IMG."/hip-hop.jpg' class='d-block d-md-none w-100 col p-0' alt='...'>";
                    echo "<img src='".IMG."/hip-hop2.jpg' class='d-none d-md-block w-100 col p-0' alt='...'>";
                 ?>
            </div>
            <!--
            <div class="carousel-item">
                <img src="img/banner.jpeg" class="d-block w-100 col" alt="...">
                <img src="img/banner2.jpeg" class="d-block w-100" alt="...">
            </div>-->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <article class="row row-cols-1 p-2 pt-4">
        <?php     
            foreach($productos as $producto){
                echo "<div class='col-12 col-sm-6 col-md-3 mb-4'>";
                    echo "<div class='card h-100'>";
                        echo "<img src='".IMG."/productos/".$producto['foto']."' class='card-img-top' alt='...'>";
                        echo "<div class='card-body d-flex flex-column p-2'>";
                            echo "<h5 class='card-title text-center'>".$producto["nombre"]."</h5>";
                            echo "<span class='card-text text-center'>".$producto["marca"]."</span>";
                            echo "<span class='card-text text-center h4'>".$producto["precio"]."€</span>";
                        echo "</div>";
                        echo "<a href='detalle/".$producto["idProducto"]."' class='btn btn-dark d-flex justify-content-center'>Comprar</a>";
                    echo "</div>";
                echo "</div>";      
            }
        ?>
    </article>
</section>

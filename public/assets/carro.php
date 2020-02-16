<section class="container p-0 pb-5">
    <header class="header-section text-center font-weight-bold display-md-4 text-white m-0 p-3 p-md-5 bg-secondary">Cesta de la compra</header>
    <form action="../carrito/" method="post">
        <article class="pl-4 pr-4 row">
        <div class="col-md-6 col-log-8 ml-md-4 ml-lg-5">
      
                <?php
                    if(isset($_COOKIE["idCarro"])){     
                        foreach ($carro as $lineaCarro) {
                            echo "<div class='row p-2 border-bottom'>";
                                echo "<span class='col-12'>";
                                    echo "<input type='hidden' name='nlinea[]' value='".$lineaCarro["lineaCarro"]."' readonly>";
                                echo "</span>";
                                echo "<span class='col-4'>";
                                    echo "<img class='w-100' src='".IMG."/productos/".$lineaCarro["foto"]."' alt='...' class='img-fluid'>";
                                // echo "<figcaption class='figure-caption'>A caption for the above image.</figcaption>";
                                echo "</span>";
                                echo "<div class='col-8 p-2'>";
                                    echo "<p>".$lineaCarro["nombre"]."</p>";
                                    echo "<div class='d-flex justify-content-between'>";
                                        echo "<span><input type='number' name='cantidad[]' min='0' max='100' value='".$lineaCarro["cantidad"]."' required></span>";
                                        echo "<span>".$lineaCarro["precio"]*$lineaCarro["cantidad"]."</span>";
                                        echo "<span><a href='".$lineaCarro["lineaCarro"]."'><img width='20px' id='logo_close' src='".IMG."/close.png' alt='fotocierre'></a></span>";
                                    echo "</div>";    
                                echo "</div>";
                               
                            echo "</div>";
                            
                            $total=$total+$lineaCarro["precio"]*$lineaCarro["cantidad"];
                            
                        }
                    }
                    if(isset($_POST["Comprar"])&&!isset($_COOKIE["idCarro"])){  
                            echo "<div class='row p-2 border-bottom'>";
                            echo "<span class='col-12'>";
                                        echo "<input type='hidden' name='nlinea[]' value='1' readonly>";
                                    echo "</span>";
                            echo "<span class='col-4'>";
                                echo "<img src='".IMG."/productos/".$_POST["foto"]."' alt='...' class='img-thumbnail'>";
                            // echo "<figcaption class='figure-caption'>A caption for the above image.</figcaption>";
                            echo "</span>";
                            echo "<div class='col-8 p-2'>";
                                echo "<p>".$_POST["nombre"]."</p>";
                                echo "<div class='d-flex justify-content-between'>";
                                    echo "<span><input type='number' name='cantidad[]' min='0' max='100' value='".$_POST["cantidad"]."' required></span>";
                                    echo "<span>".$_POST["precio"]*$_POST["cantidad"]."</span>";
                                    echo "<input type='hidden' name='nlinea' value='1'>";
                                    echo "<span><a href='1'><img width='20px' id='logo_close' src='".IMG."/close.png' alt='fotocierre'></a></span>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        $total=$total+$_POST["precio"]*$_POST["cantidad"];
                        
                    }
                    echo "<span class='col-12 pl-0'><a class='text-dark' href='".S."'><input class='text-dark btn btn-outline-secondary w-100 mt-3' id='boton_actualizarCarro' type='button' value='Seguir Comprando'></a></span>";
                    echo "<span class='col-12 pl-0'><input class='text-dark btn btn-outline-secondary w-100 mt-3' id='boton_actualizarCarro' type='submit' value='Actualizar' name='actualizar'></span>";
                ?>
            </div>  
           <div class="col-md-4 m-md-3 mt-5 ml-md-5">
            <?php
                echo "<div class='row bg-dark p-1'></div>";
                echo "<div class='row bg-light p-0 border'>";
                        echo "<div class='col align-self-end pb-4 pt-2'>";
                            echo "<div class='d-flex justify-content-between pt-2 pb-2'>";
                                echo "<span class=''>Subtotal</span><span class=''>".$total."€</span>";
                            echo "</div>";
                            echo "<div class='d-flex justify-content-between border-bottom border-dark pt-2 pb-2'>";
                                echo "<span class=''>Gastos trasporte</span><span class=''>0€</span>";
                            echo "</div>";
                            echo "<div class='d-flex justify-content-between pt-2 pb-2'>";
                                echo "<span class='font-weight-bold'>Precio total</span><span class='font-weight-bold'>".$total."€</span>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='row bg-light'>";
                        echo "<span class='col-12 p-0 ml-0'><a href='../comprar/' class='col-12 btn btn-secondary w-100 mt-3'>Confirmar</a></span>";
                    echo "</div>";
                ?>
                </div>
        </article>
    </form>
</section>
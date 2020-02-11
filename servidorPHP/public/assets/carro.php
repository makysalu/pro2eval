<section class="container p-0 pb-5">
    <header class="text-center display-4 text-white m-0 mb-4 p-5 bg-secondary">Cesta de la compra</header>
    <form action="" method="post">
        <article class="pl-4 pr-4">
        <table class="table">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">IMAGEN</th>
                    <th scope="col">PRODUCTO</th>
                    <th scope="col">UNIDADES</th>
                    <th scope="col">VALOR</th>
                    <th scope="col" style='width: 60px'></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_COOKIE["idCarro"])){     
                        foreach ($carro as $lineaCarro) {
                            echo "<tr class='text-center table-active'>";
                                echo "<td style='width: 100px'><img class='mw-100' src='".IMG."/productos/".$lineaCarro["foto"]."' alt='imagen-producto'></td>";
                                echo "<td class='align-middle'>".$lineaCarro["nombre"]."</td>";
                                echo "<td class='align-middle'><input type='hidden' name='nlinea[]' value='".$lineaCarro["lineaCarro"]."' readonly><input type='number' name='cantidad[]' min='0' max='100' value='".$lineaCarro["cantidad"]."' required></td>";
                                echo "<td class='align-middle'>".$lineaCarro["precio"]*$lineaCarro["cantidad"]."</td>";
                                $total=$total+$lineaCarro["precio"]*$lineaCarro["cantidad"];
                                echo "<td style='width: 80px' ><a href='pedido=".$lineaCarro["lineaCarro"]."'><img class='mw-100  pt-4 p-3' id='logo_close' src='".IMG."/close.png' alt='fotocierre'></a></td>";
                            echo "</tr>";
                        }
                    }
                    if(isset($_POST["Comprar"])&&!isset($_COOKIE["idCarro"])){
                        echo "<tr class='text-center table-active'>";
                            echo "<td style='width: 100px'><img class='mw-100' src='".IMG."/productos/".$_POST["foto"]."' alt='imagen-producto'></td>";
                            echo "<td class='align-middle'>".$_POST["nombre"]."</td>";
                            echo "<td class='align-middle'><input type='hidden' name='nlinea[]' value='1' readonly><input type='number' name='cantidad[]' min='0' max='100' value='".$_POST["cantidad"]."' required></td>";
                            echo "<td class='align-middle'>".$_POST["precio"]*$_POST["cantidad"]."</td>";
                            $total=$total+$_POST["precio"]*$_POST["cantidad"];
                            echo "<td style='width: 80px' ><a href='pedido=1'><img class='mw-100  pt-4 p-3' id='logo_close' src='./img/close.png' alt='fotocierre'></a></td>";
                        echo "</tr>";
                    }
                    
                ?>
            </tbody>
        </table>
            <?php
                echo "<div class='row mr-1'>";
                        echo "<span class='col align-self-start'><a href='../'><input class='btn btn-secondary ml-5' id='boton_seguirComprando' type='button' value='Seguir Comprando'></a></span>";
                        echo "<span class='col align-self-center'>&nbsp;</span>";
                        echo "<div class='col align-self-end table-active p-4'>";
                            echo "<div class='d-flex flex-row'>";
                                echo "<span class='col align-self-start'>Subtotal</span><span class='col align-self-end'>".$total."€</span>";
                            echo "</div>";
                            echo "<div class='d-flex flex-row'>";
                                echo "<span class='col align-self-start'>Gastos trasporte</span><span class='col align-self-end'>0€</span>";
                            echo "</div>";
                            echo "<div class='d-flex flex-row'>";
                                echo "<span class='col align-self-start'>Precio total</span><span class='col align-self-end'>".$total."€</span>";
                            echo "</div>";
                            echo "<div class='d-flex flex-row mt-4'>";
                                echo "<span class='col align-self-start'><input class='btn btn-secondary' id='boton_actualizarCarro' type='submit' value='Actualizar' name='actualizar'></span>";
                                echo "<span class='col align-self-end'><a href='".S."/comprar' class='btn btn-secondary'>Confirmar</a></span>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                ?>
        </article>
    </form>
</section>
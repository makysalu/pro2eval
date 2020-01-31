<section class="container pb-5">
    <h1 class="text-center p-4 bg-secondary">Cesta de la compra</h1>
    <form action="" method="post">
        <article class="productos_carro">
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
                    for ($cont=0; $cont < $_SESSION["total"]; $cont++) {
                        echo "<tr class='text-center table-active'>";
                            echo "<td style='width: 100px'><img class='mw-100' src="."'./img/productos/".$_SESSION["Carro"]['foto'][$cont]."' alt='imagen-producto'></td>";
                            echo "<td class='align-middle'>".$_SESSION["Carro"]["nombre"][$cont]."</td>";
                            echo "<td class='align-middle'><input type='number' name='cantidad[]' min='0' max='100' value='".$_SESSION['Carro']['cantidad'][$cont]."' required></td>";
                            echo "<td class='align-middle'>".$_SESSION["Carro"]["precio"][$cont]."</td>";
                            echo "<td style='width: 80px' ><img class='mw-100  pt-4 p-3' id='logo_close' src='./img/close.png' alt='fotocierre'></td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
            <?php
                echo "<div class='row mr-1'>";
                        echo "<span class='col align-self-start'><a href='principal.php'><input class='btn btn-secondary ml-5' id='boton_seguirComprando' type='button' value='Seguir Comprando'></a></span>";
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
                            echo "<div class='d-flex flex-row justify-content-center mt-4'>";
                                echo "<input class='btn btn-secondary mr-4' id='boton_actualizarCarro' type='submit' value='Actualizar' name='actualizar'>";
                                echo "<a href='confirmar.php'><input class='btn btn-secondary' id='boton_confirmarCarro' type='button' value='Confirmar'></a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                ?>
        </article>
    </form>
</section>
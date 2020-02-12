<section class="container p-0 pb-5" >
    <header class="text-center font-weight-bold display-md-4 text-white m-0 p-3 p-md-5 bg-secondary"><?php echo $producto->nombre;?></header>
    <article class="row">
        <!--hola-->
        <!--<h1 class="col-12 display-4 text-center pb-2 mb-4 border-bottom"></h1>-->
        <div class="col-sm-4 col-md-5 m-3 m-md-4 m-lg-5 d-flex justify-content-center">
            <?php echo "<img src='".IMG."/productos/$producto->foto' class='img-thumbnail img-detalle' alt='...'>" ?>
        </div>
        <div class="col-sm-6 col-md-5  m-3 m-md-4 m-lg-5">
            <form class="form-horizontal" action="../carrito" method="post" enctype="multipart/form-data" name="buy">
                <div class="form-group row">
                    <label for="input-marca" class="font-weight-bold col-2 col-sm-3 col-md-3 form-control-label mr-2">Marca:</label>
                    <div class="col-9 col-sm-9 col-md-9 ">
                        <span class=><?php echo $producto->marca;?></span>
                        <input type="hidden" name="marca" id="input-marca" value="<?php echo $producto->marca;?>" readonly><br>   
                    </div>
                </div>
                <div class="form-group price_elem row">
                    <label form="input-precio" class="font-weight-bold col-2 col-sm-3 col-md-3 form-control-label mr-2">Precio:</label>
                    <div class="col-7 col-sm-8 col-md-9">
                        <select name="moneda" id="">
                            <option value="EURO"><?php echo round(($monedas->currency_rates->EUR*$producto->precio/$monedas->currency_rates->USD/$monedas->currency_rates->EUR),2)."€" ?></option>
                            <option value="EURO"><?php echo round(($monedas->currency_rates->EUR*$producto->precio/$monedas->currency_rates->USD/$monedas->currency_rates->USD),2)."$" ?></option>
                            <option value="EURO"><?php echo round(($monedas->currency_rates->EUR*$producto->precio/$monedas->currency_rates->USD/$monedas->currency_rates->GBP),2)."£" ?></option>                       
                            <option value="EURO"><?php echo round(($monedas->currency_rates->EUR*$producto->precio/$monedas->currency_rates->USD/$monedas->currency_rates->CAD),2)."$ canadiense" ?></option>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-cantidad" class="font-weight-bold col-3 col-sm-3 col-md-3 form-control-label mr-2">Cantidad:</label>
                    <div class="col-7 col-sm-8 col-md-9">
                        <input type="number" class="" id="input-cantidad" name="cantidad" maxlength="5" value="1">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-md-3 form-control-label mr-2">Description:</label>
                    <div class="col-sm-8 col-md-9">
                        <p><?php echo $producto->descripcion ?></p>
                    </div>
                </div>
                <div class="form-group product-stock product-available row visible">
                    <label class="font-weight-bold col-sm-3 col-md-3 form-control-label mr-2"></label>
                    <div class="col-sm-8 col-md-9">
                        <input type="submit" class="btn btn-secondary w-100" name="Comprar" value="Añadir al Carro">
                    </div>
                </div>  
                <div id="product-sharing" class="row">
                    <ul class="list-inline social-networks col-sm-9 col-md-9">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/">
                                <ion-icon class="icon ion-ios-color-filter redes-sociales" color="medium" size="large" name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/?hl=es">
                                <ion-icon href="" class="redes-sociales" color="medium" size="large" name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/?lang=es">
                                <ion-icon href="" class="redes-sociales" color="medium" size="large" name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
                <input type="hidden" name="precio" id="input-precio" value="<?php echo $producto->precio;?>" readonly><br>
                        <input type="hidden" name="idProducto" value="<?php echo $producto->idProducto;?>" readonly>
                        <input type="hidden" name="nombre" id="input-nombre" value="<?php echo $producto->nombre;?>" readonly><br>
                        <input type="hidden" name="foto" id="input-foto" value="<?php echo $producto->foto;?>" readonly><br>
            </form>
        </div>
    </article>
</section>
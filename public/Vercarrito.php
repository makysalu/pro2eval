<?php 
        $total=0;
        require "../src/Modelo.php";
        $bbdd=new BBDD;
        if(isset($_COOKIE["usuario"])){
            for ($cont=0; $cont < $_COOKIE["total"]; $cont++) {
                $precio=$_SESSION["Carro"]["precio"][$cont];
                $cantidad=$_SESSION["Carro"]["cantidad"][$cont];
                $total=$total+($precio*$cantidad);

                if(isset($_POST["Comprar"])){
                    Carrito::añadirLinea($_POST["idProducto"],$_POST["nombre"],$_POST["precio"],$_POST["cantidad"],$_POST["foto"]);
                }
                else if(isset($_POST["actualizar"])){
                    Carrito::ActualizarCarro($_POST["cantidad"]);
                }
            }
        }
        else{
            if(isset($_POST["Comprar"])){
                if(isset($_COOKIE["idCarro"])){
                    $lineaCarro =new Carro($_COOKIE["idCarro"],"",0,$_POST["idProducto"],$_POST["cantidad"]);
                    postLineaCarro($bbdd->conexion);
                }
                else{
                    $total=0;
                    $newCookie=Carro::maxIdCarro($bbdd->conexion);
                    $newCookie=$newCookie["MAX(idCarro)"]+1;
                    setcookie("idCarro",$newCookie,time()+36000);
                    $Carro=new Carro($newCookie,"",0,$_POST["idProducto"],$_POST["cantidad"]);
                    $Carro->postLineaCarro($bbdd->conexion);
                    
                }
            }
            else if(isset($_POST["actualizar"])){
                Carrito::ActualizarCarro($_POST["cantidad"]);
            }
        }
        Carro::

        require "./assets/inicioHTML.php";
        include "./assets/header.php";
        include "./assets/carro.php";
        require "./assets/cierreHTML.php";
    ?>

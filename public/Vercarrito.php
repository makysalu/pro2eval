<?php 
        $total=0;
        require "../src/Modelo.php";
        $bbdd=new BBDD;
        if(isset($_POST["Comprar"])){
            if(isset($_COOKIE["usuario"])){
                $dniCliente=$_COOKIE["usuario"];
            }
            else{
                $dniCliente=0;
            }
            if(isset($_COOKIE["idCarro"])){
                $lineaCarro =new Carro($_COOKIE["idCarro"],"",$dniCliente,$_POST["idProducto"],$_POST["cantidad"]);
            }
            else{
                $total=0;
                $newCookie=Carro::maxIdCarro($bbdd->conexion);
                $newCookie=$newCookie["MAX(idCarro)"]+1;
                setcookie("idCarro",$newCookie,time()+36000);
                $lineaCarro=new Carro($newCookie,"",$dniCliente,$_POST["idProducto"],$_POST["cantidad"]);
            }
            $lineaCarro->postLineaCarro($bbdd->conexion);
        }
        elseif (isset($_POST["actualizar"])) {
                for ($i=0; $i < count($_POST["cantidad"]) ; $i++) {
                    $lineaCarro=new Carro($_COOKIE["idCarro"],$_POST["nlinea"][$i],"","",$_POST["cantidad"][$i]);
                    $lineaCarro->putLineaCarro($bbdd->conexion);
                    if($_POST["cantidad"][$i]==0){
                        $lineaCarro->deleteLineaCarro($bbdd->conexion);
                    }
                    else{
                        $lineaCarro->putLineaCarro($bbdd->conexion);
                    }
                }
        }
        elseif (isset($_GET)) {
            $lineaCarro=new Carro($_COOKIE["idCarro"],$_GET["lineaCarro"],"","","");
            $lineaCarro->deleteLineaCarro($bbdd->conexion);
        }
        if(isset($_COOKIE["idCarro"])){
            $carro=Carro::getAllLinesOfCarro($bbdd->conexion,$_COOKIE["idCarro"]);
        }

           
        /*if(isset($_COOKIE["usuario"])){
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
            
            }
            else if(isset($_POST["actualizar"])){
                Carrito::ActualizarCarro($_POST["cantidad"]);
            }
        }*/

        require "./assets/inicioHTML.php";
        include "./assets/header.php";
        include "./assets/carro.php";
        require "./assets/cierreHTML.php";
    ?>

<?php 
        $total=0;
        
        if(isset($_COOKIE["usuario"])){
            for ($cont=0; $cont < $_COOKIE["total"]; $cont++) {
                $precio=$_SESSION["Carro"]["precio"][$cont];
                $cantidad=$_SESSION["Carro"]["cantidad"][$cont];
                $total=$total+($precio*$cantidad);

                if(isset($_POST["Comprar"])){
                    require "../src/Modelo.php";
                    Carrito::añadirLinea($_POST["idProducto"],$_POST["nombre"],$_POST["precio"],$_POST["cantidad"],$_POST["foto"]);
                }
                else if(isset($_POST["actualizar"])){
                    require "../src/Modelo.php";
                    Carrito::ActualizarCarro($_POST["cantidad"]);
                }
            }
        }
        else{
            if(isset($_POST["Comprar"])){
                require "../src/Modelo.php";
                if(isset($_COOKIE["carro"])){
                    $carro=json_decode($_COOKIE["carro"]);
                    $total=$_COOKIE["total"];
                    $lineaCarro=Carrito::añadirLinea($_POST["idProducto"],$_POST["nombre"],$_POST["precio"],$_POST["cantidad"],$_POST["foto"],$total);
                    setcookie('total',$total+1,time()+360000);
                }
                else{
                    $total=0;
                    setcookie("idCarro",0,time()+36000);
                    setcookie('total',1,time()+360000);
                    $carro= array();
                    
                    $lineaCarro=Carrito::añadirLinea($_POST["idProducto"],$_POST["nombre"],$_POST["precio"],$_POST["cantidad"],$_POST["foto"],$total);
                }
                array_push($carro,$lineaCarro);
                $carro=json_encode($carro);
                setcookie("carro",$carro,time()+36000);
            }
            else if(isset($_POST["actualizar"])){
                require "../src/Modelo.php";
                Carrito::ActualizarCarro($_POST["cantidad"]);
            }
        }
        require "./assets/inicioHTML.php";
        include "./assets/header.php";
        include "./assets/carro.php";
        require "./assets/cierreHTML.php";
    ?>

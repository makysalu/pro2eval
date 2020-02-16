<?php 
        $total=0;
        if(isset($_COOKIE["totalCarro"])){
            $totalCarro=$_COOKIE["totalCarro"];
        }
        else{
            $totalCarro=0;
        }
        
        require "../src/Modelo.php";
        $bbdd=new BBDD;
        if(isset($_POST["Comprar"])){
            if(isset($_COOKIE["dniCliente"])){
                $dniCliente=$_COOKIE["dniCliente"];
            }
            else{
                $dniCliente="";
            }
            if(isset($_COOKIE["idCarro"])){
                $lineaCarro =new Carro($_COOKIE["idCarro"],"",$dniCliente,$_POST["idProducto"],$_POST["cantidad"]);
            }
            else{
                $total=0;
                $newCookie=Carro::maxIdCarro($bbdd->conexion);
                $newCookie=$newCookie["MAX(idCarro)"]+1;
                setcookie("idCarro",$newCookie,time()+36000,"/");
                $lineaCarro=new Carro($newCookie,"",$dniCliente,$_POST["idProducto"],$_POST["cantidad"]);
            }
            $lineaCarro->postLineaCarro($bbdd->conexion);
            $totalCarro=$totalCarro+1;
        }
        elseif (isset($_POST["actualizar"])) {
                for ($i=0; $i < count($_POST["cantidad"]) ; $i++) {
                    $lineaCarro=new Carro($_COOKIE["idCarro"],intval($_POST["nlinea"][$i]),"","",$_POST["cantidad"][$i]);
                    $lineaCarro->putLineaCarro($bbdd->conexion);
                    if($_POST["cantidad"][$i]==0){
                        $lineaCarro->deleteLineaCarro($bbdd->conexion);
                        $totalCarro=$totalCarro-1;
                    }
                    else{
                        $lineaCarro->putLineaCarro($bbdd->conexion);
                    }
                }
        }
        elseif (isset($_GET["lineaCarro"])){    
            $lineaCarro=new Carro($_COOKIE["idCarro"],$_GET["lineaCarro"],"","","");
            $lineaCarro->deleteLineaCarro($bbdd->conexion);
            $totalCarro=$totalCarro-1;
        }
        setcookie("totalCarro",$totalCarro,time()+36000,"/");
        if(isset($_COOKIE["idCarro"])){
            $carro=Carro::getAllLinesOfCarro($bbdd->conexion,$_COOKIE["idCarro"]);
        }

        require "./assets/inicioHTML.php";
        include "./assets/header.php";
        include "./assets/carro.php";
        require "./assets/cierreHTML.php";
    ?>

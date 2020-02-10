<?php
    if(isset($_COOKIE["dniCliente"])){
        if(isset($_COOKIE["idCarro"])){
            require "../src/Modelo.php";
            $bbdd = new BBDD;
            $total=0;
            $carro=Carro::getAllLinesOfCarro($bbdd->conexion,$_COOKIE["idCarro"]);
            $pedido=new Pedido("",date("y-m-d"),"","","",$_COOKIE["dniCliente"]);
            $pedido->postPedido($bbdd->conexion);
            foreach ($carro as $lineaCarro) {
                $lineaPedido=new LineaPedido($pedido->idPedido,"",$lineaCarro["idProducto"],$lineaCarro["cantidad"]);
                $lineaPedido->postLineaPedido($bbdd->conexion);
                $total=$total+$lineaCarro["precio"]*$lineaCarro["cantidad"];
            }
            $closeCarro=new Carro($_COOKIE["idCarro"],"","","","");
            $closeCarro->deleteCarro($bbdd->conexion);
            setcookie("idCarro","",time()-36000);
            setcookie("totalCarro","",time()-36000);
            require "./assets/inicioHTML.php";
            require "./assets/header.php";
            require "./assets/pedido.php";
        }
        else{
            header("location:Vercarrito.php");
        }        
    }
    else{
        header("location:Vercarrito.php");
    }
      
?>
<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require "../../src/Modelo.php";
    require "utils.php";
    $bbdd = new BBDD;

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($_GET['idPedido'])){
          $pedido= new Pedido($_GET['idPedido'],'','','','','','');
          $datos=$pedido->getPedido($bbdd->conexion);
          header("HTTP/1.1 200 OK");
          echo json_encode($datos);
          exit();
        }
        else {
          //Mostrar lista de post
          $datos=Pedido::getAllPedidos($bbdd->conexion);
          header("HTTP/1.1 200 OK");
          echo json_encode($datos);
          exit();
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inputJSON = file_get_contents('php://input');
        $input= json_decode( $inputJSON, TRUE );
        $pedido= new Pedido("",$input["fecha"],$input["dirEntrega"],$input["nTarjeta"],$input["matriculaRepartidor"],$input["dniCliente"]);
        $resul=$pedido->postPedido($bbdd->conexion);
        header("HTTP/1.1 200 OK");
        echo json_encode($resul);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $_PUT=get_object_vars(json_decode(file_get_contents('php://input')));
        if(isset($_PUT["idPedido"])){
            $input = $_PUT;
            $fecha=null;
            $dirEntrega=null;
            $nTarjeta=null;
            $matriculaRepartidor=null;
            $dniCliente=null;

            if(isset($_PUT["fecha"])) $fecha=$_PUT["fecha"];
            if(isset($_PUT["dirEntrega"])) $dirEntrega=$_PUT["dirEntrega"];
            if(isset($_PUT["nTarjeta"])) $nTarjeta=$_PUT["nTarjeta"];
            if(isset($_PUT["matriculaRepartidor"])) $matriculaRepartidor=$_PUT["matriculaRepartidor"];
            if(isset($_PUT["dniCliente"])) $dniCliente=$_PUT["dniCliente"];
            
            $pedido= new Pedido($_PUT['idPedido'],$fecha,$dirEntrega,$nTarjeta,$matriculaRepartidor,$dniCliente);
            $resul=$pedido->putPedido($bbdd->conexion,$input);
            header("HTTP/1.1 200 OK");
            echo json_encode($resul);
            exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if (isset($_GET['idPedido'])){
            $pedido= new Pedido($_GET['idPedido'],'','','','','','');
            $resul=$pedido->deletePedido($bbdd->conexion);
            header("HTTP/1.1 200 OK");
            echo json_encode($resul);
            exit();
        }
        else{
            echo json_encode(false);
            exit();
        }
    }
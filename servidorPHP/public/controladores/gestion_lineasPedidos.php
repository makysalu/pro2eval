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
            $lineas=LineaPedido::getAllLineasPedidos($bbdd->conexion,$_GET['idPedido']);
            header("HTTP/1.1 200 OK");
            echo json_encode($lineas);
          exit();
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inputJSON = file_get_contents('php://input');
        $input= json_decode( $inputJSON, TRUE );
        $lineaPedido = new LineaPedido($input["idPedido"],$input["nlinea"],$input["idProducto"],$input["cantidad"]);
        $lineaPedido->postLineaPedido($bbdd->conexion);
        header("HTTP/1.1 200 OK");
        echo json_encode(true);
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if (isset($_GET['idPedido'])){
            $lineaPedido= new LineaPedido(intval($_GET['idPedido']),intval($_GET["nlinea"]),'','');
            $lineaPedido->deleteLineaPedido($bbdd->conexion);
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
            exit();
        }
        else{
            echo json_encode(false);
            exit();
        }
    }
?>
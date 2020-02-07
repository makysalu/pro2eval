<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require "../../src/Modelo.php";
    require "utils.php";
    $bbdd = new BBDD;

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        if (isset($_GET['idProducto'])){
          $producto= new Producto($_GET['idProducto'],"","","","","","","");
          $datos=$producto->getProducto($bbdd->conexion);
          header("HTTP/1.1 200 OK");
          echo json_encode($datos);
          exit();
        }
        else {
          //Mostrar lista de post
          $datos=Producto::getAllProductos($bbdd->conexion);
          header("HTTP/1.1 200 OK");
          echo json_encode($datos);
          exit();
        }
    }

    //Entrada Por Metodo Post
    // Crear un nuevo post
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inputJSON = file_get_contents('php://input');
        $input= json_decode( $inputJSON, TRUE );
        //var_dump($input["dniid$idProducto"]); 
        $idProducto= new Producto($input['idProducto'],"","","","","","","");
        
        $idProducto->getProducto($bbdd->conexion);
        
        if($idProducto->nombre==""){
            $idProducto= new producto("",$input["nombre"],$input["descripcion"],$input["foto"],$input["marca"],$input["categoria"],$input["unidades"],$input["precio"]);
            $idProducto->postProducto($bbdd->conexion);
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
            exit();
        }
        else{
            echo json_encode(false);
        }
    }
    
    //Entrada Por Metodo Put
    // Actualizar campos mediante put
    if ($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $_PUT=get_object_vars(json_decode(file_get_contents('php://input')));
        if(isset($_PUT["idProducto"])){
            $input = $_PUT;
            $nombre=null;
            $descripcion=null;
            $foto=null;
            $marca=null;
            $categoria=null;
            $unidades=null;
            $precio=null;
            if(isset($_PUT["nombre"])) $nombre=$_PUT["nombre"];
            if(isset($_PUT["descripcion"])) $descripcion=$_PUT["descripcion"];
            if(isset($_PUT["foto"])) $email=$_PUT["foto"];
            if(isset($_PUT["marca"])) $email=$_PUT["marca"];
            if(isset($_PUT["categoria"])) $email=$_PUT["categoria"];
            if(isset($_PUT["unidades"])) $email=$_PUT["unidades"];
            if(isset($_PUT["precio"])) $email=$_PUT["precio"];
            
            $producto= new Producto($_PUT['idProducto'],$nombre,$descripcion,$foto,$marca,$categoria,$unidades,$precio);
            $resul=$producto->putProducto($bbdd->conexion,$input);
            header("HTTP/1.1 200 OK");
            echo json_encode($resul);
            exit();
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if (isset($_GET['idProducto'])){
            $producto= new Producto($_GET['idProducto'],"","","","","","","");
            echo $producto->idProducto;
            $producto->deleteProducto($bbdd->conexion);
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
            exit();
        }
        else{
            echo json_encode(false);
            exit();
        }
    }
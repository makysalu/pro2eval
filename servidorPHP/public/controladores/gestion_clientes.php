<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require "../../src/Modelo.php";
    require "utils.php";
    $bbdd = new BBDD;
    
    
    //Entrada Por Metodo Get
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){  
        if (isset($_GET['dniCliente'])){
          $cliente= new Usuario($_GET['dniCliente'],'','','','','');
          $datos=$cliente->getUsuario($bbdd->conexion);
          header("HTTP/1.1 200 OK");
          echo json_encode($datos);
          exit();
        }
        else {
          //Mostrar lista de post
          $datos=Usuario::getAllUsuarios($bbdd->conexion);
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
        //var_dump($input["dniCliente"]); 
        $cliente= new Usuario($input['dniCliente'],"","","","","");
        $cliente->getUsuario($bbdd->conexion);
        
        if($cliente->nombre==""){
            $cliente= new Usuario($input['dniCliente'],$input['nombre'],$input['direccion'],$input['email'],$input['pwd'],$input['admin']);
            $cliente->postUsuario($bbdd->conexion);
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
        if(isset($_PUT["dniCliente"])){
            $input = $_PUT;
            $nombre=NULL;
            $direccion=NULL;
            $email=NULL;
            if(isset($_PUT["nombre"])) $nombre=$_PUT["nombre"];
            if(isset($_PUT["direccion"])) $direccion=$_PUT["direccion"];
            if(isset($_PUT["email"])) $email=$_PUT["email"];
            
            $cliente= new Usuario($_PUT['dniCliente'],$nombre,$direccion,$email,null,null);
            $resul=$cliente->putCliente($bbdd->conexion,$input);
            header("HTTP/1.1 200 OK");
            echo json_encode($resul);
            exit();
        }
        else{
            echo json_encode(false);
        }
    }

    //Borrar
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE'){
        if (isset($_GET['dniCliente'])){
            $cliente=new Usuario($_GET['dniCliente'],'','','','','');
            $cliente->deleteUsuario($bbdd->conexion);
            header("HTTP/1.1 200 OK");
            echo json_encode(true);
            exit();
        }
        else{
            echo json_encode(false);
            exit();
        }
    }

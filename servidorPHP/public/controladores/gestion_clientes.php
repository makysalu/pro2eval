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
        if(isset($_GET['dniCliente'])){
            $input = $_GET;
            $nombre=NULL;
            $direccion=NULL;
            $email=NULL;
            if(isset($_GET['nombre'])) $nombre=$_GET['nombre'];
            if(isset($_GET['direccion'])) $direccion=$_GET['direccion'];
            if(isset($_GET['email'])) $email=$_GET['email'];

            $cliente= new Usuario($_GET['dniCliente'],$nombre,$direccion,$email,null,null);
            $resul=$cliente->putCliente($bbdd->conexion,$input);
            header("HTTP/1.1 200 OK");
            echo json_encode($resul);
            exit();
        }
    }
/*
    if(isset($input['funcion'])){
        if($input["funcion"]=="listar"){
            listar_cliente();
        }
        else if($input["funcion"]=="datos"){
            if(isset($input["dniCliente"])){
                datos_cliente($input["dniCliente"]);
            }
        }
        else if($input["funcion"]=="añadir"){
            $respuesta=array();
            $error= array();
            foreach ($input as $key => $value) {     
                if(empty($input[$key])){
                    array_push($error,$key);
                }
            }
            if (empty($error)){
                añadir_cliente($input,$respuesta);
            }
            else{
                array_push($respuesta,false);
                array_push($respuesta,1);
                echo json_encode($respuesta);
            }
        }
        else if($input["funcion"]=="eliminar"){
            if(isset($input["dniCliente"])){
                eliminar_cliente($input["dniCliente"]);
            }
        }
        else if($input["funcion"]=="modificar"){
            $respuesta=array();
            $error= array();
            foreach ($input as $key => $value) {     
                if(empty($input[$key])){
                    array_push($error,$key);
                }
            }
            if (empty($error)){
                modificar_cliente($input,$respuesta);
            }
            else{
                array_push($respuesta,false);
                echo json_encode($respuesta);
            }
        }
    }*/
    

    function listar_cliente(){
        require "../../src/Modelo.php";
        $base = new BBDD;
        $clientes= Usuario::listarClientes($base->conexion);
        $listclientes= array();
        foreach ($clientes as $funcion) {
            array_push($listclientes,$funcion);
        }
        echo json_encode($listclientes);
    }

    function datos_cliente($dniCliente){
        require "../../src/Modelo.php";
        $base = new BBDD();
        $usuario= new Usuario($dniCliente,"","","","","");
        echo json_encode($usuario->SacarDatos($base->conexion));
    }
    
    function añadir_cliente($datos,$respuesta){
        require "../../src/Modelo.php";
        $base = new BBDD();
        $password=password_hash($datos["pwd"], PASSWORD_DEFAULT);
        $usuario= new Usuario($datos["dniCliente"],$datos["nombre"],$datos["direccion"],$datos["email"],$password,0);
        
        $estado=$usuario->InsertCliente($base->conexion);
        if (!$estado) {
            array_push($respuesta,false);
            array_push($respuesta,2);
            echo json_encode($respuesta);
        }
        else{
            array_push($respuesta,true);
            echo json_encode($respuesta);
        }
    }
    
    function eliminar_cliente($dniCliente){
        $respuesta=array();
        require "../../src/Modelo.php";
        $base = new BBDD();
        $usuario= new Usuario($dniCliente,"","","","","");
        $usuario->deleteClient($base->conexion);
        array_push($respuesta,true);
        echo json_encode($respuesta);
    }

    function modificar_cliente($datos,$respuesta){
        require "../../src/Modelo.php";
        $base = new BBDD();
        $usuario= new Usuario($datos["dniCliente"],$datos["nombre"],$datos["direccion"],$datos["email"],"","");
        $usuario->updateClient($base->conexion);
        array_push($respuesta,true);
        echo json_encode($respuesta);
        //echo json_encode($usuario->SacarDatos($base->conexion));
    }
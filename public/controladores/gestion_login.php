<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");

    require "../../src/Modelo.php";
    require "utils.php";
    $bbdd = new BBDD;

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inputJSON = file_get_contents('php://input');
        $input= json_decode( $inputJSON, TRUE );
        $usuario= new Usuario($input['dni'],"","","","","");
        $usuario->getUsuario($bbdd->conexion);
        if ($usuario->pwd!=null) {
            if(password_verify($input["pwd"],$usuario->pwd)){
               if($usuario->admin==1){
                echo json_encode($usuario->nombre);
               }
               else{
                echo json_encode(false);
               }  
            }
            else{
                echo json_encode(false);
            }
        }
        else{
            echo json_encode(false);
        }
    }
?>
  <?php
    if(isset($_POST["Loguear"])){
        $datos=limpiardatos($_POST);
        require "../src/Modelo.php";
        $bbdd=new BBDD;
        $usuario = new Usuario($datos["DNI"],"","","","","");
        $usuario->getUsuario($bbdd->conexion);
        if ($usuario->pwd!=null) {
            if(password_verify($datos["Password"],$usuario->pwd)){
                setcookie("dniCliente",$usuario->dniCliente,time()+36000);
                setcookie("username",$usuario->nombre,time()+36000);
                if(isset($_COOKIE["idCarro"])){
                    $carro=new Carro($_COOKIE["idCarro"],"",$usuario->dniCliente,"","");
                    $carro->putCarroByUser($bbdd->conexion);
                }
                else{
                    $carro=new Carro("","",$usuario->dniCliente,"","");
                    $carro->getIdCarroBydniCliente($bbdd->conexion);
                    if($carro->idCarro!=null){
                        setcookie("idCarro",$carro->idCarro,time()+36000);
                    }
                }
            }
            else{
                require "./assets/msgCuenta.php";
            }
        }
    }
    else if($_GET["desconectar"]==true){
        setcookie("dniCliente","",time()-36000);
        setcookie("username","",time()-36000);
        setcookie("idCarro","",time()-36000);
        setcookie("totalCarro","",time()-36000);
    }
    header("location:index.php");
   

    function limpiardatos($post){
        $datos=array();
        foreach ($post as $key => $value){  
            if($key!="Enviar"){
                $datos[$key]=htmlentities($value);
            }
        }
        return $datos;
    }
?>
    
    
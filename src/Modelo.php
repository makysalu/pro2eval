<?php
    class BBDD{
        private $conexion;

        public function __construct(){
            if(!isset($this->conexion)){
                try{
                    $this->conexion=new PDO('mysql:host=localhost; dbname=virtualmarket', 'root', '');
                    $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e){
                    $error="Fallo al conectar con la BBDD "+$e->getMessage();
                    require "vistas/mensaje.php";
                    die();
                } 
            }
        }

        public function cerrarconexion(){
            $this->conexion=null;
        }

        public function __get($var){
            return $this->$var;
        }
    }

class Usuario{
    private $dniCliente;
    private $nombre;
    private $direccion;
    private $email;
    private $pwd;
    private $admin;
    
    function __construct($dniCliente,$nombre,$direccion,$email,$pwd,$admin){
        $this->dniCliente=$dniCliente;
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->email=$email;
        $this->pwd=$pwd;
        $this->admin=$admin;
    }

    public function __get($var){
        return $this->$var;
    }

    public function __set($var,$valor){
      $this->$var=$valor;
    }

    static function getAllUsuarios($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM clientes");
            $sql->execute();
           return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $ex){
            echo $ex;
        }  
    }

    public function ComprobarUsuario($conexion){
        $consulta="SELECT * FROM clientes WHERE dniCliente = "."'".$this->dniCliente."'";
        $resultado=$conexion->query($consulta);
        $row_cnt = $resultado->num_rows;
        if ($row_cnt==0){
            return false;
        }
        else{
            $cliente=$resultado->fetch_assoc();
            $this->dniCliente = $cliente["dniCliente"];
            $this->nombre = $cliente["nombre"];
            $this->direccion=$cliente["direccion"];
            $this->email=$cliente["email"];
            $this->pwd=$cliente["pwd"];
            $this->admin=$cliente["admin"];
        }
    }

    public function getUsuario($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM clientes where dniCliente=:dniCliente");
            $sql->bindValue(':dniCliente', $this->dniCliente);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex){
            echo $ex;
        }  
    }

    public function postUsuario($conexion){
        try{
            $sql = $conexion->prepare("INSERT INTO clientes (dniCliente,admin,nombre,direccion,email,pwd) VALUES (:dniCliente,:admin, :nombre, :direccion, :email, :pwd)");
            $sql->bindParam(':dniCliente',$this->dniCliente);
            $sql->bindParam(':admin',0);
            $sql->bindParam(':nombre',$this->nombre);
            $sql->bindParam(':direccion',$this->direccion);
            $sql->bindParam(':email',$this->email);
            $sql->bindParam(':pwd',$this->pwd);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }

    public function deleteUsuario($conexion){
        try{
            $sql = $conexion->prepare("DELETE FROM clientes WHERE dniCliente=:dniCliente");
            $sql->bindParam(':dniCliente',$this->dniCliente);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }

    public function putCliente($conexion){
        try{
            $sql = $conexion->prepare("UPDATE clientes  SET nombre=:nombre, direccion=:direccion, email=:email, pwd=:pwd WHERE dniCliente=:dniCliente");
            $sql->bindParam(':dniCliente',$this->dniCliente);
            $sql->bindParam(':nombre',$this->nombre);
            $sql->bindParam(':direccion',$this->direccion);
            $sql->bindParam(':email',$this->email);
            $sql->bindParam(':pwd',$this->pwd);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }
}

 class Producto{
     private $idProducto;
     private $nombre;
     private $foto;
     private $marca;
     private $categoria;
     private $unidades;
     private $precio;

     function __construct($idProducto,$nombre,$foto,$marca,$categoria,$unidades,$precio){
        $this->idProducto=$idProducto;
        $this->nombre=$nombre;
        $this->foto=$foto;
        $this->marca=$marca;
        $this->categoria=$categoria;
        $this->unidades=$unidades;
        $this->precio=$precio;
    }

    public function __get($var){
        return $this->$var;
    }

    public function __set($var,$valor){
      $this->$var=$valor;
    }

    static function getAllProductos($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM productos");
            $sql->execute();
           return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $ex){
            echo $ex;
        }  
    }

    public function postProducto($conexion){
        try{
            $sql = $conexion->prepare("INSERT INTO productos (nombre,foto,marca,categoria,unidades,precio) VALUES (:nombre, :foto, :marca, :categoria, :unidades, :precio)");
            $sql->bindParam(':nombre',$this->nombre);
            $sql->bindParam(':foto',$this->foto);
            $sql->bindParam(':marca',$this->marca);
            $sql->bindParam(':categoria',$this->categoria);
            $sql->bindParam(':unidades',$this->unidades);
            $sql->bindParam(':precio',$this->precio);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }

    public function getProducto($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM productos where idProducto=:idProducto");
            $sql->bindValue(':idProducto', $this->idProducto);
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_ASSOC);
                $this->nombre=$datos["nombre"];
                $this->foto=$datos["foto"];
                $this->marca=$datos["marca"];
                $this->categoria=$datos["categoria"];
                $this->precio=$datos["precio"];
        }
        catch(PDOException $ex){
            echo $ex;
        }  
    }

    public function deleteProducto($conexion){
        try{
            $sql = $conexion->prepare("DELETE FROM prodructos WHERE idProducto=:idProducto");
            $sql->bindParam(':idProducto',$this->idProducto);
            $sql->execute();
        }
        catch(PDOException $ex){
            echo $msg=$ex;
        }
    }

    public function updateproducto($conexion){
        $consulta="UPDATE productos SET nombre = "."'".$this->nombre."'".", foto="."'".$this->foto."'".", marca="."'".$this->marca."'".", categoria="."'".$this->categoria."'".", precio="."'".$this->precio."'"." WHERE idProducto=".$this->idProducto;
        $conexion->query($consulta);
    }
    public function putCliente($conexion){
        try{
            $sql = $conexion->prepare("UPDATE productos  SET nombre=:nombre, foto=:foto, marca=:marca, categoria=:categoria, unidades=:unidades, precio=precio WHERE idProducto=:idProducto");
            $sql->bindParam(':idProducto',$this->idProducto);
            $sql->bindParam(':nombre',$this->nombre);
            $sql->bindParam(':foto',$this->foto);
            $sql->bindParam(':marca',$this->marca);
            $sql->bindParam(':categoria',$this->categoria);
            $sql->bindParam(':unidades',$this->unidades);
            $sql->bindParam(':precio',$this->precio);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }

 }

 class Carrito{

    static function añadirLinea($idProducto,$nombre,$precio,$cantidad,$foto){
        $_SESSION["Carro"]["idProducto"][$_SESSION["total"]]=$_POST["idProducto"];
        $_SESSION["Carro"]["foto"][$_SESSION["total"]]=$_POST["foto"];
        $_SESSION["Carro"]["nombre"][$_SESSION["total"]]=$_POST["nombre"];
        $_SESSION["Carro"]["precio"][$_SESSION["total"]]=$_POST["precio"];
        $_SESSION["Carro"]["cantidad"][$_SESSION["total"]]=$_POST["cantidad"];
        $_SESSION["total"]=$_SESSION["total"]+1;
    }
    static function ActualizarCarro($cantidad){
       foreach ($cantidad as $key => $value) {
           if($value>0){
                $_SESSION["Carro"]["cantidad"][$key]=$value;  
           }
           else{
            unset($_SESSION["Carro"]["idProducto"][$key]);
            $_SESSION["Carro"]["idProducto"]=array_values($_SESSION["Carro"]["idProducto"]);
            unset($_SESSION["Carro"]["foto"][$key]);
            $_SESSION["Carro"]["foto"]=array_values($_SESSION["Carro"]["foto"]);
            unset($_SESSION["Carro"]["nombre"][$key]);
            $_SESSION["Carro"]["nombre"]=array_values($_SESSION["Carro"]["nombre"]);
            unset($_SESSION["Carro"]["precio"][$key]);
            $_SESSION["Carro"]["precio"]=array_values($_SESSION["Carro"]["precio"]);
            unset($_SESSION["Carro"]["cantidad"][$key]);
            $_SESSION["Carro"]["cantidad"]=array_values($_SESSION["Carro"]["cantidad"]);
            $_SESSION["total"]=$_SESSION["total"]-1;
           }
           
       }
    }
 }

 class Pedido{
     private $idPedido;
     private $fecha;
     private $dirEntrega;
     private $nTarjeta;
     private $fechaCaducidad;
     private $matriculaRepartidor;
     private $dniCliente;

     function __construct($idPedido,$fecha,$dirEntrega,$nTarjeta,$fechaCaducidad,$matriculaRepartidor,$dniCliente){
        $this->idPedido=$idPedido;
        $this->fecha=$fecha;
        $this->dirEntrega=$dirEntrega;
        $this->nTarjeta=$nTarjeta;
        $this->fechaCaducidad=$fechaCaducidad;
        $this->matriculaRepartidor=$matriculaRepartidor;
        $this->dniCliente=$dniCliente;
    }

     public function __get($var){
        return $this->$var;
    }

    public function __set($var,$valor){
      $this->$var=$valor;
    }

    static function getAllPedidos($conexion){
        $sql = $conexion->prepare("SELECT * FROM pedidos");
        $result=$sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarLineasPedidos($conexion){
        $consulta="SELECT * FROM lineaspedidos WHERE idPedido=".$this->idPedido;
       // var_dump($consulta);
        return $result=$conexion->query($consulta);
    }

    public function getAllLineasPedidos($conexion){
        $sql = $conexion->prepare("SELECT * FROM clientes");
        $result=$sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarPedido($conexion){
        $consulta="SELECT * FROM pedidos WHERE idPedido=".$this->idPedido;
        $resultado=$conexion->query($consulta);
        $pedido=$resultado->fetch_assoc();
        $this->fecha=$pedido["fecha"];
        $this->dirEntrega=$pedido["dirEntrega"];
        $this->nTarjeta=$pedido["nTarjeta"];
        $this->fechaCaducidad=$pedido["fechaCaducidad"];
        $this->matriculaRepartidor=$pedido["matriculaRepartidor"];
        $this->dniCliente=$pedido["dniCliente"];
    }
    
    public function altaPedido($conexion){
        $consulta="SELECT MAX(idPedido) AS idPedido FROM pedidos";
        $idPedido=$conexion->query($consulta);
        
        $idPedido=$idPedido->fetch_assoc();
        $newId=($idPedido["idPedido"]+1);
        $this->idPedido=$newId;

        $consulta="INSERT INTO pedidos (idPedido,fecha,dirEntrega,dniCliente) VALUES ("."'".$this->idPedido."'".","."'".$this->fecha."'".","."'".$this->dirEntrega."'".","."'".$this->dniCliente."'".")";
        $conexion->query($consulta);
    }

    public function altaLineaPedido($conexion){
         for ($cont=$_SESSION["total"]-1; $cont > 0 ; $cont--) { 
             $consulta="INSERT INTO lineaspedidos (idPedido,nlinea,idProducto,cantidad) VALUES ("."'".$this->idPedido."'".","."'".$cont."'".","."'".$_SESSION["Carro"]["idProducto"][$cont]."'".","."'".$_SESSION["Carro"]["cantidad"][$cont]."'".")";
             
             $conexion->query($consulta);
         }
    }

    static function añadirLineaPedido($conexion, $idPedido,$idProducto,$cantidad){
        $consulta="SELECT MAX(nlinea) AS nlinea FROM lineaspedidos WHERE idPedido=".$idPedido;
        $nlinea=$conexion->query($consulta);
        $nlinea=$nlinea->fetch_assoc();
        $newlinea=($nlinea["nlinea"]+1);
        $consulta="INSERT INTO lineaspedidos (idPedido,nlinea,idProducto,cantidad) VALUES ("."'".$idPedido."'".","."'".$newlinea."'".","."'".$idProducto."'".","."'".$cantidad."'".")";
        $conexion->query($consulta);
        return $newlinea;
   }

    public function eliminarLineaPedido($conexion, $nlinea){
        $consulta="DELETE FROM lineaspedidos WHERE idPedido ='".$this->idPedido."' && nlinea=$nlinea";
        $conexion->query($consulta);
    }

    public function deletePedido($conexion){
        $consulta="DELETE FROM lineaspedidos WHERE idPedido = "."'".$this->idPedido."'";
        $conexion->query($consulta);
        $consulta="DELETE FROM pedidos WHERE idPedido = "."'".$this->idPedido."'";
        $conexion->query($consulta);
    }

    public function updatepedido($conexion){
        $consulta="UPDATE pedidos SET dirEntrega = "."'".$this->dirEntrega."'".", dniCliente="."'".$this->dniCliente."'"." WHERE idPedido=".$this->idPedido;
        $conexion->query($consulta);
    }

 }
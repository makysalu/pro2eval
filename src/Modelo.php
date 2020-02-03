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

    public function getUsuario($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM clientes where dniCliente=:dniCliente");
            $sql->bindValue(':dniCliente', $this->dniCliente);
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_ASSOC);
            $this->nombre=$datos["nombre"];
            $this->direccion=$datos["dirreccion"];
            $this->email=$datos["email"];
            $this->pwd=$datos["pwd"];
            $this->admin=$datos["admin"];
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
     private $descripcion;
     private $foto;
     private $marca;
     private $categoria;
     private $unidades;
     private $precio;

     function __construct($idProducto,$nombre,$descripcion,$foto,$marca,$categoria,$unidades,$precio){
        $this->idProducto=$idProducto;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
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
            $sql = $conexion->prepare("INSERT INTO productos (nombre,descripcion,foto,marca,categoria,unidades,precio) VALUES (:nombre, :descripcion, :foto, :marca, :categoria, :unidades, :precio)");
            $sql->bindParam(':nombre',$this->nombre);
            $sql->bindParam(':descripcion',$this->descripcion);
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
                $this->descripcion=$datos["descripcion"];
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
            $sql = $conexion->prepare("UPDATE productos  SET nombre=:nombre, descripcion=:descripcion foto=:foto, marca=:marca, categoria=:categoria, unidades=:unidades, precio=precio WHERE idProducto=:idProducto");
            $sql->bindParam(':idProducto',$this->idProducto);
            $sql->bindParam(':descripcion', $this->descripcion);
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

 class Carro{
    private $lineaCarro;
    private $idCarro;
    private $dniCliente;
    private $idProducto;
    private $cantidad;

    function __construct($idCarro,$lineaCarro,$dniCliente,$idProducto,$cantidad){
        $this->idCarro=$idCarro;
        $this->lineaCarro=$lineaCarro;
        $this->dniCliente=$dniCliente;
        $this->idProducto=$idProducto;
        $this->cantidad=$cantidad;
    }

    static function getAllLinesOfCarro($conexion,$idCarro){
        try{
            $sql = $conexion->prepare("SELECT * FROM productos where idCarro=:idCarro");
            $sql->bindParam(':idCarro',$idCarro);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $ex){
            echo $ex;
        }  
    }

    static function maxIdCarro($conexion){
        try{
            $sql = $conexion->prepare("SELECT MAX(idCarro) from carro");
            $sql->execute();
            $max=$sql->fetch(PDO::FETCH_ASSOC);
            return $max;
        }
        catch(PDOException $ex){
            echo $ex;
        } 
    }

    public function postLineaCarro($conexion){
        try{
            $sql = $conexion->prepare("SELECT MAX(lineaCarro) AS idLinea FROM carro where idCarro=:idCarro");
            $sql->bindParam(':idCarro',$this->idCarro);
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_ASSOC);
            $newId=($datos["idLinea"]+1);
            $this->lineaCarro=$newId;
            
            $sql = $conexion->prepare("INSERT INTO carro (lineaCarro,idCarro,dniCliente,idProducto,cantidad) VALUES (:lineaCarro, :idCarro, :dniCliente, :idProducto, :cantidad)");
            $sql->bindParam(':lineaCarro',$this->lineaCarro);
            $sql->bindParam(':idCarro',$this->idCarro);
            $sql->bindParam(':dniCliente',$this->dniCliente);
            $sql->bindParam(':idProducto',$this->idProducto);
            $sql->bindParam(':cantidad',$this->cantidad);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }

    static function ActualizarCarro($cantidad){
       foreach ($cantidad as $key => $value) {
           if($value>0){
                $_COOKIE["Carro"]["cantidad"][$key]=$value;  
           }
           else{
            unset($_COOKIE["Carro"]["idProducto"][$key]);
            $_COOKIE["Carro"]["idProducto"]=array_values($_COOKIE["Carro"]["idProducto"]);
            unset($_COOKIE["Carro"]["foto"][$key]);
            $_COOKIE["Carro"]["foto"]=array_values($_COOKIE["Carro"]["foto"]);
            unset($_COOKIE["Carro"]["nombre"][$key]);
            $_COOKIE["Carro"]["nombre"]=array_values($_COOKIE["Carro"]["nombre"]);
            unset($_COOKIE["Carro"]["precio"][$key]);
            $_COOKIE["Carro"]["precio"]=array_values($_COOKIE["Carro"]["precio"]);
            unset($_COOKIE["Carro"]["cantidad"][$key]);
            $_COOKIE["Carro"]["cantidad"]=array_values($_COOKIE["Carro"]["cantidad"]);
            $_COOKIE["carro"]["total"]=$_COOKIE["carro"]["total"]-1;
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
        try{
            $sql = $conexion->prepare("SELECT * FROM pedidos");
            $sql->execute();
           return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $ex){
            echo $ex;
        }  
    }

    public function getAllLineasPedidos($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM lineaspedidos WHERE idPedido=:idPedido");
            $sql->bindParam(':idPedido',$this->idPedido);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $ex){
            echo $ex;
        } 
    }

    public function getPedido($conexion){
        try{
            $sql = $conexion->prepare("SELECT * FROM pedidos WHERE idPedido=:idPedido");
            $sql->bindValue(':idPedido', $this->idPedido);
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_ASSOC);
                $this->fecha=$datos["fecha"];
                $this->dirEntrega=$datos["direntrega"];
                $this->nTarjeta=$datos["nTarjeta"];
                $this->fechaCaducidad=$datos["fechaCaducidad"];
                $this->matriculaRepartidor=$datos["matriculaRepartidor"];
                $this->dniCliente=$datos["dniCliente"];
        }
        catch(PDOException $ex){
            echo $ex;
        } 
    }
    
    public function postPedido($conexion){
        try{
            $sql = $conexion->prepare("SELECT MAX(idPedido) AS idPedido FROM pedidos");
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_ASSOC);
            $newId=($datos["idPedido"]+1);
            $this->idPedido=$newId;

            $sql = $conexion->prepare("INSERT INTO productos (fecha,dirEntrega,nTarjeta,fechaCaducidad,matriculaRepartidor,dniCliente) VALUES (:fecha, :dirEntrega, :nTarjeta, :fechaCaducidad, :matriculaRepartidor, :dniCliente)");
            $sql->bindParam(':fecha',$this->fecha);
            $sql->bindParam(':dirEntrega', $this->dirEntrega);
            $sql->bindParam(':nTarjeta',$this->nTarjeta);
            $sql->bindParam(':fechaCaducidad',$this->fechaCaducidad);
            $sql->bindParam(':matriculaRepartidor',$this->matriculaRepartidor);
            $sql->bindParam(':dniCliente',$this->dniCliente);
            $sql->execute();
        }
        catch(PDOException $ex){
            echo $ex;
        } 
    }

    public function altaLineaPedido($conexion){
         for ($cont=$_COOKIE["carro"]["total"]-1; $cont > 0 ; $cont--) { 
             $consulta="INSERT INTO lineaspedidos (idPedido,nlinea,idProducto,cantidad) VALUES ("."'".$this->idPedido."'".","."'".$cont."'".","."'".$_COOKIE["Carro"]["idProducto"][$cont]."'".","."'".$_COOKIE["Carro"]["cantidad"][$cont]."'".")";
             
             $conexion->query($consulta);
         }
    }

    static function postLineaPedido($conexion,$idProducto,$cantidad){
        try{
            $sql = $conexion->prepare("SELECT MAX(nlinea) AS nlinea FROM lineaspedidos WHERE idPedido=:idPedido");
            $sql->bindParam(':idPedido', $this->idPedido);
            $sql->execute();
            $datos=$sql->fetch(PDO::FETCH_ASSOC);
            $newId=($datos["idPedido"]+1);
            $this->idPedido=$newId;
            
            $sql = $conexion->prepare("INSERT INTO lineaspedidos (idPedido,nlinea,idProducto,cantidad) VALUES (:idPedido, :nlinea, :idProducto, :cantidad)");
            $sql->bindParam(':idPedido', $this->idPedido);
            $sql->bindParam(':nlinea', $newId);
            $sql->bindParam(':idProducto', $idProducto);
            $sql->bindParam(':cantidad', $cantidad);
            $sql->execute();
        }
        catch(PDOException $ex){
            echo $ex;
        } 
   }

    public function deleteLineaPedido($conexion, $nlinea){
        try{
            $sql = $conexion->prepare("DELETE FROM lineaspedidos WHERE idPedido =:idPedido && nlinea=:nlinea");
            $sql->bindParam(':idProducto',$this->idPedido);
            $sql->bindParam(':idProducto',$nlinea);
            $sql->execute();
        }
        catch(PDOException $ex){
            echo $msg=$ex;
        }
    }

    public function deletePedido($conexion){
        try{
            $sql = $conexion->prepare("DELETE FROM lineaspedidos WHERE idPedido =:idPedido");
            $sql->bindParam(':idPedido',$this->idPedido);
            $sql->execute();
            $sql = $conexion->prepare("DELETE FROM pedidos WHERE idPedido =:idPedido");
            $sql->bindParam(':idPedido',$this->idPedido);
            $sql->execute();

        }
        catch(PDOException $ex){
            echo $msg=$ex;
        }
    }

    public function putPedido($conexion){
        try{
            $sql = $conexion->prepare("UPDATE pedidos  SET fecha=:fecha, dirEntrega=:dirEntrega, nTarjeta=:nTarjeta, fechaCaducidad=:fechaCaducidad, matriculaRepartidor=:matriculaRepartidor, dniCliente=:dniCliente WHERE idPedido=:idPedido");
            $sql->bindParam(':idPedido',$this->idPedido);
            $sql->bindParam(':fecha',$this->fecha);
            $sql->bindParam(':dirEntrega', $this->dirEntrega);
            $sql->bindParam(':nTarjeta',$this->nTarjeta);
            $sql->bindParam(':fechaCaducidad',$this->fechaCaducidad);
            $sql->bindParam(':matriculaRepartidor',$this->matriculaRepartidor);
            $sql->bindParam(':dniCliente',$this->dniCliente);
            $sql->execute();
        }
        catch(PDOException $ex){
            $msg=$ex;
        }
    }

 }
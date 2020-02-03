
    <?php 
        session_start();
        if(isset($_SESSION["dni"])){
            if(isset($_GET["idProducto"])){
                require "../src/Modelo.php";
                $base= new BBDD;
                $producto=new Producto($_GET["idProducto"],"","","","","","",""); 
                $producto->getProducto($base->conexion);
                if ($producto===false) {
                    $base->cerrarconexion();
                    header("location:principal.php");
                 }
                 else{
                    require "./assets/inicioHTML.php";
                    include "./assets/header.php";
                    include "./assets/detalles.php";
                    //include "./assets/admin/footer_admin.php";
                    require "./assets/cierreHTML.php";
                 }     
            }
            else{
                header("location:principal.php");
            }
        }
        else{
            header("location:validar.php");
        }
    ?>

    <?php 
        require "./assets/inicioHTML.php";
        include "./assets/header.php";
        require "../src/Modelo.php";
        $base = new BBDD;
        $productos=Producto::getAllProductos($base->conexion);
        include "./assets/productos.php";
        require "./assets/cierreHTML.php";
        
    ?>

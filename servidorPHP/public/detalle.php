
    <?php 
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
                $monedas=json_decode(conexion_api());
                require "./assets/inicioHTML.php";
                include "./assets/header.php";
                include "./assets/detalles.php";
                //include "./assets/admin/footer_admin.php";
                require "./assets/cierreHTML.php";
             }     
        }
        else{
            //header("location:principal.php");
        }

        function conexion_api(){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://currency-value.p.rapidapi.com/global/currency_rates",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "x-rapidapi-host: currency-value.p.rapidapi.com",
                    "x-rapidapi-key: 1b63c3e131msh77d1722b98dbdb0p122720jsne49d5ba3ca23"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                //echo "cURL Error #:" . $err;
            } else {
                return $response;
            }
        }
    ?>
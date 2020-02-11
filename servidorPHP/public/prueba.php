<! DOCTYPE html> <head> <meta name = "viewport" content = "initial-scale = 1.0, escalable por el usuario = no" /> <meta http-equiv = "content-type" content = "text / html; charset = UTF-8 " /> <title> Uso de MySQL y PHP con Google Maps </title> <style> / * Establezca siempre la altura del mapa explícitamente para definir el tamaño del        elemento div * que contiene el mapa. * / # mapa { altura : 100% ; } / * Opcional: hace que la página de muestra llene la ventana.
  
       
      
    
    
      

      
         
      
      
, cuerpo { altura : 100% ; margen : 0 ; relleno : 0 ; } </style> </head> <html> <body> <div id = "map" > </div> <script> var customLabel = {         restaurant : {           label : 'R' },         bar : {           label : ' B ' } };
         
         
         
      
    
  


  
     

    
       
 
 
        
 
 
        
      

         
        mapa = nuevo google . mapas . Map ( document . GetElementById ( 'map' ), {           center : new google . Maps . LatLng (- 33.863276 , 151.207977 ),           zoom : 12 }); var infoWindow = nuevo google . mapas . InfoWindow ; // Cambie esto dependiendo del nombre de su archivo PHP o XML           downloadUrl  
  
 
        
         

          
( 'https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml' , function ( data ) { var xml = data . responseXML ; var markers = xml . documentElement . getElementsByTagName ( 'marker' ); Array . prototype . forEach . call ( marcadores , función ( markerElem ) { var id = markerElem .  
            
            
              
              getAttribute ( 'id' ); nombre var = markerElem . getAttribute ( 'nombre' ); dirección var = markerElem . getAttribute ( 'dirección' ); var type = markerElem . getAttribute ( 'tipo' ); punto var = nuevo google . mapas . LatLng (                   parseFloat ( markerElem . GetAttribute (
              
              
              
               
'lat' )), 
                  parseFloat ( markerElem . getAttribute ( 'lng' ))); var infowincontent = documento . createElement ( 'div' ); var fuerte = documento . createElement ( 'fuerte' );               fuerte . textContent = nombre               infowincontent . appendChild ( fuerte );               infowincontent . appendChild (

              
              


documento . createElement ( 'br' )); var texto = documento . createElement ( 'texto' );               de texto . textContent = dirección               infowincontent . appendChild ( texto ); icono var = etiqueta personalizada [ tipo ] || {}; marcador var = nuevo google . mapas . Marcador ({                 mapa :

              


                
               
mapa , 
                posición : punto , 
                etiqueta : icono . etiqueta 
              }); 
              marcador . addListener ( 'click' , function () {                 infoWindow . setContent ( infowincontent );                 infoWindow . open ( mapa , marcador ); }); }); }); } función downloadUrl ( url , devolución de llamada  


              
            
          
        



      ) { var request = ventana . ActiveXObject ? nuevo ActiveXObject ( 'Microsoft.XMLHTTP' ) : nuevo XMLHttpRequest ;         solicitud . onreadystatechange = function () { if ( request . readyState == 4 ) {             request . onreadystatechange = no hacer nada ;             devolución de llamada ( solicitud , solicitud . 
         
              
             

  
             

status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
  </body>
</html>
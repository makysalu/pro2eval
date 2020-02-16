<?php 
    require "./assets/inicioHTML.php";
    require "./assets/header.php";
?>    
<section class="container p-0 pb-5">
    <header class="header-section text-center font-weight-bold display-md-4 text-white m-0 p-3 p-md-5 bg-secondary">Registrate</header>
    <form id="formulario" class="needs-validation m-5" novalidate action="../gestion-clientes/" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationDniCliente">Dni Cliente</label>
                    <input type="text" class="form-control" id="validationDniCliente" value="" name="dniCliente" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Porfavor Introduce un DNI
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationNombre">Nombre</label>
                    <input type="text" class="form-control" id="validationNombre" value="" name="nombre" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Porfavor Introduce un Nombre.
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 mb-3">
                    <label for="validationDireccion">Direccion</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="validationDireccion" value="" name="direccion" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Porfavor Introduce una Direccion.
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="validationEmail">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationEmail" value="" name="email" placeholder="dimoal01@gmail.com" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Porfavor Introduce tu Email.
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="validationPassword">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="validationPassword" value="" name="pwd" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Porfavor Introduce una Contraseña.
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="validationConfPassword">Confirma la contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="validationConfPassword" value=""
                            name="confPassword" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <div class="invalid-feedback">
                            Porfavor Repite la Contraseña.
                        </div>
                    </div>
                    <div class="form-check mb-3 mt-2">
                        <input class="form-check-input invalid" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                        Aceptas los Terminos y Condiciones
                        </label>
                        <div class="invalid-feedback">
                        Tienes que Haceptar los Terminos y Condiciones
                        </div>
                    </div>
                    <input type="hidden" name='admin' value='0'>
                </div>
                
            </div>
            <button type="submit" id='enviar' class="btn btn-primary mr-3" data-toggle="modal"
                data-target="#exampleModal">Enviar</button>
            <button type="button" class="btn btn-secondary">Cerrar</button>
        </form>
        <script>
            
            
            window.onload=()=>{
                document.getElementById("enviar").addEventListener("click",function (evento) {
                    evento.preventDefault();
                    validar();
                });        
            }
    
            function validar(){
                let errores=[];
                let dniCliente=document.getElementById("validationDniCliente").value;
                if((dniCliente==null)||(dniCliente.length==0)){
                    errores.push("dniCliente");
                    document.getElementById("validationDniCliente").className ="form-control is-invalid";
                }
                else{
                    document.getElementById("validationDniCliente").className ="form-control is-valid";
                }

                let nombre=document.getElementById("validationNombre").value;
                if((nombre==null)||(nombre.length==0)){
                    errores.push("nombre");
                    document.getElementById("validationNombre").className ="form-control is-invalid";
                }
                else{
                    document.getElementById("validationNombre").className ="form-control is-valid";
                }

                let direccion=document.getElementById("validationDireccion").value;
                if((direccion==null)||(direccion.length==0)){
                    errores.push("direccion");
                    document.getElementById("validationDireccion").className ="form-control is-invalid";
                }
                else{
                    document.getElementById("validationDireccion").className ="form-control is-valid";
                }

                let correo=document.getElementById("validationEmail").value;
                if(!(/\S+@\S+\.\S+/.test(correo))){
                errores.push("correo");
                document.getElementById("validationEmail").className ="form-control is-invalid";
                }
                else{
                    document.getElementById("validationEmail").className ="form-control is-valid";
                }

                let pwd=document.getElementById("validationPassword").value;
                if((pwd==null)||(pwd.length<4)){
                    errores.push("pwd");
                    document.getElementById("validationPassword").className ="form-control is-invalid";
                }
                else{
                    document.getElementById("validationPassword").className ="form-control is-valid";
                }

                let confpwd=document.getElementById("validationConfPassword").value;
                if((confpwd==null)||(confpwd.length<4)||(pwd!=confpwd)){
                    errores.push("confpwd");
                    document.getElementById("validationConfPassword").className ="form-control is-invalid";
                }
                else{
                    document.getElementById("validationConfPassword").className ="form-control is-valid";
                }

                let elemento=document.getElementById("invalidCheck");
                if(!elemento.checked){
                    errores.push("checked");
                    document.getElementById("invalidCheck").className ="form-check-input is-invalid";
                }
                else{
                    document.getElementById("invalidCheck").className ="form-check-input is-valid";
                }

                if(errores.length==0){
                    let formulario=document.getElementById("formulario");
                    formulario.submit();
                    
                

                }
                else{
                    for (const i in errores) {
                        console.log("Campo "+errores[i]+" vacio");
                    }
                }
            }
            </script>
</section>
<?php require "./assets/cierreHTML.php" ?>
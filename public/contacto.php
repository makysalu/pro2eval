<?php
    require "./assets/inicioHTML.php";
    require "./assets/header.php"
?>
<section class="container p-0 pb-5" >
    <header class="header-section text-center display-4 text-white m-0 mb-4 p-5 bg-secondary">Contactanos</header>
    <article class="row">
        <!--<h1 class="col-12 display-4 text-center pb-2 mb-4 border-bottom"></h1>-->
        <div class="col-6 pr-5 pl-5 pb-5 pt-3">
            <h3>Contacto</h3>
            <form class="needs-validation" novalidate>
                <div class="form-row">
                <div class="col-12">
                    <input type="text" class="form-control form-contacto" id="validationNombre" value="" placeholder="Nombre" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Porfavor Introduce tu Nombre
                    </div>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control form-contacto" id="validationApellidos" value="" placeholder="Apellidos" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                    <div class="invalid-feedback">
                    Porfavor Introduce tus Apellidos.
                    </div>
                </div>
                </div>
                <div class="form-row">
                <div class="col-12">
                    <div class="input-group">
                    <input type="text" class="form-control form-contacto" id="validationEmail" aria-describedby="inputGroupPrepend" placeholder="Correo" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <div class="invalid-feedback">
                        Porfavor Introduce tu Email.
                    </div>
                    </div>
                </div>
                </div>
                <div class="mb-3">
                <label for="validationComentario">Comentario</label>
                <textarea class="form-control form-contacto" id="validationComentario" placeholder="Required example textarea" required></textarea>
                <div class="valid-feedback">
                    Gracias por introducir un Comentario.
                </div>
                </div>
                <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                    Haceptas los Terminos y Condiciones
                    </label>
                    <div class="invalid-feedback">
                    Tienes que Haceptar los Terminos y Condiciones
                    </div>
                </div>
                </div>
                <button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Enviar</button>
            </form>
          
            <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                    }, false);
                });
                }, false);
            })();
            </script>
        </div>
        <div class="col-6 pr-5">
            <h3>Estamos</h3>
            <p>
                Av. Generalitat Valenciana Nº 4, Valencia, cd 23008 <br>

                TLF: 911-419-607<br>

                FAX: 915-991-908<br>

                Email: urbanshoot@hotmail.com<br>

                Web: urbanshoot.com<br>
            </p>
            <iframe width="80%" height="300px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCg950ZrrLnBrycvwuDMsg5n4siqJeYr0o&q=maximiliano%20thous,Valencia+Spain" allowfullscreen></iframe>
            </div>
    </article>
</section>
<?php
    require "./assets/cierreHTML.php";
?>
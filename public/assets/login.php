<div class="login">
    <header class="cabecera_login">
        Iniciar Sesion
    </header>
    <article class="formlogin">
        <form  id="formulariologin" action="validar.php" method="post" enctype="multipart/form-data">
            <label for="DNI"><strong>DNI: </strong></label><input type="text" name="DNI" id="DNI"><br><br>
            <label for="Password"><strong>Contraseña: </strong></label><input type="password" name="Password" id="Password"><br><br>       
            <div class="boton_login">
                <input type="submit" value="ENVIAR" name='Loguear'>  
            </div>
            <a href="../registro">Si no tienes cuenta registrate Aqui</a>
        </form>
    </article>
</div>
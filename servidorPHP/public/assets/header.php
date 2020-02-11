<header class="cabecera">
  <nav id="navbar-example2" class="navbar navbar-light bg-light pt-0 pb-0">
    <a class="navbar-brand" href="#"></a>
    <ul class="nav nav-pills">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">login</a>
        <form class="dropdown-menu p-4" action="validar.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="DNI">DNI:</label>
            <input type="text" class="form-control" name="DNI" id="DNI"paceholder="DNI">
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormPassword2">Password</label>
            <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="dropdownCheck2">
            <label class="form-check-label" for="dropdownCheck2">
              Recordar
            </label>
          </div>
          <button type="submit" class="btn btn-secondary mt-2" name="Loguear">Loguear</button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='validar.php?desconectar=true'><?php if(isset($_COOKIE["username"])){echo $_COOKIE["username"];} else{ echo "Usuario";} ?></a>
      </li>
    </ul>
  </nav>
</header>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Urban Shots</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Novedades</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categoria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.php">Contacto</a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item text-light">
        <ion-icon size="large" name="cart"></ion-icon>
        <?php 
            if(isset($totalCarro)){
              echo $totalCarro;
            }
            elseif(isset($_COOKIE["idCarro"])){
              echo $_COOKIE["totalCarro"];
            }
            else{
              echo 0;
            } 
        ?>
      </li>
    </ul>
  </div>
</nav>




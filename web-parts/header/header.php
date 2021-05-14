<!--
<header class="container-fluid unificado">
    <?php
/*    if (!isset($_SESSION["usuario"])) {
        $_SESSION["usuario"] = "";
    }
    $pagina="";
	if(isset($_GET['p'])){
    	$pagina=$_GET['p'];
	}
?>
<!--CORP MENU-->
    <nav class="navbar navbar-expand-sm navbar-light menu1centrado">
      <div class="navbar-collapse menu1" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href=""><i class="fa fa-linkedin-square" style="font-size:48px;color:gray"></i></a>
          </li>
          <li class="nav-item">
            <a href=""><i class="fa fa-facebook-square" style="font-size:48px;color:gray"></i></a>
          </li>
        </ul>
        <div id="logo">
          <a class="navbar-brand" href="#"><img
              src="https://protecnia.es/wp-content/uploads/2020/02/logo_protecnia.png"></a>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"><i class="fa fa-phone" style="font-size:36px;padding-right:5px;"></i><span><span>902 158
                  984</span><span>-</span><span>965 423 277</span></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">protecnia@protecnia.es</a>
          </li>
        </ul>
      </div>
    </nav>

    <!--Menu-->
    <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid d-flex justify-content-center align-items-center ">

                <button class="navbar-toggler btn btn-danger colorbotonmenu " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarNavDropdown" class="collapse navbar-collapse text-danger centrandomenu">
                    <ul class="navbar-nav centrandomenu">
                      <?php
                        if($_SESSION["usuario"] == ""){
                      ?>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=inicio" class="<?php if ($pagina=="inicio") {echo "current"; }?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=login" class="<?php if ($pagina=="login"||$pagina=="") {echo "current"; }?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=contacto" class="<?php if ($pagina=="contacto") {echo "current"; }?>">Contacto</a>
                        </li>
                      <?php  
                        }else if($_SESSION["usuario"]=="admin"){
                      ?>
                      	  <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=fichaupdate&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="fichaupdate") {echo "current"; }?>">Mi ficha</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=clientes" class="<?php if ($pagina=="clientes") {echo "current"; }?>">Clientes</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=creartrabajador" class="<?php if ($pagina=="creartrabajador") {echo "current"; }?>">Añadir nuevo Empleado</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=crearcliente" class="<?php if ($pagina=="crearcliente") {echo "current"; }?>">Añadir nuevo Cliente</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=cerrarsesion" class="<?php if ($pagina=="cerrarsesion") {echo "current"; }?>">Cerrar Sesion</a>
                          </li>
                         <?php 
                           }else if($_SESSION["usuario"]=="Trabajador"){
                          ?>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=fichaupdate&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="fichaupdate") {echo "current"; }?>">Mi ficha</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=clientes" class="<?php if ($pagina=="clientes") {echo "current"; }?>">Usuarios</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=crearcliente" class="<?php if ($pagina=="crearcliente") {echo "current"; }?>">Añadir nuevo Cliente</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=cerrarsesion" class="<?php if ($pagina=="cerrarsesion") {echo "current"; }?>">Cerrar Sesion</a>
                          </li>
                          <?php
                          }else{
                          ?>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=fichaupdate&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="fichaupdate") {echo "current"; }?>">Mi ficha</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=historicocliente&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="update") {echo "current"; }?>">Mi historico</a>
                          </li>
                          <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=contacto" class="<?php if ($pagina=="contacto") {echo "current"; }?>">Contacto</a>
                          <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=cerrarsesion" class="<?php if ($pagina=="cerrarsesion") {echo "current"; }?>">Cerrar Sesion</a>
                          </li>
                          <?php
                          }
                          ?>
                    </ul>
                </div>
            </div>
            <hr class="hrmenu">
        </nav>

<?php 
    if($_SESSION["usuario"] == ""){
?>

    <!--CARRUSEL-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <h1>"Hacemos las cosas bien, a la primera"</h1>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/slider1.jpg" class="d-blockimg-fluid  w-100"
            alt="empresacolaboradora">
          <h5>SORIO Y BORJA</h5>
        </div>
        <div class="carousel-item">
          <img src="img/slider2.jpg" class="d-block w-100" alt="empresacolaboradora">
          <h5>RIBERSA</h5>
        </div>
        <div class="carousel-item">
          <img src="img/slider3.jpg" class="d-block w-100" alt="empresacolaboradora">
          <h5>REPUESTOS SERCA</h5>
        </div>
      </div>
    </div>
<?php 
  }
?>
</header>-->*/

?>-->
<header class="container-fluid unificado">
    <?php
    if (!isset($_SESSION["usuario"])) {
        $_SESSION["usuario"] = "";
    }
    $pagina="";
  if(isset($_GET['p'])){
      $pagina=$_GET['p'];
  }
?>
<!--CORP MENU-->
    <nav class="navbar navbar-expand-sm navbar-light menu1centrado">
      <div class="navbar-collapse menu1" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href=""><i class="fa fa-linkedin-square" style="font-size:48px;color:gray"></i></a>
          </li>
          <li class="nav-item">
            <a href=""><i class="fa fa-facebook-square" style="font-size:48px;color:gray"></i></a>
          </li>
        </ul>
        <div id="logo">
          <a class="navbar-brand" href="#"><img
              src="https://protecnia.es/wp-content/uploads/2020/02/logo_protecnia.png"></a>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link"><i class="fa fa-phone" style="font-size:36px;padding-right:5px;"></i><span><span>902 158
                  984</span><span>-</span><span>965 423 277</span></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">protecnia@protecnia.es</a>
          </li>
        </ul>
      </div>
    </nav>

    <!--Menu-->
    <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid d-flex justify-content-center align-items-center ">

                <button class="navbar-toggler btn btn-danger colorbotonmenu " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarNavDropdown" class="collapse navbar-collapse text-danger centrandomenu">
                    <ul class="navbar-nav centrandomenu">
                      <?php
                        if($_SESSION["usuario"] == ""){
                      ?>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=inicio" class="<?php if ($pagina=="inicio") {echo "current"; }?>">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=login" class="<?php if ($pagina=="login"||$pagina=="") {echo "current"; }?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=contacto" class="<?php if ($pagina=="contacto") {echo "current"; }?>">Contacto</a>
                        </li>
                      <?php  
                        }else if($_SESSION["usuario"]=="admin"){
                      ?>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=clientes" class="<?php if ($pagina=="clientes") {echo "current"; }?>">Clientes</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=creartrabajador" class="<?php if ($pagina=="creartrabajador") {echo "current"; }?>">Añadir nuevo Empleado</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=crearcliente" class="<?php if ($pagina=="crearcliente") {echo "current"; }?>">Añadir nuevo Cliente</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=cerrarsesion" class="<?php if ($pagina=="cerrarsesion") {echo "current"; }?>">Cerrar Sesion</a>
                          </li>
                         <?php 
                           }else if($_SESSION["usuario"]=="trabajador"){
                          ?>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=fichaupdate&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="fichaupdate") {echo "current"; }?>">Mi ficha</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=clientes" class="<?php if ($pagina=="clientes") {echo "current"; }?>">Clientes</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=crearcliente" class="<?php if ($pagina=="crearcliente") {echo "current"; }?>">Añadir nuevo Cliente</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=cerrarsesion" class="<?php if ($pagina=="cerrarsesion") {echo "current"; }?>">Cerrar Sesion</a>
                          </li>
                          <?php
                          }else{
                          ?>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=fichaupdate&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="fichaupdate") {echo "current"; }?>">Mi ficha</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=historicocliente&id=<?php echo $_SESSION['id']?>" class="<?php if ($pagina=="update") {echo "current"; }?>">Mi historico</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link text-danger" href="<?php echo $_SERVER['PHP_SELF']?>?p=cerrarsesion" class="<?php if ($pagina=="cerrarsesion") {echo "current"; }?>">Cerrar Sesion</a>
                          </li>
                          <?php
                          }
                          ?>
                    </ul>
                </div>
            </div>
            <hr class="hrmenu">
        </nav>

<?php 
    if($_SESSION["usuario"] == ""){
?>

    <!--CARRUSEL-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <h1>"Hacemos las cosas bien, a la primera"</h1>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/slider1.jpg" class="d-blockimg-fluid  w-100"
            alt="empresacolaboradora">
          <h5>SORIO Y BORJA</h5>
        </div>
        <div class="carousel-item">
          <img src="img/slider2.jpg" class="d-block w-100" alt="empresacolaboradora">
          <h5>RIBERSA</h5>
        </div>
        <div class="carousel-item">
          <img src="img/slider3.jpg" class="d-block w-100" alt="empresacolaboradora">
          <h5>REPUESTOS SERCA</h5>
        </div>
      </div>
    </div>
<?php 
  }
?>
</header>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="librerias/bootstrap5/css/bootstrap.min.css">
  <script src="librerias/bootstrap5/js/bootstrap.bundle.min.js"></script>
  <!-- Se ha linkeado mal la libreria de momento trabajar con la online
  <link rel="stylesheet" href="librerias/font-awesome/font-awesome.min.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Mis archivos-->
  <link rel="stylesheet" href="estilos.css">
  <script src="librerias/jquery/jquery-3.3.1.min.js"></script>
  <script src="procesos/redirecionadministrativa.js"></script>
  <title>Home Login </title>
</head>

<body>
  <div id="color">
  <header>
    <nav class="navbar navbar-expand-sm navbar-light centrado">
      <div class="navbar-collapse menu" id="navbarNav">
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
  </header>
  <!-- Cambiar header por section-->
  <header>
    <!--CARRUSEL-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <h1>"Hacemos las cosas bien, a la primera"</h1>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://protecnia.es/wp-content/uploads/2020/02/sorio_y_borja.jpg" class="d-blockimg-fluid  w-100"
            alt="">
          <h5>SORIO Y BORJA</h5>
          <!--class='img-fluid '-->
        </div>
        <div class="carousel-item">
          <img src="https://protecnia.es/wp-content/uploads/2020/02/Ribersa.jpg" class="d-block w-100" alt="">
          <h5>RIBERSA</h5>
          <!--class='img-fluid '-->
        </div>
        <div class="carousel-item">
          <img src="https://protecnia.es/wp-content/uploads/2020/02/Repuestos-Serca.jpg" class="d-block w-100" alt="">
          <h5>REPUESTOS CERCA</h5>
          <!--class='img-fluid '-->
        </div>
      </div>
    </div>
  </header>
  <main class=".container-fluid">
    <section>
      <div class="wrapper">
                      <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
    </div>
        <div class="imagen">
          <img src="https://protecnia.es/wp-content/uploads/2020/02/logo_protecnia.png" class="centrado2">
        </div>
        <form action="" id="formLg">
          <div class="field">
            <input type="text" required name="usuariolg">
            <label>Usuario</label>
          </div>
          <div class="field">
            <input type="password" required name="passlg">
            <label>Contraseña</label>
          </div>
       <!--   <div class="alert alert-danger formularioincorrecto" role="alert">
    		<strong>El usuario y la contraseña no son validos.</strong>
		  </div>--->
          <div class="field">
            <input type="submit" value="Iniciar Sesion" class="botonlg">
          </div>
        </form>
      </div>
    </section>
  </main>
  </div>
  <footer class=".container-fluid bg-dark">Protecnia 2021</footer>

</body>

</html>
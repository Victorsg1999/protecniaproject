<?php
$usuario = new Usuario();
if (isset($_POST['registro'])) {
$usuariolg = htmlspecialchars(trim($_POST['usuariolg']));
$passlg = htmlspecialchars(trim($_POST['passlg']));
$resultado=$usuario->existeusuario($usuariolg,$passlg);
echo $resultado;
  if($resultado=="ok"){
    $tipo=$usuario->get_tipo();
    $tipo=strtolower($tipo);
    $_SESSION["usuario"] = strtolower($tipo);
    if($tipo=="admin"){
      header("Location:index.php?p=clientes");
    }else if($tipo=="cliente"){
      $id=$usuario->get_id();
      echo $id;
      header("Location:index.php?p=fichaupdate&id=".$id);
    }
  }else{
    echo $resultado;
  }
}
?>
    <section>
      <div class="wrapper">
      <div class="error">
      <span>Datos de ingreso no válidos, inténtelo de nuevo  por favor</span>
      </div>
        <div class="imagen">
          <img src="https://protecnia.es/wp-content/uploads/2020/02/logo_protecnia.png" class="formimagencentrada">
        </div>
        <form method="POST" id="formlogin">
          <div class="field">
            <input type="text" required name="usuariolg" id="usuariolg">
            <label>Usuario</label>
          </div>
          <div class="field">
            <input type="password" required name="passlg" id="passlg">
            <label>Contraseña</label>
          </div>

          <div class="field">
            <input type="submit" id="registro" name="registro" value="Iniciar Sesion" class="botonlg">
          </div>
        </form>
      </div>
    </section>
           <!--   <div class="alert alert-danger formularioincorrecto" role="alert">
        <strong>El usuario y la contraseña no son validos.</strong>
      </div>--->
<?php
$usuario = new Usuario();
if (isset($_POST['registro'])) {
$usuariolg = htmlspecialchars(trim($_POST['usuariolg']));
$passlg = htmlspecialchars(trim($_POST['passlg']));
$resultado=$usuario->existeusuario($usuariolg,$passlg);
	if($resultado=="ok"){
		$_SESSION["usuario"] = "admin";
		header("Location:index.php?p=admin");
	}else{
		echo $resultado;
	}
}
?>
  <section id="inicio">
    <article>
      <h4 class="historiaprocnia">HISTORIA PROTECNIA</h4>
      <p>
      Protecnia inició su actividad en 1979 y desde entonces su política se ha basado en ofrecer a sus clientes la máxima calidad en productos y servicios.</p>
      </p>
      <p>
      Los continuos controles de calidad que llevan a cabo sobre sus proveedores y sobre sus propios procesos de fabricación, les ha permitido convertirse en una empresa fuertemente competitiva capaz de ofrecer los mejores productos del mercado al mejor precio.</p>
      </p>
      <p>
      Protecnia cuenta con un equipo de profesionales altamente cualificados, que con la formación y motivación constante logran dar el mejor servicio de atención al cliente.
      </p>
      <p>
      <b>Luis Piñol</b> — Gerente
      </p>
    </article>
    <article>
      <img src="img/fefe.jpg" style="max-width: 100%;">
    </article>

  </section>
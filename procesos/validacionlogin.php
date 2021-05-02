<?php
require("../classe/usuario.php");
sleep(2);
$usuario = new Usuario();
$usuariolg = htmlspecialchars(trim($_POST['usuariolg']));
$passlg = htmlspecialchars(trim($_POST['passlg']));
$usuario->existeusuario($usuariolg,$passlg);
?>

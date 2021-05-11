<main class="container-fluid">
<?php

    if($pagina==""||$pagina=="inicio"){
        include("web-parts/main/main-parts/inicio.php");
    }

	if($pagina=="login"){
        include("web-parts/main/main-parts/formulariologin.php");
    }

    if($pagina=="contacto"){
        include("web-parts/main/main-parts/contacto.php");
    }

    if($pagina=="clientes"){
        include("web-parts/main/main-parts/cliente.php");
    }

    if($pagina=="crearcliente"){
        include("web-parts/main/main-parts/registrocliente.php");
    }

    if($pagina=="creartrabajador"){
        include("web-parts/main/main-parts/registrotrabajador.php");
    }

    if($pagina=="cerrarsesion"){
        include("web-parts/cerrarsesion/cerrar.php");
    }

    if($pagina=="fichaupdate"){
        include("web-parts/main/main-parts/fichaupdate.php");
    }

    if($pagina=="historicocliente"){
        include("web-parts/main/main-parts/historicocliente.php");
    }

    if($pagina=="updatehistorico"){
        include("web-parts/main/main-parts/updatehistorico.php");
    }
?>
</main>
<!--
<script src="librerias/js/propiedadesregistro.js"></script>
-->
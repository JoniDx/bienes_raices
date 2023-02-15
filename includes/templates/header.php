<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="/bienes_raices/build/css/app.css">
    <!-- <link rel="stylesheet" href="../../build/css/app.css"> -->
   
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php">
                    <img src="/bienes_raices/build/img/logo.svg" alt="Logo">
                </a>
                <div class="mobile-menu">
                    <img src="/bienes_raices/build/img/barras.svg" alt="icono">
                </div>
                <div class="derecha">
                    <img src="/bienes_raices/build/img/dark-mode.svg" alt="Boton dark" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienes_raices/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif ?>
                    </nav>
                </div>
            </div>
            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujos</h1>" : ''; ?>
        </div>
    </header>

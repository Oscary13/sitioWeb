<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../index.php");
}else {
    if ($_SESSION['usuario']=="ok") {
        $nombreUsuario=$_SESSION["nombreUsuario"];
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Ediciones</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../logo.ico">
    <link rel="stylesheet" href="././css/bootstrap.min.css">
    <link rel="stylesheet" href="././css/app.css">

    </head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST'] ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">BOUTIQUE MARU<span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar</a>
        </div>
    </nav>
    <div class="container">
        <br/>
        <div class="row ">
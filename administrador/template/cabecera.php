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
    <link rel="icon" href="../logo.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/app.css">
    
   </head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST'] ?>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <p class="oculto">------</p>
    <a class="navbar-brand" href="#">
      <img src="../img/logo.png" width="50" height="40" alt="">
    </a>
    <p>'</p>
    <a class="navbar-brand" href="">BOUTIQUE MARU</a>
    <button class="navbar-toggler navbar-right" type="button" data-toggle="collapse" data-target="#opciones">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- logo -->
    
    
    <!-- enlaces -->
    <div class="collapse navbar-collapse" id="opciones">   
      <ul class="navbar-nav">
        
        <li class="nav-item ">
        <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">inicio</a>
        </li>
        <li class="nav-item ">
        <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
        </li>
        <li class="nav-item ">
        <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar</a>
        </li>           
      </ul>
    </div>
  </nav>
    
    <div class="container">
        <br/>
        <div class="row ">
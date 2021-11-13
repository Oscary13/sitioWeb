<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:../index.php");
} else {
    if ($_SESSION['usuario'] == "ok") {
        $nombreUsuario = $_SESSION["nombreUsuario"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOUTIQUE MARU</title>
    <link rel="icon" href="../../logo.ico">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <p class="oculto">------</p>
    <a class="navbar-brand" href="#">
      <img src="img/logo.png" width="50" height="40" alt="">
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
      <a class="nav-item nav-link active" href="#">BOUTIQUE MARU<span class="sr-only">(current)</span></a>
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

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

    <div class="container">
        <br/>
        <div class="row">
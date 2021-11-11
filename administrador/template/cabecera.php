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
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php $url = "http://" . $_SERVER['HTTP_HOST'] . "/sitioweb" ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">BOUTIQUE MARU<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/inicio.php">inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>">Ver sitio web</a>
            <a class="nav-item nav-link" href="<?php echo $url; ?>/administrador/seccion/cerrar.php">Cerrar</a>
        </div>
    </nav>
    <div class="container">
        <br/>
        <div class="row ">
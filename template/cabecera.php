<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BOUTIQUE MARU</title>
  <link rel="icon" href="logo.ico">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/app.css">
  <link rel="stylesheet" href="./js/main.js">
  <style>
    .slider {
      width: 95%;
      margin: auto;
      overflow: hidden;
    }

    .ul {
      display: flex;
      padding: 0;
      width: 400%;

      animation: cambio 7s infinite alternate linear;
    }

    .li {
      width: 100%;
      list-style: none;
    }

    .img {
      width: 100%;
    }

    @keyframes cambio {
      0% {
        margin-left: 0;
      }

      20% {
        margin-left: 0;
      }

      25% {
        margin-left: -100%;
      }

      45% {
        margin-left: -100%;
      }

      50% {
        margin-left: -200%;
      }

      70% {
        margin-left: -200%;
      }

      75% {
        margin-left: -300%;
      }

      100% {
        margin-left: -300%;
      }
    }

    .submenu {
      position: absolute;
      background: #593196;
      display: none;
      z-index: 1;
    }
    .menu{
      position: absolute;
    }

    .submenu li a {
      display: block;
      padding: 15px;
      color: white;
      font-family: "Opens sans";
      text-decoration: none;
      list-style: none;
    }

    li:hover .submenu{
      display: block;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <p class="oculto">------</p>
    <a class="navbar-brand" href="#">
      <img src="img/logoo.png" width="100" alt="">
    </a>
    <p></p>
    <a class="navbar-brand" href="">BOUTIQUE MARU</a>
    <button class="navbar-toggler navbar-center div" type="button" data-toggle="collapse" data-target="#opciones">
      <span class="navbar-toggler-icon"> </span>
    </button>
    <p class="oculto">------</p>
    <!-- logo -->
    <!-- enlaces -->
    <div class="collapse navbar-collapse div" id="opciones">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link " href="index.php">Inicio</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="productos.php">Productos</a>
          <ul class="submenu nav-link">
            <li>
              <a href="productos.php">Pantalones</a>
            </li>
            <li>
              <a href="productos.php">Carteras</a>
            </li>
            <li>
              <a href="productos.php">Accesorios</a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="nosotros.php">Nosostros</a>
        </li>
        <li></li>
      </ul>


    </div>
    <div class="text-center">
      <p class="text-primary"><a href="./administrador/index.php"><img width="40" src="img/a.png" href="" class="img-fluid text-right" alt="Responsive image"></a>..........</p>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <div class="container">
    <br />
    <div class="row">
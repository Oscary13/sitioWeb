<?php
session_start();

if ($_POST) {
    if (($_POST['usuario'] == "OBB") && ($_POST['contrasenia'] == "sistema")) {
        $_SESSION['usuario'] = "ok";
        $_SESSION['nombreUsuario'] = "OBB";
        header('Location:inicio.php');
    } else {
        $mensaje = "Error: el usuario o contraseña son incorrectos";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>ADMINISTRADOR</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="icon" href="../logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/app.css">
    <!-- Bootstrap CSS -->
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <br><br><br>
                <div class="card border-dark">
                    <div class="card-header text-center fs-4 border-dark bg-primary text-white">
                        LOGIN DE ADMINISTRADOR
                    </div>

                    <div class="card-body">
                        <?php if(isset ($mensaje)){?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                        <?php }?>
                        <form  method="POST">

                            <div class="form-group">
                                <label class=" text-center fs-4" for="exampleInputEmail1">Usuario:</label>
                                <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Escribe tu usuario...">
                            </div>
                            <br>
                            <div class="form-group">
                                <label class=" text-center fs-4">Contraseña:</label>
                                <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña...">
                            </div>
                            <br>
                           <div class="div">
                           <button type="submit" class="btn btn-primary">Entrar al modo administrador</button>
                           <br><br>
                           <a class="fs-5" id="wrapper" href="../index.php">Volver ...</a>
                           </div>
                            
                            

                        </form>


                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
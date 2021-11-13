<?php

use Psy\ExecutionLoopClosure;

include("../template/cabecera.php"); ?>
<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtTalla = (isset($_POST['txtTalla'])) ? $_POST['txtTalla'] : "";
$txtColor = (isset($_POST['txtColor'])) ? $_POST['txtColor'] : "";
$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : "";
$txtN_prendas = (isset($_POST['txtN_prendas'])) ? $_POST['txtN_prendas'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
include("../config/bd.php");


switch ($accion) {
    case "Agregar":
        //INSERT INTO `productos` (`id`, `nombre`, `imagen`) VALUES ('1', 'Zapatos', 'imagen.jpg');
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre,talla,color,precio,n_prendas,imagen) VALUES ( :nombre,:talla,:color,:precio,:n_prendas, :imagen);");
        $sentenciaSQL->bindParam('nombre', $txtNombre);
        $sentenciaSQL->bindParam('talla', $txtTalla);
        $sentenciaSQL->bindParam('color', $txtColor);
        $sentenciaSQL->bindParam('precio', $txtPrecio);
        $sentenciaSQL->bindParam('n_prendas', $txtN_prendas);

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        header("Location: productos.php");
        break;
    case "Modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre, talla=:talla,color=:color,precio=:precio,n_prendas=:n_prendas  WHERE id =:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':talla', $txtTalla);
        $sentenciaSQL->bindParam(':color', $txtColor);
        $sentenciaSQL->bindParam(':precio', $txtPrecio);
        $sentenciaSQL->bindParam(':n_prendas', $txtN_prendas);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        if ($txtImagen != "") {
            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id =:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if (isset($productos["imagen"]) && ($productos["imagen"] != "imagen.jpg")) {
                if (file_exists("../../img/" . $productos["imagen"])) {
                    unlink("../../img/" . $productos["imagen"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id =:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            header("Location: productos.php");
            $sentenciaSQL->execute();
        }
        header("Location: productos.php");

        break;

    case "Cancelar":
        header("Location: productos.php");
        break;
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id =:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre = $productos['nombre'];
        $txtTalla = $productos['talla'];
        $txtColor = $productos['color'];
        $txtPrecio = $productos['precio'];
        $txtN_prendas = $productos['n_prendas'];
        $txtImagen = $productos['imagen'];
        break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id =:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $productos = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if (isset($productos["imagen"]) && ($productos["imagen"] != "imagen.jpg")) {
            if (file_exists("../../img/" . $productos["imagen"])) {
                unlink("../../img/" . $productos["imagen"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE id =:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        header("Location: productos.php");
        break;
}
$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">

    <div class="row">
        <div class="col-md-4">
            <div class="card border-dark">
                <div class="card-header bg-primary text-white fs-2 text-center"">
            DATOS DEL PRODUCTO
        </div>
        <div class=" card-body">
                    <form class="fs-5 text-dark" method="POST" enctype="multipart/form-data">

                        <div class="form-group ">
                            <label for="txtID">ID:</label>
                            <input required readonly type="text" class="form-control border-dark" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ingresa ID...">
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input required type="text" class="form-control border-dark" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="ingresa Nombre del producto...">
                            <br>

                        </div>
                        <div class="form-group">
                            <label for="txtTalla">Talla:</label>
                            <input required type="text" class="form-control border-dark" value="<?php echo $txtTalla; ?>" name="txtTalla" id="txtTalla" placeholder="ingresa Talla del producto...">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="txtColor">Color:</label>
                            <input required type="text" class="form-control border-dark" value="<?php echo $txtColor; ?>" name="txtColor" id="txtColor" placeholder="ingresa Color del producto...">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="txtPrecio">Precio:</label>
                            <input required type="number" class="form-control border-dark" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio" placeholder="ingresa Precio del producto...">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="txtPrendas">Numero de prendas existentes en la Boutique:</label>
                            <input required type="number" class="form-control border-dark" value="<?php echo $txtN_prendas; ?>" name="txtN_prendas" id="txtN_prendas" placeholder="ingresa N_prendas del producto...">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="txtImagen">Imagen:</label>
                            <label class="text-danger" for="txtImagen"><?php echo $txtImagen; ?></label>
                            <?php
                            if ($txtImagen != "") { ?>
                                <br>
                                <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen ?>" width="100" alt="">
                            <?php } ?>

                            <input type="file" class="form-control border-dark" name="txtImagen" id="txtImagen">
                            <br>
                            <div class="div" role="group" aria-label="">
                            <p></p>
                            <button type="submit" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-primary">Agregar</button>
                            <label class="oculto">--</label>
                            <button type="submit" name="accion" <?php echo ($accion == !"Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-primary"">Modificar</button> <label class=" oculto">--</label>
                                <button type="submit" name="accion" <?php echo ($accion == !"Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>

                        <div class="btn-group" role="group" aria-label="">
                            


                        </div>
                    </form>
                    
                </div>


            </div>

            <br> <br>


        </div>
        
        <div class="col-md-8">
            <table class="text-center">
                <thead class="text-center">
                    <tr>
                        <th class="bg-primary text-white text-center">ID:</th>
                        <th class="bg-primary text-white text-center">NOMBRE:</th>
                        <th class="bg-primary text-white text-center">TALLA:</th>
                        <th class="bg-primary text-white text-center">COLOR:</th>
                        <th class="bg-primary text-white text-center">PRECIO:</th>
                        <th class="bg-primary text-white text-center">NUM. PRENDAS EXIS:</th>
                        <th class="bg-primary text-white text-center">IMAGEN</th>
                        <th class="bg-primary text-white text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listaProductos as $producto) { ?>
                        <tr class="fs-5 text-center text-dark">
                            <td class="text-center text-dark"><?php echo $producto['id'] ?></td>
                            <td><?php echo $producto['nombre'] ?></td>
                            <td><?php echo $producto['talla'] ?></td>
                            <td><?php echo $producto['color'] ?></td>
                            <td>$ <?php echo $producto['precio'] ?></td>
                            <td><?php echo $producto['n_prendas'] ?></td>
                            <td>
                                <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['imagen'] ?>" width="100" alt="">
                            </td>
                            <td>
                                <form method="post" style="width:100%; height:100%">
                                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id'] ?>">
                                    <input type="submit" name="accion" value="Borrar" class="btn btn-danger btn-center">
                                    <br><br>
                                    <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include("../template/pie.php"); ?>
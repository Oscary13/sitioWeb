<?php include("template/cabecera.php"); ?>
<?php
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<?php foreach ($listaProductos as $productos) { ?>
    <br><br>
    <div class="col-md-3">
        <br>
        <div class="card border-dark">
            <img class="card-img-top" src="./img/<?php echo $productos['imagen'] ?>" alt="">
            <div class="card-body">
                <p>
                <h4 class="card-title text-center"><?php echo $productos['nombre'] ?></h4>
                </p>
                <p>Talla: <strong><?php echo $productos['talla'] ?></strong></p>
                <p>Color: <strong><?php echo $productos['color'] ?></strong></p>
                <p>Precio: <strong>$<?php echo $productos['precio'] ?></strong></p>
                <p>Numero de prendas existentes en la boutique: <strong><?php echo $productos['n_prendas'] ?></strong></p>
                <p></p>

            </div>
            
        </div>
    </div>
<?php }?>
<?php include("template/pie.php"); ?>
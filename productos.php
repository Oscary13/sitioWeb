<?php include("template/cabecera.php"); ?>
<?php 
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>


<?php foreach ($listaProductos as $productos) {?>
    <div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $productos['imagen']?>" alt="">
    <div class="card-body">
        <p><h4 class="card-title"><?php echo $productos['nombre']?></h4></p>
        <p>Talla: <?php echo $productos['talla']?></p>
        <p>Color: <?php echo $productos['color']?></p>
        <p>Precio: <?php echo $productos['precio']?></p>
        <p>Numero de prendas existentes en la boutique: <?php echo $productos['n_prendas']?></p>
        <p></p>
        
    </div>
</div>
</div>
<?php }?>
<?php include("template/pie.php"); ?>
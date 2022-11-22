<?php
//var_dump($_POST);
    if(!empty($_POST)) {
?>
            <p>
                <a href="<?php echo BASE_URL; ?>" class="btn btn-success"> Seguir navegando nuestros productos </a>
            </p>
<?php
    }
?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

    <?php
    if((isset($productos)) && (!empty($productos))) {
        foreach ($productos as $producto) {
    //     var_dump($productos);
        ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo BASE_URL;?>/public/uploads/<?= $producto->imagen; ?>"  class="card-img-top " alt="..." ;>
                    <div class="card-body">
                        <h5 class="card-title "><?php echo $producto->nombre; ?></h5>
                        <p class="card-text"><?php echo $producto->descripcion; ?></p>
                        <a href="<?php echo BASE_URL;?>/productos/detalle/<?php echo $producto->id; ?>" class="stretched-link">$<?php echo $producto->precio; ?></a>
                    </div>
                </div>

            </div>
        <?php
        }} else {
         ?>
    <p><h1><a href="<?php echo BASE_URL;?>/"> Volver al home </a></h1></p>
         <div class="badge bg-primary text-wrap" style="width: 45rem;">

             <h1>
                 &#x1F614;
             <?php
                echo "Sin productos para listar";
            }
                ?>
            </h1>
         </div>

</div>

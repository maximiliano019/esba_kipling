
<div class="row">
    <div class="col-6">
        <img src="<?php echo BASE_URL?>/public/uploads/<?= $producto->imagen; ?>" class=" card-img-top" alt="...">
    </div>

    <div class="col-6">
        <h1><?php echo $producto->nombre; ?></h1>
        <p><?php echo $producto->descripcion; ?></p>
        <h2>$<?php echo $producto->precio; ?></h2>
        <p>Stock disponible: <?php echo $producto->stock; ?></p>

        <?php if ($producto->stock > 0) { ?>
            <form action="<?php echo BASE_URL;?>/carrito/agregar" method="POST">
                <input type="number" name="cantidad" value="1"  max="<?php echo $producto->stock; ?>" min="0">
                <input type="hidden" name="id" value="<?php echo $producto->id ?>" >
                <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
            </form>

        <?php
            } else {
        ?>
            <H3> PRODUCTO SIN STOCK </H3>
        <?php
            }
        ?>
    </div>
</div>



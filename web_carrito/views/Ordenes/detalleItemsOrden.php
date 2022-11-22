<?php

//var_dump($_SESSION['Carrito'][0]->producto);
//var_dump(($_SESSION['Carrito'][0]->cantidad) * -1);
//var_dump($_SESSION['auth']);
//var_dump($_SESSION['Carrito']);
//var_dump($ordenes);
?>
<?php if(empty($ordenes)) { ?>
    <h2> Su detalles de compras esta vacio! </h2>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-success"> Seguir navegando nuestros productos </a>
<?php
    } else {
?>
    <h2> Sus detalles de la compra Nro. <?php echo $ordenes[0]['id_ordenCompra']; ?></h2>
<?php
    }
?>

<p>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th> </th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Cantidad unidades</th>
                    <th>$ Unidad sin IVA</th>
                    <th>IVA por unidad (21%)</th>
                    <th>$ x unidad con IVA</th>
                    <th>$ Total </th>
                </tr>
            </thead>

            <tbody>

                <?php
                if (isset($ordenes)) {
                    $precioTotalSinIVA = 0;
                    $precioTotalconIVA = 0;
                    $precioTotalsoloIVA = 0;
                    $precioSinIva = 0;
                    $precioConIVA = 0;
                    $TotalCantUnidades =0;
                    $iva= 0;
                    if (!empty($ordenes)) {
                        foreach ($ordenes as $key => $orden) {
//                            var_dump($ordenes);
                            $precioSinIva = $orden['precioIndividualProductoSinIVA'];
                            $iva= $precioSinIva * \Autoload::getImpuestoIVA();
                            $precioConIVA= $orden['precioIndividualProductoConIVA'];
                            $precioTotalSinIVA = $precioTotalSinIVA  + ($precioSinIva * $orden['cantidad_producto']);
                            $precioTotalsoloIVA = $precioTotalsoloIVA + ($iva * $orden['cantidad_producto']);
                            $precioTotalconIVA = $precioTotalconIVA + ($precioConIVA * $orden['cantidad_producto']);
                            $TotalCantUnidades = $TotalCantUnidades + $orden['cantidad_producto'];
                            $precioTotalconIVAxCantidad = $precioConIVA * $orden['cantidad_producto'];
                        ?>
                        <tr>
<!--                            <td>--><?php //echo $orden->producto->id;?><!--</td>-->
                            <td><img src="<?php echo BASE_URL?>/public/uploads/<?php echo $orden['imagen']; ?>" height="50" width="auto""></td>
                            <td><?php echo $orden['nombre']; ?></td>
                            <td><?php echo $orden['descripcion']; ?></td>
                            <td><?php echo $orden['cantidad_producto']; ?></td>
                            <td>$ <?php echo $precioSinIva; ?></td>
                            <td>$ <?php echo $iva; ?></td>
                            <td>$ <?php echo $precioConIVA; ?></td>
                            <td>$ <?php echo $precioTotalconIVAxCantidad ?></td>
                        </tr>


                    <?php
                    }}
                else {
                ?>

            </tbody>

        </table>
<br>
<div class="badge bg-primary text-wrap" style="width: 20rem;">
    <h1>        &#x1F614;    </h1>
        <?php
        echo "SIN COMPRAS";
        }}
        ?>


</div>
<br><br>
    <table>
        <tr>
            <td> # total de unidades :</td><td ></td> <td>  <?php echo $TotalCantUnidades; ?> </td>
        </tr>
        <tr>
            <td> $ total antes de aplicar IVA :</td><td ></td> <td> $ <?php echo $precioTotalSinIVA; ?> </td>
        </tr>
        <tr>
            <td> $ total de impuestos (IVA 21%) :</td><td ></td><td> $  <?php echo $precioTotalsoloIVA; ?> </td>
        </tr>
        <tr>
            <td> $ total luego de impuestos :</td><td ></td><td> $ <?php echo $precioTotalconIVA; ?> </td>
        </tr>
    </table>
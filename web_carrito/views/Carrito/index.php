<?php

//var_dump($_SESSION['Carrito'][0]->producto);
//var_dump(($_SESSION['Carrito'][0]->cantidad) * -1);
//var_dump($_SESSION['auth']);
//var_dump($_SESSION['Carrito']);
?>
<h2> Su carrito de Kipling! </h2>
<p>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-success"> Seguir navegando nuestros productos </a>
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
                    <th>acciones</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if (isset($productos)) {
                    $precioTotalSinIVA = 0;
                    $precioTotalconIVA = 0;
                    $precioTotalsoloIVA = 0;
                    $precioSinIva = 0;
                    $precioConIVA = 0;
                    $TotalCantUnidades =0;
                    $iva= 0;
                    if (!empty($productos)) {
                        foreach ($productos as $key => $producto) {
//                            var_dump($productos);
                            $precioSinIva = $producto->producto->precio;
                            $iva= $precioSinIva * 0.21;
                            $precioConIVA= $precioSinIva * 1.21;
                            $precioTotalSinIVA = $precioTotalSinIVA  + ($precioSinIva * $producto->cantidad);
                            $precioTotalsoloIVA = $precioTotalsoloIVA + ($iva * $producto->cantidad);
                            $precioTotalconIVA = $precioTotalconIVA + ($precioConIVA * $producto->cantidad);
                            $TotalCantUnidades = $TotalCantUnidades + $producto->cantidad;
                            $precioTotalconIVAxCantidad = $precioConIVA * $producto->cantidad;
                        ?>
                        <tr>
<!--                            <td>--><?php //echo $producto->producto->id;?><!--</td>-->
                            <td><img src="<?php echo BASE_URL?>/public/uploads/<?php echo $producto->producto->imagen; ?>" height="50" width="auto""></td>
                            <td><?php echo $producto->producto->nombre; ?></td>
                            <td><?php echo $producto->producto->descripcion; ?></td>
                            <td><?php echo $producto->cantidad; ?></td>
                            <td>$ <?php echo $precioSinIva; ?></td>
                            <td>$ <?php echo $iva; ?></td>
                            <td>$ <?php echo $precioConIVA; ?></td>
                            <td>$ <?php echo $precioTotalconIVAxCantidad ?></td>
                            <td>
                                <a href="./carrito/eliminar/<?php echo $key; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
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
        echo "sin productos";
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
<p>
<div>
<?php if (!empty($productos)) { ?>
    <a href="carrito/checkout" class="btn btn-primary">Finalizar Compra</a>
    <p>
    <tt>    Nota: Si ud aun no esta logueado, el sistema lo enviara a la pagina de login para loguearse.</tt>
    </p>
    <?php } ?>
</div>
</p>
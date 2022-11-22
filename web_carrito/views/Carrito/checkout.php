<?php
//var_dump($productos);
//var_dump($_POST);
?>
<link href="<?php echo BASE_URL;?>/public/css/checkout/styles.css" rel="stylesheet">

<h2 class="text-success"> Ya mas cerca de tener su compra en Kipling! </h2>
<h4 class="text-success"> Por favor ingrese los datos del envio y revise su compra </h4>

    <div class="row py-2" >
        <div class="column bordeTotales">
            <p><h3>Datos para el envio:</h3></p>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre de quien recibe el producto">
                </div>
                <div class="form-group py-2">
                    <label for="apellido">Apellido </label>
                    <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido de quien recibe el producto">
                </div>
                <div class="form-group py-2">
                    <label for="calle">Calle / Avenida </label>
                    <input type="text" name="calle" class="form-control" id="calle" placeholder="Nombre de calle o avenida">
                </div>
                <div class="form-group py-2">
                    <label for="numeroCalle">Altura de Calle</label>
                    <input type="number" name="numeroCalle" class="form-control" id="numeroCalle" placeholder="Altura de calle o avenida">
                    <label for="piso">Piso</label>
                    <input type="text" name="piso" class="form-control" id="piso" placeholder="Piso (De haberlo)">
                    <label for="departamento">Departamento</label>
                    <input type="text" name="departamento" class="form-control" id="departamento" placeholder="Departamento (De haberlo)">
                </div>
                <div class="form-group py-2">
                    <label for="provincia">Provincia</label>
                    <input type="text" name="provincia" class="form-control" id="provincia" placeholder="Ingrese la Provincia">
                </div>
                <div class="form-group py-2">
                    <label for="cp">Codigo Postal</label>
                    <input type="text" name="cp" class="form-control" id="cp" placeholder="Codigo Postal">
                </div>
                <div class="form-group py-2">
                    <label for="obs">Observaciones extras</label>
                    <input type="text" name="obs" class="form-control" id="obs" placeholder="Observaciones extras">
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary"> Finalizar compra</button>
                </div>
            </form>
        </div>
        <div class="column">
            <table class="tablaTotales" id="myTable">
                <thead>
                <tr>
                    <th>Cantidad Items  </th>
                    <th>Nombre producto  </th>
                    <th>$ Final (c/ IVA) </th>
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
                                <td><?php echo $producto->cantidad; ?></td>
                                <td><?php echo $producto->producto->nombre; ?></td>
                                <td>$ <?php echo $precioConIVA; ?></td>
                            </tr>
                            <?php
                        }}}
                    ?>
                </tbody>
            </table>
            <hr>
            <table class="tabla_totales ">
                <tr>
                    <td> # Total de unidades :</td> <td>  <?php echo $TotalCantUnidades; ?> </td>
                </tr>
                <tr>
                    <td> $ Total antes de aplicar IVA :</td> <td> $ <?php echo $precioTotalSinIVA; ?> </td>
                </tr>
                <tr>
                    <td> $ Total de impuestos (IVA 21%) :</td>
                    <td> $  <?php echo $precioTotalsoloIVA; ?> </td>
                </tr>
                <tr>
                    <td><b> $ Total con impuestos :</b></td>
                    <td><b> $ <?php echo $precioTotalconIVA; ?> </b></td>
                </tr>
            </table>
        </div>

    </div>
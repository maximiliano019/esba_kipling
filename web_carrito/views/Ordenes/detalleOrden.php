<?php
//var_dump($ordenes);
//var_dump($_SESSION['Carrito'][0]->producto);
//var_dump(($_SESSION['Carrito'][0]->cantidad) * -1);
//var_dump($_SESSION['auth']->admin_lvl);
//var_dump($_SESSION['Carrito']);
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>revisar</title>
    </head>
    <body>
        <div class="p-4 text-white bg-info ">
            <h2> |Sus compras de kipling! </h2>
        </div>
        <p></p>
            <table class="table" >
                <thead>
                    <tr>
                        <th>Id de Compra</th>
                        <th>Fecha y hora realizada</th>
                        <th>Estado</th>
                        <th> Nombre y Apelllido </th>
                        <th> Domicilio </th>
                        <th> Provincia </th>
                        <th> Codigo Postal </th>
                        <th># Cantidad Items </th>
                        <th>$ Total sin IVA  </th>
                        <th>$ Total con IVA  </th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($ordenes) || !empty($ordenes)) {
                            foreach ($ordenes as $key => $orden) {
        //                            var_dump($orden);
                            ?>
                            <tr>
                                <td><?php echo $orden['id_ordenCompra']; ?></td>
                                <td><?php echo $orden['insertTime_ordenCompra']; ?></td>
                                <td><?php echo $orden['detalle_estadoOrdenCompra']; ?></td>
                                <td><?php echo $orden['dir_nombre'] . " " . $orden['dir_apellido'] ; ?></td>
                                <td><?php echo $orden['dir_calle'] . " " . $orden['dir_numeroCalle'] . " | Piso: " . $orden['dir_piso'] . " | Dto: " . $orden['dir_departamento']; ?></td>
                                <td><?php echo $orden['dir_provincia']; ?></td>
                                <td><?php echo $orden['dir_codigopostal']; ?></td>
                                <td><?php echo $orden['sum_cantidad_producto']; ?></td>
                                <td><?php echo $orden['sum_precioIndividualProductoSinIVA']; ?></td>
                                <td><?php echo $orden['sum_precioIndividualProductoConIVA']; ?></td>
                                <td><a href="./ordenes/detalle/<?php echo $orden['id_ordenCompra']; ?>" class="btn btn-info">Detalle Compra</a></td>
                                <?php
                                    if (!isset($_SESSION)) session_start();
                                    if (($_SESSION['auth']->admin_lvl) > 9) {
                                ?>
                                <td><a href="./ordenes/detalleOrden/<?php echo $orden['id_ordenCompra']; ?>" class="btn btn-warning">Cambio Estado</a></td>
                                <?php
                                    }
                                ?>


                            </tr>
                        <?php
                        }
                    } else {
                    ?>
                </tbody>
            </table>
        <br>
        <div class="badge bg-primary text-wrap" style="width: 20rem;">
            <h1>        &#x1F614;    </h1>
                <?php
                echo "sin compras";
                }
                ?>
        </div>

    </body>

</html>
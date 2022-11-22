<?php
$ordenes = $params[0];
//var_dump($ordenes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title></title>
</head>
        <body>
<!--        <div class="container py-4">-->
        <h2> Detalle de ordenes de compra </h2>
        <br><br>
        <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>AVISO</th>
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
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($ordenes) || !empty($ordenes)) {
                            foreach ($ordenes as $key => $orden) {
        //                            var_dump($orden);
                            ?>
                            <tr>
                                <td><?php if($orden['cerrada_estadoOrdenCompra'] != '1') { ?>
                                        <span style="text-align: center; color: red" class="fa fa-exclamation-circle mr-5 " aria-hidden="true" > NO CERRADA </span>
                                    <?php }  ?></td>
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
                                    if (($_SESSION['auth']->admin_lvl) !=null && $params[1] !='user') {
                                ?>
                                <td><a href="../admin/ordenes/detalleEstado/<?php echo $orden['id_ordenCompra']; ?>" class="btn btn-warning">Cambio Estado</a></td>
                                    <?php
                                        }
                                    ?>
                            </tr>
                        <?php
                        }
               ?>
                </tbody>
            </table>
        <br>
        <?php       } else {
                    ?>
        <div class="badge bg-primary text-wrap" style="width: 20rem;">
            <h1>        &#x1F614;    </h1>
                <?php
                echo "sin compras";
                }
                ?>
        </div>
    </body>
</html>

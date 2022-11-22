<?php
//var_dump($ordenes);
//use Models\Orden;
//$estados = orden::getEstados();
$estados = (new \controllers\OrdenController())->listaEstados();
//var_dump($estados);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Editar estado de Orden</title>
</head>

<body>


    <div class="p-4 text-white bg-info ">
            <h1> Editar Estado de la orden Nr. <?php echo $ordenes['id_ordenCompra']; ?> </h1>
    </div>


<!--    <div class="container py-4">-->

        <form method="POST">

            <input type="text" name="id" class="form-control" id="id" placeholder="id" value="<?php echo $ordenes['id_ordenCompra']; ?>" hidden>

            <div class="form-group py-2">
                <label for="name">Estado Actual</label>
                <input type="text" disabled name="estadoAct" class="form-control" id="name" placeholder="estadoAct" value="<?php echo $ordenes['detalle_estadoOrdenCompra']; ?>">

            </div>
            <div class="form-group py-2">
                <label for="exampleInputEmail1">Nuevo estado</label>
                <select name="estadoOrden">
                    <?php
                    foreach  ($estados as $key => $estado) {
                        ?>
                        <option ID="nuevoestado"  value="<?php echo $estado["id_estadoOrdenCompra"]; ?>">
                            <?php echo $estado["id_estadoOrdenCompra"] ."-".  $estado["detalle_estadoOrdenCompra"];?>
                        </option>
                        <?php
                    }
                    ?>
                </select>

            <div class="py-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>

    </div>
</body>

</html>
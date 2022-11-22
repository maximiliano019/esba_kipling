<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>ADMIN | USUARIOS</title>
    </head>
    <body>
<!--        <div class="container py-4">-->
            <h2>Administracion de USUARIOS </h2>
            <br><br>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>ADM</th>
                        <th>USER ID</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>ACC | ELIMINAR </th>
                        <th>ACC | PASSWORD </th>
                        <th>ACC | ADMIN PROFILE </th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $SessionData = $_SESSION['auth'];
                    foreach ($usuarios as $usuario) {
                    ?>
                        <tr>
                            <td><?php if ($usuario->admin_lvl > 0) {echo 'X';} ?></td>
                            <td><?php echo $usuario->id; ?></td>
                            <td><?php echo $usuario->nombre; ?></td>
                            <td><?php echo $usuario->email; ?></td>

                            <td>
                                <a href="./usuarios/eliminar/<?php echo $usuario->id; ?>" class="btn btn-danger">Eliminar</a>
                            </td>
                            <td>
                                <?php
                                if ($SessionData->id !=  $usuario->id){
                                ?>
                                <a href="./usuarios/resetpassword/<?php echo $usuario->id; ?>" class="btn btn-primary">Reset </a>
                                <?php
                                }
                                    if ($SessionData->id ==  $usuario->id){
                                ?>
                                <a href="./usuarios/editar/<?php echo $usuario->id; ?>" class="btn btn-success">Cambiar </a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($usuario->admin_lvl == null) { ?>
                                <a href="./usuarios/becameAdmin/<?php echo $usuario->id; ?>" class="btn btn-warning">Otorgar </a>
                                <?php } else { ?>
                                <a href="./usuarios/deleteAdmin/<?php echo $usuario->id; ?>" class="btn btn-dark">Quitar  </a>
                                <?php }  ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </body>
</html>
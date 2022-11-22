<?php //var_dump($usuario); ?>
<!-- armo una variable para administar las opciones por persona -->
<?php
//$SessionData = $_SESSION['auth'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>ADMIN | Reset password Usuarios</title>
</head>

<body>
            <h1 class="alert-success"> ADMIN | Reset de password para el usuario <?php echo $usuario->nombre ?> </h1>

   <div class="container py-4">
       <form method="POST">

            <input type="text" name="id" class="form-control" id="id" placeholder="id" value="<?php echo $usuario->id; ?>" hidden>

            <div class="form-group py-2">
                <label for="name">Nombre</label>
                <input type="text" disabled name="nombre" class="form-control" id="name" placeholder="Nombre" value="<?php echo $usuario->nombre; ?>">

            </div>
            <div class="form-group py-2">
                <label for="email">email</label>
                <input type="email" disabled name="email" class="form-control" id="email" placeholder="email" value="<?php echo $usuario->email; ?>">
            </div>
            <div class="form-group py-2">
                <label for="password">password inicial (default: <?php echo Autoload::defaultpassword()?> )</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?php echo Autoload::defaultpassword()?> ">
            </div>
            <div class="py-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>
    </div>
</body>

</html>
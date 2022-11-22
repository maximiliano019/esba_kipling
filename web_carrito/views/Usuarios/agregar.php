<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Admin - agregar productos</title>
    </head>
    <body>
        <div class="p-4 text-white bg-info ">
            <h1> ADMIN | Agregar Usuario Nuevo </h1>
        </div>
        <div class="container py-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group py-2">
                    <label for="email">email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email">
                </div>
                <div class="form-group py-2">
                    <label for="password">password inicial (default: <?php echo Autoload::defaultpassword()?> )</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="" value="<?php echo Autoload::defaultpassword()?> ">
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

        </div>
    </body>
</html>
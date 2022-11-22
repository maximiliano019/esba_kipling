<?php //var_dump($usuario); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Bienvenido</title>
    </head>
    <body>
        <div class="container py-4">
            <P></P>
            <P></P>
            <h2> Bienvenid@ <?php echo $usuario->nombre?></h2>
            <P></P>
            <P></P>
Para continuar, por favor selecciona una opcion de tu panel izquierdo.
            <P></P>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Productos</title>
</head>

<body>


    <div class="p-4 text-white bg-info ">
            <h1> ADMIN | Editar Producto</h1>
    </div>


    <div class="container py-4">

        <form method="POST">

            <input type="text" name="id" class="form-control" id="id" placeholder="id" value="<?php echo $producto->id; ?>" hidden>

            <div class="form-group py-2">
                <label for="name">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="name" placeholder="Nombre" value="<?php echo $producto->nombre; ?>">

            </div>
            <div class="form-group py-2">
                <label for="exampleInputEmail1">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" value="<?php echo $producto->descripcion; ?>">
            </div>
            <div class="form-group py-2">
                <label for="precio">Precio</label>
                <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio" value="<?php echo $producto->precio; ?>">
            </div>
            <div class="form-group py-2">
                <label for="stock">stock</label>
                <input type="text" name="stock" class="form-control" id="stock" placeholder="stock" value="<?php echo $producto->stock; ?>">
            </div>
             <div class="form-group py-2">
                 <div class="card" style="width: 18rem;">
                    <img src="<?php echo BASE_URL?>/public/uploads/<?= $producto->imagen; ?>" class=" card-img-top" alt="...">
                 </div>
            </div>
            <div class="py-2">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>

    </div>
</body>

</html>
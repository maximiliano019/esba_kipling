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
            <h1> ADMIN | Agregar Producto</h1>
        </div>
        <div class="container py-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group py-2">
                    <label for="imagen" class="control-label">Imagen</label>
                    <input class="form-control" name="imagen" id="imagen" type="file" required>
                </div>
                <div class="form-group py-2">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
                </div>
                <div class="form-group py-2">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
                </div>
                <div class="form-group py-2">
                    <label for="precio">Precio</label>
                    <input type="text" name="precio" class="form-control" id="precio" placeholder="Precio">
                </div>
                <div class="form-group py-2">
                    <label for="stock">stock</label>
                    <input type="text" name="stock" class="form-control" id="stock" placeholder="stock">
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </body>
</html>
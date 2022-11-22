<?php

namespace Views;


class layout_adm
{

public function __construct()
{
?>
<!-- Content-->
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="<?php echo BASE_URL;?>/public/css/style.css">
            <title>Panel de Administracion </title>
      <body>
            <div class="wrapper d-flex align-items-stretch">
                <nav id="sidebar">
                    <div class="custom-menu">
                        <button type="button" id="sidebarCollapse" class="btn btn-primary">
                            <i class="fa fa-bars"></i>
                             <span class="sr-only">Toggle Menu</span>
                        </button>
                    </div>
                    <div class="p-4">
                        <h1><a class="alogo" href="<?php echo BASE_URL; ?>"> <img src="<?php echo BASE_URL; ?>/public/imgs/logo.png" width="75" height="75"> </a> </h1>
	                    <ul class="list-unstyled components mb-5">
                            <li>
                                <span class="fa fa-user mr-3"></span> <?php echo $_SESSION['auth']->nombre; ?>                     </span>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL; ?>/userdetails"><span class="fa fa-plug mr-3"></span>Panel Usuario</a>
                            </li>
                            <li class="active">
                                <a href="<?php echo BASE_URL; ?>/admin/productos"><span class="fa fa-barcode mr-3"></span>lista de Productos</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL; ?>/admin/usuarios"><span class="fa fa-users mr-3"></span>Lista de Usuarios</a>
                            </li>
                            <li >
                                <a href="<?php echo BASE_URL; ?>/admin/listadecompras"><span class="fa fa-shopping-cart mr-3"></span>Lista Todas las Compras</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL; ?>/admin/productos/agregar"><span class="fa fa-plus mr-3"></span>Agregar Producto Nuevo</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL; ?>/admin/usuarios/agregar"><span class="fa fa-user-plus mr-3"></span>Agregar Usuario Nuevo</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL; ?>/logout"> <span class="fa fa-sign-out mr-3"></span>LOG OFF</a>
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL; ?>"><span class="fa fa-home mr-3"></span>Salir del panel</a>
                            </li>
            	        </ul>
                    </div>
                </nav>

            <!-- Page Content  -->

            <div id="content" class="p-4 p-md-5 pt-5">
            <?php
        }

    public function __destruct()
    {
    ?>

        </div>
        </div>
        <footer class="bg-light text-center">

            <!-- Copyright -->
            <div class="text-center p-3 bg-">
                kipling 2022 - Todos los derechos registrados
            </div>
            <!-- Copyright -->
        </footer>

  </body>
</html>
<?php
        }
    }

?>
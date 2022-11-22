<?php

namespace Views;


class Layout
{

    public function __construct()
    {
?>
        <!-- Content-->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link href="<?php echo BASE_URL;?>/public/styles.css" rel="stylesheet">
            <title>kipling WEB</title>
        <body>
            <div class="p-2 text-uppercase bg-success logotext">
                    <div class="container">
                        <span>
                            <?php (new \controllers\CarritoController)->boton();        ?>
                            <?php (new \controllers\UsuariosController)->boton();       ?>
<!--                            --><?php //(new \controllers\UsuariosController)->boton_admin(); ?>
                        <h1>
                            <a class="alogo" href="<?php echo BASE_URL; ?>"> <img src="<?php echo BASE_URL; ?>/public/imgs/logo.png" width="75" height="75">  kipling </a> </h1>
                        </span>
                    </div>
                </div>
            <div class="container py-4">
            <?php
        }

        public function __destruct()
        {
            ?>

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
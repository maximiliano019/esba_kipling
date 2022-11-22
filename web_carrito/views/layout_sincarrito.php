<?php

namespace Views;


class layout_sincarrito
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link href="<?php echo BASE_URL;?>/public/styles.css" rel="stylesheet">
            <title>kipling WEB</title>
        </head>
        <body>
            <div class="p-2 text-uppercase bg-success logotext">
                    <div class="container">
                        <span>
                            <h1><a class="alogo" href="<?php echo BASE_URL; ?>"> <img src="<?php echo BASE_URL; ?>/public/imgs/logo.png" width="75" height="75">  kipling </a> </h1>
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
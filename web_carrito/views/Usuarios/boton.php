<?php

if (!isset($usuario)) {

?>
    <a title="Home" href="../index.html" class="btn btn-primary position-relative float-end">
        <span class="fa fa-pen">Inicio </span>
    </a>

    <a title="LogIn" href="<?php echo BASE_URL; ?>/login" class="btn btn-primary position-relative float-end">
        <span class="fa fa-pen">Login </span>
    </a>
<?php
} else {
?>


    <a title="Acceder al Panel de usuario" href="<?php echo BASE_URL; ?>/userdetails" class="btn btn-primary position-relative float-end">
        <span class="fa fa-gear">  | <?= $usuario->nombre; ?> | </span>
    </a>
    <?php
}
?>


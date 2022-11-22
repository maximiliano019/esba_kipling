<?php
//var_dump($ordenDB['id_ordenCompra']);
//var_dump($ordenDB);
?>
<link href="<?php echo BASE_URL;?>/public/css/checkout/styles.css" rel="stylesheet">

<?php if (isset($ordenDB) && !empty($ordenDB)) { ?>
<h2 class="text-success"> Ya mas cerca de tener su compra en Kipling! </h2>
<h4 class="text-success"> SU COMPRA HA SIDO REGISTRADA CON EXITO BAJO EL NR. <?php echo $ordenDB['id_ordenCompra']; ?> </h4>
    <div class="row py-2" >
        <p><h3>Datos grabados en la compra:</h3></p>
        <table class="column tablaResumen">
            <tr><td><hr></td><td><hr></td></tr>
            <tr><td> USUARIO: </td><td> <?php echo $ordenDB['id_usuariosEmail']; ?> </td></tr>
            <tr><td><hr></td><td><hr></td></tr>
            <tr><td> NR. ORDEN: </td><td> <?php echo $ordenDB['id_ordenCompra']; ?> </td></tr>
            <tr><td> ESTADO: </td><td> <?php echo $ordenDB['detalle_estadoOrdenCompra']; ?></td></tr>
            <tr><td><hr></td><td><hr></td></tr>
            <tr><td> Domicilio entrega: </td><td> <?php echo $ordenDB['dir_calle']?> ,  <?php $ordenDB['dir_numeroCalle']; ?> </td></tr>
            <tr><td> </td><td> Piso <?php echo $ordenDB['dir_piso']; ?> Depto.  <?php echo $ordenDB['dir_departamento']?>    </td></tr>
            <tr><td> </td><td> <?php echo $ordenDB['dir_provincia']; ?> </td></tr>
            <tr><td> </td><td>CP:  <?php echo $ordenDB['dir_codigopostal']; ?> </td></tr>
            <tr><td> Observaciones : </td><td>  <?php echo $ordenDB['dir_observaciones']; ?> </td></tr>
            <tr><td><hr></td><td><hr></td></tr>
        </table>
    </div>

<?php } else { ?>
<h2 class="text-success"> Gracias por confiar en Kipling! </h2>
<h4 class="text-success"> SU COMPRA NO HA PODIDO SER  REGISTRADA CON EXITO. POR FAVOR VUELVA A INTENTAR </h4>
<?php } ?>

<a class="btn btn-primary" href="<?php echo BASE_URL; ?>" alt="Volver a nuestra pagina principal"> HOME </a>
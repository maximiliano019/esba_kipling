<table><tr>
        <td></td>
        <td><?php
                (new \controllers\SearchBarController())->barraBusqueda();
            ?>
        </td>
        <td></td>
    </tr>
</table>
<?php
(new controllers\ProductosController)->grilla();
?>
</div>
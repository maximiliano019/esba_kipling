<?php

namespace Models;

class Orden
{

    public static $ordenes = [];

    public static function queryGetOrdenesBy($filter4query): string
    {

        $query4ordenes = 'SELECT a.* ,b.detalle_estadoOrdenCompra ,b.cerrada_estadoOrdenCompra
        ,sum(c.cantidad_producto) 				as sum_cantidad_producto
        ,sum(c.precioIndividualProductoSinIVA * c.cantidad_producto) as sum_precioIndividualProductoSinIVA
        ,sum(c.precioIndividualProductoConIVA * c.cantidad_producto) as sum_precioIndividualProductoConIVA
        FROM ordencompra 				as a
        left join estadoordencompra 	as b 	on a.id_estadoOrdenCompra 	= b.id_estadoOrdenCompra
        left join detalleitemscompra 	as c	on a.id_ordenCompra 		= c.id_ordenCompra
        where ' . $filter4query . ' group by a.id_ordenCompra';
        return $query4ordenes;
    }

    public static function queryInsertOrdenNueva($ordenHash): string
    {
        /* solo envio el hash, el resto proviene de la sesion (post y Session) */
        if (isset($_SESSION['auth']) && !empty($_POST)) {
            try {
                $db = \Db::getConnect();
                $insert = $db->prepare('INSERT INTO ordencompra 
                           ( hash_ordenCompra, id_usuariosEmail, dir_nombre, dir_apellido, dir_calle, dir_numeroCalle, dir_piso, dir_departamento, dir_provincia, dir_codigopostal, dir_observaciones)
                    VALUES (:hash_ordenCompra,:id_usuariosEmail,:dir_nombre,:dir_apellido,:dir_calle,:dir_numeroCalle,:dir_piso,:dir_departamento,:dir_provincia,:dir_codigopostal,:dir_observaciones)');
                $insert->bindValue('hash_ordenCompra', $ordenHash);
                $insert->bindValue('id_usuariosEmail', $_SESSION['auth']->email);
                $insert->bindValue('dir_nombre', $_POST['nombre']);
                $insert->bindValue('dir_apellido', $_POST['apellido']);
                $insert->bindValue('dir_calle', $_POST['calle']);
                $insert->bindValue('dir_numeroCalle', $_POST['numeroCalle']);
                $insert->bindValue('dir_piso', $_POST['piso']);
                $insert->bindValue('dir_departamento', $_POST['departamento']);
                $insert->bindValue('dir_provincia', $_POST['provincia']);
                $insert->bindValue('dir_codigopostal', $_POST['cp']);
                $insert->bindValue('dir_observaciones', $_POST['obs']);
                $insert->execute();
                $mensaje = "Insert orden ok.";
            } catch (PDOException $e) {
                //error
                $mensaje = "Your fail message: " . $e->getMessage();
            }
        } else {
            $mensaje = "Your fail message: no hay Session y/o POST";
        }
        return $mensaje;
    }

    public static function queryInsertOrdenNuevaDetalleItems($ordenID, $producto): string
    {
        if (!empty($producto)) {
            try {
                $db = \Db::getConnect();
                $insert = $db->prepare('INSERT INTO detalleitemscompra
                            (id_detalleItemsCompra, id_ordenCompra, id_producto, cantidad_producto, precioIndividualProductoSinIVA, precioIndividualProductoConIVA)
                    VALUES (:id_detalleItemsCompra,:id_ordenCompra,:id_producto,:cantidad_producto,:precioIndividualProductoSinIVA,:precioIndividualProductoConIVA)');
                $insert->bindValue('id_detalleItemsCompra', null);
                $insert->bindValue('id_ordenCompra', $ordenID);
                $insert->bindValue('id_producto', ($producto->producto->id));
                $insert->bindValue('cantidad_producto', $producto->cantidad);
                $insert->bindValue('precioIndividualProductoSinIVA', $producto->producto->precio);
                $insert->bindValue('precioIndividualProductoConIVA', (($producto->producto->precio) * (\Autoload::getImpuestoIVA() +1)));
                $insert->execute();
                //success
                $mensaje = "Insert detalle ok.";
            } catch (PDOException $e) {
                //error
                $mensaje = "Your fail message: " . $e->getMessage();
            }
        } else {
            $mensaje = "Your fail message: no hay Session y/o POST";
        }
        return $mensaje;
    }

    public static function getOrdenByHash($compraHash)
    {
        $db = \Db::getConnect();
        $select = $db->prepare('SELECT * FROM ordencompra where hash_ordenCompra = :hash_ordenCompra');
        $select->bindValue('hash_ordenCompra', "$compraHash");
        $select->execute();
        $ordenDB = $select->fetch();
        return $ordenDB;
    }

    public static function getOrdenes()
    {
        $db = \Db::getConnect();
        $filter4query = '1 = 1';
        $select = $db->prepare(orden::queryGetOrdenesBy($filter4query));
        $select->execute();
        $ordenes = $select->fetchAll();
        return $ordenes;
    }

    public static function getEstados()
    {
        $db = \Db::getConnect();
        $select = $db->prepare('SELECT * FROM estadoordencompra');
        $select->execute();
        $estados = $select->fetchAll();
        return $estados;
    }
    public static function setEstados($id_ordenCompra, $id_estadoOrdenCompra)    {
            var_dump($id_estadoOrdenCompra . "||" . $id_ordenCompra);
            $db = \Db::getConnect();
            $select = $db->prepare('UPDATE ordencompra SET id_estadoOrdenCompra = :id_estadoOrdenCompra WHERE id_ordenCompra = :id_ordenCompra');
            $select->bindValue('id_ordenCompra', $id_ordenCompra);
            $select->bindValue('id_estadoOrdenCompra', $id_estadoOrdenCompra);
            $select->execute();
    }

    public static function getOrdenById($ordenID)
    {
        $db = \Db::getConnect();
        $filter4query = 'a.id_ordenCompra = :id_ordenCompra';
        $select = $db->prepare(orden::queryGetOrdenesBy($filter4query));
        $select->bindValue('id_ordenCompra', $ordenID);
        $select->execute();
        $ordenes = $select->fetch();
        return $ordenes;
    }

    public static function getOrdenesByUser($userEmail)
    {
        $db = \Db::getConnect();
        $filter4query = 'a.id_usuariosEmail = :id_usuariosEmail';
        $select = $db->prepare(orden::queryGetOrdenesBy($filter4query));
        $select->bindValue('id_usuariosEmail', $userEmail);
        $select->execute();
        $ordenes = $select->fetchAll();
        return $ordenes;
    }

    public static function saveToDB() {
        if (!isset($_SESSION)) {
            session_start();
        } else {
            if (isset($_SESSION['Carrito']) && isset($_SESSION['auth'])) {
                $ordenHash = \Autoload::createhash();
//                    echo "el hash es  -> " . $ordenHash;
                $mensaje = orden::queryInsertOrdenNueva($ordenHash);
//                    echo "insert orden -> " . $mensaje;
/* busco por hash para evitar superposicion de inserts */
                $ordenID = orden::getOrdenByHash($ordenHash)['id_ordenCompra'];
//                    echo "El id de la orden -> " . $ordenID;
//var_dump($_SESSION['Carrito']);
/* vuelco los items del carrito a la DB */
                $productos = $_SESSION['Carrito'];
                foreach ($productos as $producto) {
                    $mensaje = orden::queryInsertOrdenNuevaDetalleItems($ordenID, $producto);
//                    echo "El insert de detalle -> " . $producto->producto->nombre . " es " . $mensaje;
                }
/* vacio el carrito sin afectar el stock */
                if (!isset($_SESSION)) session_start();
                if (isset($_SESSION) && !empty($ordenID)) {
                        unset($_SESSION["Carrito"]);
                    }else {
//                        echo 'NO SE VACIO CARRITO';
                    }
                    /* me traigo el detalle completo de la orden */
                    $ordenes = orden::getOrdenById($ordenID);
                    return $ordenes;
            } else {
//                echo 'NO corrio el insert';
            }
        }
    }

    public static function getDetallesByOrden($ordenID)
    {
        $db = \Db::getConnect();
        $select = $db->prepare('SELECT a.*,b.nombre,b.descripcion,b.imagen FROM detalleitemscompra as a left join productos as b on a.id_producto = b.id
        where  a.id_ordenCompra = :id_ordenCompra');
        $select->bindValue('id_ordenCompra', $ordenID);
        $select->execute();
        $ordenes = $select->fetchAll();
        return $ordenes;
    }
}

<?php

namespace controllers;

use Models\Carrito;
use Models\ItemCompra;
use Models\Orden;
use Models\Producto;

class OrdenController
{

    public function indexOrdenesByEmail()
    {
        $params = [];
        $valorExtra = "user";
        $ordenes = orden::getOrdenesByUser($_SESSION['auth']->email);
        array_push($params, $ordenes);
        array_push($params, $valorExtra);
        \Render::html('Views\Layout_user', 'ordenes/index', ['params' => $params]);
    }

    public function indexOrdenes()
    {
        $params = [];
        $valorExtra = "admin";
        $ordenes = orden::getOrdenes();
        array_push($params, $ordenes);
        array_push($params, $valorExtra);
        \Render::html('Views\Layout_adm', 'ordenes/index', ['params' => $params]);
//        \Render::html('Views\Layout_adm', 'ordenes/index', ['ordenes'=>$ordenes]);
    }

    public function detalleOrden($id)
    {
        $ordenes = orden::getDetallesByOrden($id);
        \Render::html('Views\Layout_user', 'ordenes/detalleItemsOrden', ['ordenes' => $ordenes]);
    }

    public function detalleOrdenAdmin($id)
    {
        $ordenes = orden::getDetallesByOrden($id);
        \Render::html('Views\Layout_adm', 'ordenes/detalleItemsOrden', ['ordenes' => $ordenes]);
    }

    public function detalleOrdenAdminEstado($id)
    {
        $ordenes = orden::getOrdenById($id);

        \Render::html('Views\Layout_adm', 'ordenes/editarEstado', ['ordenes' => $ordenes]);
    }

    public function listaEstados()
    {
        $estados = orden::getEstados();
        return $estados;
    }

    public function cambioEstadoOrden($id)
    {
        $id_estadoOrdenCompra = $_POST['estadoOrden'];
        orden::setEstados($id, $id_estadoOrdenCompra);
        $ordenes = orden::getOrdenes();
        header("Location: " . BASE_DIR . "admin/listadecompras");
    }

    public function checkoutFinal()
    {
        $ordenDB = Orden::saveToDB();
        \Render::html('Views\Layout', 'carrito/checkout_confirmed', ['ordenDB' => $ordenDB]);
    }

}


<?php

namespace controllers;

use Models\Carrito;
use Models\ItemCompra;
use Models\Orden;
use Models\Producto;

class CarritoController{


    public function index(){
        $productos = Carrito::getProductos();
        \Render::html('Views\Layout', 'carrito/index', ['productos'=>$productos]);
    }

    public function agregar(){
    if (isset($_POST)){
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $producto = Producto::getById($id);
//        $productoEnCarrito = carrito::getById();

        if ($producto->stock >=  $cantidad) {
            $item = new ItemCompra($producto, $cantidad);
            $modifiedStock =  ($cantidad * - 1);
            Producto::updateStock($producto, $modifiedStock);
            Carrito::save($item);
        }
    }
        header("Location: " . BASE_DIR . "carrito");
    }

    public function eliminar($id){
        Carrito::delete($id);
       header("Location: " . BASE_DIR. "carrito");
   }

    public function boton(){
        $productos = count(Carrito::getProductos());
        require_once("./views/Carrito/boton.php");
    }

    public function checkout(){
        $productos = Carrito::getProductos();
        \Render::html('Views\Layout', 'carrito/checkout', ['productos'=>$productos]);
    }

}
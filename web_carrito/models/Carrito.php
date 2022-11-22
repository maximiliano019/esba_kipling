<?php

namespace Models;

class Carrito
{

    public static $productos = [];

	public static function save(ItemCompra $producto){
		if(!isset($_SESSION))
           session_start();
		if(isset($_SESSION['Carrito']))
            Carrito::$productos = $_SESSION['Carrito'];
            array_push(Carrito::$productos, $producto);
            $_SESSION['Carrito'] = Carrito::$productos;
    }

	public static function delete($key){
		if(!isset($_SESSION))
           session_start();
		if(isset($_SESSION['Carrito']))
        	Carrito::$productos = $_SESSION['Carrito'];
            $producto = ($_SESSION['Carrito'][$key]->producto);
            $productoDB =  Producto::getById($producto->id);
            $modifiedStock = (($_SESSION['Carrito'][$key]->cantidad) );
            Producto::updateStock($productoDB, $modifiedStock);
        	unset(Carrito::$productos[$key]);
			$_SESSION['Carrito'] = Carrito::$productos;
    }

    public static function getProductos(){
		if(!isset($_SESSION))
           session_start();
		if(isset($_SESSION['Carrito']))
			Carrito::$productos = $_SESSION['Carrito'];
        return Carrito::$productos;
    }
}

<?php

namespace Models;

class ItemCompra{

    public $producto;
    public $cantidad;

    public function __construct($producto , $cantidad){
        $this->producto = $producto;
        $this->cantidad = $cantidad;
    }

}

?>
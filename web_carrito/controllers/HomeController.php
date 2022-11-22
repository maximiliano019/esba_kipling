<?php

namespace controllers;

use \models\Producto;
use \models\Carrito;
use \views\Layout;


class HomeController{

    public function index(){

        $titulo = "Nuestros Productos";
      \Render::html('views\layout','/home/index',['titulo'=>$titulo]);

    }

}

?>
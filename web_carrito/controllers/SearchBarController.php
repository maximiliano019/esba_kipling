<?php

namespace controllers;

use Models\Producto;

class SearchBarController
{
    public function barraBusqueda(){

        require_once("./views/Search/searchBar.php");
//        Render::html('Views\Layout','/Search/searchBar',);
    }


    public function grilla(){
        if (isset($_POST)) {
            $productos = Producto::getAll();
        }
        else {
            $productos = Producto::getByFilter($_POST["busqueda"]);
        }
        require_once("views/productos/grilla.php");
//        Render::html('views\layout','/productos/grilla',['productos'=>$productos]);
//          Render::html('views\layout','/home/index',['productos'=>$productos]);
    }

}
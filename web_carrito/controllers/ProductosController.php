<?php

namespace controllers;

use \models\Producto;
use \Render;

class ProductosController
{

    public function index(){

        $productos = Producto::getAll();

//        require_once("views/productos/index.php");
        Render::html('views\layout_adm','/productos/index',['productos'=>$productos]);

    }

    public function agregar(){
        if (!$_POST) {
            Render::html('views\layout_adm','/productos/agregar',[]);
//            require_once("views/productos/agregar.php");
        } else {
            $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
            $limite = 700;
            if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024 * 3){
                $imagen = date('is') . $_FILES['imagen']['name'];
                $ruta = "public/uploads/". $imagen;
                if(!move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)){
                    die("No se pudo cargar el archivo");
                }
                $producto = new Producto(null, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $imagen );
                Producto::save($producto);
//                header("Location: ".BASE_DIR. "/productos");
                $productos = Producto::getAll();
                header("Location: " . BASE_URL . "/admin/productos");
//                Render::html('views\layout_adm','/productos/index',['productos'=>$productos]);
            }else{
                die("Archivo no permitido");
            }

        }
    }

    public function eliminar($id){
        var_dump($id);
        Producto::delete($id);
        $productos = Producto::getAll();
        header("Location: " . BASE_URL . "/admin/productos");
//                Render::html('views\layout_adm','/productos/index',['productos'=>$productos]);
//        header("Location: " . BASE_URL . "/admin/productos");
    }


    public function editar($id){

//        $id= $params[0];

        $producto = Producto::getById($id);

        if (!$_POST) {
//            require_once("views/productos/editar.php");
            Render::html('views\layout_adm','/productos/editar',['producto'=>$producto]);
        } else {
            $producto = new Producto($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['stock'], $producto->imagen);
            Producto::update($producto);
            header("Location: " . BASE_URL. "/admin/productos");
        }


    }
    public function grilla_bkp(){
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

    public function grilla(){
        if (isset($_POST) && !empty($_POST)) {
//            var_dump($_POST);
            $productos = Producto::getByFilter($_POST["busqueda"]);
            Render::html('views\layout','/productos/grilla',['productos'=>$productos]);
        }
        else {
            $productos = Producto::getAll();
//          Render::html('views\layout','/home/index',['productos'=>$productos]);
            require_once("views/productos/grilla.php");
        }
//        var_dump($productos);

    }

    public function grillaByFilter($filterParameters){

        $productos = Producto::getByFilter($filterParameters);

        require_once("views/productos/grilla.php");


    }
//    public function detalle($params){
        public function detalle($id){

//            $id= $params[0];

        $producto = Producto::getById($id);

//        require_once("views/productos/detalle.php");
        Render::html('Views\Layout', 'productos/detalle', ['producto'=>$producto]);
    }

    public static function searchBar(){
        if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
            $busqueda_param = $_POST['busqueda'];
//            var_dump($busqueda_param);
            $productos = Producto::getByFilter($busqueda_param);
        } else {
            $productos = Producto::getAll();
        }
//        require_once("views/Productos/grilla.php");
        Render::html('views\layout','/productos/grilla',['productos'=>$productos]);
    }

}

<?php

use Views\Layout;


$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= dirname($_SERVER['SCRIPT_NAME']);

define('BASE_URL', $base_url) ;
define('BASE_DIR', dirname($_SERVER['SCRIPT_NAME'])."/");

//ExceptionHandler::run();
require_once(".\core\Autoload.php");

Autoload::exec();
Autoload::runCore();

$router = new Router();

/* home */
$router->get('', function($params){
    (new controllers\HomeController)->index();
});
$router->post('', function($params){
    (new controllers\HomeController)->index();
});
$router->get('index', function($params){
    (new controllers\HomeController)->index();
});
$router->post('index', function($params){
    (new controllers\HomeController)->index();
});
/* productos cliente */
$router->get('productos/detalle/{id}', function($params){
    (new controllers\ProductosController)->detalle($params['id']);
});
$router->get('productos', function($params){
    (new controllers\ProductosController)->detalle($params['id']);
});
/********************** carrito ***************************/
$router->get('carrito', function(){
    (new controllers\CarritoController)->index();
});
$router->post('carrito', function(){
    (new controllers\CarritoController)->index();
});
$router->get('carrito/agregar', function(){
    (new controllers\CarritoController)->agregar();
});
$router->post('carrito/agregar', function(){
    (new controllers\CarritoController)->agregar();
});
$router->get('carrito/eliminar/{id}', function($params){
    (new controllers\CarritoController)->eliminar($params['id']);
});
$router->post('carrito/eliminar/{id}', function($params){
    (new controllers\CarritoController)->eliminar($params['id']);
});
$router->get('carrito/checkout', function(){
    \Auth::check();
    (new controllers\CarritoController)->checkout();
});
$router->post('carrito/checkout', function(){
    \Auth::check();
    (new controllers\OrdenController)->checkoutFinal();
});
$router->get('carrito/checkout_confirmed', function(){
    \Auth::check();
    (new controllers\CarritoController)->checkout();
});

/*************** search **************/
$router->post('Productos/searchBar', function(){
    (new controllers\ProductosController)->grilla();
});
// Admin************************************************//
$router->get('admin', function(){
    \Auth::checkAdmin();
    header("Location: " . BASE_URL . "/admin/productos");
});
$router->get('admin/productos', function($productos){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->index();
});
$router->get('admin/productos/agregar', function(){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->agregar();
});
$router->post('admin/productos/agregar', function(){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->agregar();
});
$router->post('admin/productos/eliminar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->eliminar($params['id']);
});
$router->get('admin/productos/eliminar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->eliminar($params['id']);
});
$router->post('admin/productos/editar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->editar($params['id']);
});
$router->get('admin/productos/editar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\ProductosController)->editar($params['id']);
});
$router->get('admin/usuarios', function(){
//    \Auth::check();
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->index();
});
$router->post('admin/usuarios', function(){
//    \Auth::check();
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->index();
});
$router->get('admin/usuarios/agregar', function(){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->agregar();
});
$router->Post('admin/usuarios/agregar', function(){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->agregar();
});
$router->post('admin/usuarios/eliminar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->eliminar($params['id']);
});
$router->get('admin/usuarios/eliminar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->eliminar($params['id']);
});
$router->post('admin/usuarios/editar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->editar($params['id']);
});
$router->get('admin/usuarios/editar/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->editar($params['id']);
});
$router->post('admin/usuarios/resetpassword/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->resetpassword($params['id']);
});
$router->get('admin/usuarios/resetpassword/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->resetpassword($params['id']);
});
$router->get('admin/usuarios/becameAdmin/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->becameAdmin($params['id']);
});
$router->get('admin/usuarios/deleteAdmin/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\UsuariosController)->deleteAdmin($params['id']);
});
$router->get('admin/listadecompras', function(){
    \Auth::checkAdmin();
    (new controllers\OrdenController)->indexOrdenes();
});
$router->get('admin/ordenes/detalleOrden/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\OrdenController)->detalleOrdenAdmin($params['id']);
});
$router->get('admin/ordenes/detalleEstado/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\OrdenController)->detalleOrdenAdminEstado($params['id']);
});
//$router->get('admin/ordenes/detalleEstado/{id}', function($params){
//    \Auth::checkAdmin();
//    (new controllers\OrdenController)->detalleOrdenAdminEstado($params['id']);
//});
$router->post('admin/ordenes/detalleEstado/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\OrdenController)->cambioEstadoOrden($params['id']);
});
/***************************** ordenes ************************************/
$router->get('listadecompras', function(){
    \Auth::check();
    (new controllers\OrdenController)->indexOrdenesByEmail();
});
$router->get('ordenes/detalle/{id}', function($params){
    \Auth::check();
    (new controllers\OrdenController)->detalleOrden($params['id']);
});
$router->get('admin/ordenes/detalle/{id}', function($params){
    \Auth::checkAdmin();
    (new controllers\OrdenController)->detalleOrdenAdmin($params['id']);
});
/***************************** users *************************************/
$router->get('userdetails', function(){
    \Auth::check();
//    \Auth::checkAdmin();
    (new controllers\OrdenController)->indexOrdenesByEmail();
});
$router->post('usuarios/editar/{id}', function($params){
    \Auth::check();
    (new controllers\UsuariosController)->editar($params['id']);
});
$router->get('usuarios/editar/{id}', function($params){
    \Auth::check();
    (new controllers\UsuariosController)->editar($params['id']);
});

/*************** registracion  **************/
$router->get('signup', function(){
//    \Auth::check();
//    header("Location: " . BASE_URL . "/signup");
    (new controllers\UsuariosController)->registrar();
});
$router->Post('signup', function(){
//    \Auth::check();
    (new controllers\UsuariosController)->registrar();
});
/* LOGIN IN AND OUT */
$router->get('logout', function(){
    (new controllers\UsuariosController)->logout();
});
$router->get('login', function(){
    (new controllers\UsuariosController)->login();
});
$router->post('login', function(){
    (new controllers\UsuariosController)->login();
});

$router->notFound(function(){
    require_once("./views/404.php");
});

$router->run();


<?php

namespace controllers;
use \Autoload;
use Models\Producto;
use Models\Usuario;
use \Views\layout_adm;
use \Auth;
use \Render;

class UsuariosController
{
    public function index(){
        $usuarios = Usuario::getAll();
        Render::html('views\layout_adm','/usuarios/index',['usuarios'=>$usuarios]);
    }
    public function boton(){
        $usuario = \Auth::getUser();
        require_once("views/usuarios/boton.php");
    }
    public function login(){
        if (!$_POST) {
            Render::html('views\layout_sincarrito', '/usuarios/login', []);
        }else{
            $usuario = Usuario::login($_POST['email'], $_POST['password']);
            if(isset($usuario)){
                Auth::login($usuario);
                $usuario = Usuario::getByMail($_POST['email']);
//                Render::html('Views\layout','/home/index', ['usuario'=>$usuario]);
                $_POST = array();
                Render::html('views\layout','/home/index',[]);
            }else{
                Render::html('Views\layout_sincarrito', '/usuarios/login', []);
            }
        }
    }

    public function logout(){
        \Auth::logout();
        header('Location: ' . BASE_URL );
    }
    public function agregar(){
        $defaultPassword = Autoload::defaultpassword();
//        var_dump($defaultPassword);
        if (!$_POST) {
            Render::html('Views\layout_adm', '/usuarios/agregar', []);
        } else {
//        var_dump($defaultPassword);
            $hash = password_hash($defaultPassword, PASSWORD_DEFAULT);
//            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
//            $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $hash);
            $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $hash, null, null);
            Usuario::insert($usuario);
            header("Location: " . BASE_URL . "/admin/usuarios");
        }
    }
    public function registrar(){
        $defaultPassword = Autoload::defaultpassword();
        if (!$_POST) {
            Render::html('views\layout_sincarrito', '/usuarios/signup', []);
        } else {
            var_dump($_POST);
//            $hash = password_hash($defaultPassword, PASSWORD_DEFAULT);
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $usuario = new Usuario(null, $_POST['nombre'], $_POST['email'], $hash, -1,0);
            Usuario::insert($usuario);
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function becameAdmin($id){
            Usuario::insertAdmin($id);
        header("Location: " . BASE_URL . "/admin/usuarios");
    }
    public function deleteAdmin($id){
        Usuario::deleteAdmin($id);
        header("Location: " . BASE_URL . "/admin/usuarios");
    }

    public function eliminar($id){
//        var_dump($id);
        Usuario::delete($id);
        header("Location: " . BASE_URL . "/admin/usuarios");
    }

    public function editar($id){
        $usuario = Usuario::getById($id);
        if (!$_POST) {
            if ($usuario->admin_lvl != null){
                Render::html('views\layout_adm', '/usuarios/editar', ['usuario' => $usuario]);
            } else {
                Render::html('views\layout_user', '/usuarios/editar', ['usuario' => $usuario]);
            }
        } else {
//            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $usuario = new Usuario($usuario->id, $usuario->nombre, $usuario->email,$hash,$usuario->user_lvl, $usuario->admin_lvl);
//            Usuario::update_full($usuario);
            Usuario::update_pass($usuario);
            header("Location: " . BASE_URL . "/userdetails");

        }
    }
        public function resetpassword($id){
            $usuario = Usuario::getById($id);
            if (!$_POST) {
                Render::html('views\layout_adm','/usuarios/resetpassword',['usuario'=>$usuario]);
            } else {
                $usuarioDB = Usuario::getById($id);
                $defaultPassword = Autoload::defaultpassword();
                $hash = password_hash($defaultPassword, PASSWORD_DEFAULT);
                $usuario = new Usuario($_POST['id'], $usuarioDB->nombre, $usuarioDB->email, $hash, null, null);
                Usuario::update_pass($usuario);
                header("Location: " . BASE_URL. "/admin/usuarios");

            }
    }
}

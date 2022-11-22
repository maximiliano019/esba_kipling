<?php

namespace Models;

class Usuario
{
	public $id;
	public $nombre;
	public $email;
	public $password;
    public $user_lvl;
    public $admin_lvl;

	function __construct($id, $nombre, $email, $password, $user_lvl, $admin_lvl)
	{
		$this->id=$id;
		$this->nombre=$nombre;
		$this->email=$email;
		$this->password=$password;
        $this->user_lvl=$user_lvl;
        $this->admin_lvl=$admin_lvl;
	}

	public static function getAll(){
		$listaUsuarios =[];
		$db=\Db::getConnect();
//        $stmt=$db->query('SELECT * FROM usuarios ORDER BY id');
        $stmt=$db->query('SELECT a.*, b.admin_lvl FROM usuarios as a left join admin_list as b on a.id = b.user_id order by a.id');
		foreach ($stmt->fetchAll() as $usuario) {
			$listaUsuarios[]= new Usuario($usuario['id'],$usuario['nombre'], $usuario['email'],$usuario['password'], $usuario['userLevel'], $usuario['admin_lvl']);
		}
		return $listaUsuarios;
	}

	public static function insert($usuario){
        $db=\Db::getConnect();
        $insert=$db->prepare('INSERT INTO usuarios VALUES(:id,:nombre,:email,:password, :direccionID, :userLevel)');
        $insert->bindValue('id',null);
        $insert->bindValue('nombre',$usuario->nombre);
        $insert->bindValue('email',$usuario->email);
        $insert->bindValue('password',$usuario->password);
        $insert->bindValue('direccionID',null);
        $insert->bindValue('userLevel',null);
        $insert->execute();
//			$insert->execute((array) $usuario); // supone que los atributos coinciden con los campos
		}

    public static function insertAdmin($id){
        $db=\Db::getConnect();
        $insertAdmin=$db->prepare('INSERT INTO admin_list VALUES(:id, :user_id,:admin_lvl)');
        $insertAdmin->bindValue('id',null);
        $insertAdmin->bindValue('user_id',$id);
        $insertAdmin->bindValue('admin_lvl',99); /* por ahora default */
        $insertAdmin->execute();

    }

    public static function deleteAdmin($id){
        $db=\Db::getConnect();
        $deleteAdmin=$db->prepare('DELETE FROM admin_list WHERE user_id=:id');
        $deleteAdmin->bindValue('id',$id);
        $deleteAdmin->execute();
    }

    public static function update_pass($usuario){
        $db=\Db::getConnect();
        $update=$db->prepare('UPDATE usuarios SET password=:password WHERE id=:id');
        $update->bindValue('id',$usuario->id);
        $update->bindValue('password',$usuario->password);
        $update->execute();
    }

	public static function delete($id){
		$db=\Db::getConnect();
		$delete=$db->prepare('SET foreign_key_checks = 0');
        $delete->execute();
        $delete=$db->prepare('DELETE FROM usuarios WHERE ID=:id');
        $delete->bindValue('id',$id);
		$delete->execute();
        $delete=$db->prepare('SET foreign_key_checks = 1');
        $delete->execute();


        self::deleteAdmin($id);
	}

	public static function getById($id){
		$db=\Db::getConnect();
//        $select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
        $select=$db->prepare('SELECT a.*, b.admin_lvl FROM usuarios as a left join admin_list as b on a.id = b.user_id WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
        $usuarioDb=$select->fetch();
        $usuario = new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['email'],$usuarioDb['password'], $usuarioDb['userLevel'], $usuarioDb['admin_lvl']);
		return $usuario;
	}
    public static function getByMail($email){
        $db=\Db::getConnect();
//        $select=$db->prepare('SELECT * FROM usuarios WHERE email=:email');
        $select=$db->prepare('SELECT a.*, b.admin_lvl FROM usuarios as a left join admin_list as b on a.id = b.user_id WHERE a.email=:email');
        $select->bindValue('email',$email);
        $select->execute();
        $usuarioDb=$select->fetch();
//      $usuario = new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['email'],$usuarioDb['password'], $usuarioDb['admin_lvl']);
        $usuario = new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['email'],$usuarioDb['password'], $usuarioDb['userLevel'], $usuarioDb['admin_lvl']);
        return $usuario;
    }

	public static function login($email,$password){
		$db=\Db::getConnect();
//        $select=$db->prepare('SELECT * FROM usuarios WHERE email=:email');
        $select=$db->prepare('SELECT a.*, b.admin_lvl FROM usuarios as a left join admin_list as b on a.id = b.user_id WHERE a.email=:email');
		$select->bindValue('email',$email);
		$select->execute();
		$usuarioDb=$select->fetch();
        if ((password_verify($password, $usuarioDb['password'])) && ($usuarioDb['email'] == $email)) {
//            $usuario = new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['email'],$usuarioDb['password'], $usuarioDb['admin_lvl']);
            $usuario = new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['email'],$usuarioDb['password'], $usuarioDb['userLevel'], $usuarioDb['admin_lvl']);
            return $usuario;
        } else {
            return null;
        }

	}

}

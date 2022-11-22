<?php

namespace Models;

class Producto
{
	public $id;
	public $nombre;
	public $descripcion;
	public $precio;
	public $stock;
	public $imagen;

	function __construct($id, $nombre, $descripcion, $precio, $stock, $imagen)
	{
		$this->id=$id;
		$this->nombre=$nombre;
		$this->descripcion=$descripcion;
		$this->precio=$precio;
		$this->stock=$stock;
		$this->imagen=$imagen;
	}
	public static function getAll(){
		$listaProductos =[];
		$db=\Db::getConnect(); 
		$stmt=$db->query('SELECT * FROM Productos ORDER BY id');

		foreach ($stmt->fetchAll() as $producto) {
			$listaProductos[]= new Producto($producto['id'],$producto['nombre'], $producto['descripcion'],$producto['precio'],$producto['stock'],$producto['imagen']);
		}
		return $listaProductos;
	}
    public static function getByFilter($busqueda){
        $listaProductos =[];
        $db=\Db::getConnect();
        $select=$db->prepare('SELECT * FROM productos WHERE nombre like :busqueda or  descripcion like :busqueda ORDER BY id');
        $select->bindValue(':busqueda',"%$busqueda%");
        $select->execute();
        foreach ($select->fetchAll() as $producto) {
            $listaProductos[]= new Producto($producto['id'],$producto['nombre'], $producto['descripcion'],$producto['precio'],$producto['stock'],$producto['imagen']);
        }
        return $listaProductos;
    }
	public static function save($producto){
        $db=\Db::getConnect();
        $insert=$db->prepare('INSERT INTO productos VALUES(:id,:nombre,:descripcion,:precio,:stock,:imagen)');
        $insert->bindValue('id',null);
        $insert->bindValue('nombre',$producto->nombre);
        $insert->bindValue('descripcion',$producto->descripcion);
        $insert->bindValue('precio',$producto->precio);
        $insert->bindValue('stock',$producto->stock);
        $insert->bindValue('imagen',$producto->imagen);
        $insert->execute();
    }
    public static function updateStock($producto, $modifiedStock){
        $newStock = $producto->stock + $modifiedStock;
        $db=\Db::getConnect();
        $update=$db->prepare('UPDATE productos SET stock=:stock WHERE id=:id');
        $update->bindValue('id',$producto->id);
        $update->bindValue('stock',$newStock);
        $update->execute();
    }
	public static function update($producto){
		$db=\Db::getConnect();
		$update=$db->prepare('UPDATE productos SET nombre=:nombre, descripcion=:descripcion, precio=:precio, stock=:stock, imagen=:imagen WHERE id=:id');
		$update->bindValue('id',$producto->id);
		$update->bindValue('nombre',$producto->nombre);
		$update->bindValue('descripcion',$producto->descripcion);
		$update->bindValue('precio',$producto->precio);
		$update->bindValue('stock',$producto->stock);
		$update->bindValue('imagen',$producto->imagen);
		$update->execute();
	}
	public static function delete($id){
		$db=\Db::getConnect();
		$delete=$db->prepare('DELETE FROM productos WHERE ID=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}
	public static function getById($id){
		$db=\Db::getConnect();
		$select=$db->prepare('SELECT * FROM productos WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		$productoDb=$select->fetch();
		$producto= new producto($productoDb['id'],$productoDb['nombre'],$productoDb['descripcion'],$productoDb['precio'],$productoDb['stock'],$productoDb['imagen']);
		return $producto;
	}
}

<?php 
//se invlulle la conexion  base de datos 
require "../config/Conexion.php";
/**
 * 
se implemeta la clase para insertar
 */
class Categoria
{
    /**
     * se crea elconstrutor de 
     */
    public function __construct()
    {
        
    }
    public function insertar($nombre,$descripcion)
    {
    	$sql="INSERT INTO categoria (nombre,descripcion,condicion)VALUES ('$nombre','$descripcion','1')";
    	return ejecutarConsulta($sql);
    }
    //editamos un metodod para editar los registros
    public function editar($idcategoria,$nombre,$descripcion)
    {
    	$sql="UPDATE categoria SET nombre='$nombre,'descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
    	return ejecutarConsulta($sql);
    }
    //se implemeta un metodo para 
}
 ?>

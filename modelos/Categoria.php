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
    public function desactivar($idcategoria)
    {
    	$sql="UPDATE categoria set condicion='0' where idcategoria='$idcategoria'";
    	return ejecutarConsulta($sql);
    }
    //implemetar un metodopara mostrar los datos de un egistro o modificar
    public function mostrar($idcategoria)
    {
    	$sql="SELECT * FROM categoria where idcategoria='$idecategoria'";
    	return ejecutarConsultaSimpleFila($sql);
    }
    //implementar metodopara listar registros
    public function listar()
    {
    	$sql="SELECT * from categoria";
    	return ejecutarConsulta($sql);
    }
}
 ?>

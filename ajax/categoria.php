<?php
require_once "../modelos/Categoria.php";
$categoria=new Categoria();
$idcategoria=isset($_POST["idcategoria"])? limpiarCadena($_POST["idcategoria"]):"";

$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";






switch ($_GET["op"]) {
	case 'guardaryeditar':
		if (empty($idcategoria)) {
			$rspta=$categoria->insertar($nombre,$descripcion);
			echo $rspta ? "Categoria registrada ":"categoria no se puede registar";
		}
		else{


        $rspta=$categoria->editar($idcategoria,$nombre,$descripcion);
			echo $rspta ? "Categoria actuaizada ":"categoria no se puede actualizar";	
			}
		break;
	
	case 'desactivar':
		$rspta=$categoria->desactivar($idcategoria);
			echo $rspta ? "Categoria desactivada ":"categoria no se puede desactivar";
		break;

	case 'activar':
	$rspta=$categoria->activar($idcategoria);
			echo $rspta ? "Categoria activada ":"categoria no se puede activar";
		break;

	case 'mostrar':
	$rspta=$categoria->mostrar($idcategoria);
			//se codificael  resultado con un json
	echo json_encode($rspta);
		break;

			case 'listar':
		$rspta=$categoria->listar();
		//se crea un array
		$data=array();
		while ($reg=$rspta->fetch_object()) {
		    $data[]=array(
		    	"0"=>$reg->idcategoria,
		    	"1"=>$reg->nombre,
		    	"2"=>$reg->descripcion,
		    	"3"=>$reg->condicion
		    );
		}
			$results=array(
				"sEcho"=>1,//informacion para datatable
				"iTotalRecords"=>count($data),//enviamos eltotalde registros ala datatable
				"iTotalDisplayRecords"=>count($data),//seenvian el total de registros a visualizar
				"aaData"=>$data);
			echo json_encode($results);
		break;
}
?>
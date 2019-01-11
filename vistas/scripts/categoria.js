var tabla;

//funcion q se ejecuta al inicio
function init(){
mostrarform(false);
listar();
}

//funcion limpiar
function limpiar()
{
	$("#idcategoria").val("");
	$("#nombre").val("");
	$("#descripcion").val("");

}

//funcion mostrar formulario
function mostrarform(flog)
{
	limpiar();
	if (flog) {

		$("#listadoregistro").hide();
		$("#formularioregistro").show();
		$("#btnGuardar").prop("disabled",false);
	}
	else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
	}
}

//funcion cancelarform
function cancelarform(){
	limpiar();
	mostrarform(false);
}
function listar(){
	tabla=$('#tbllistado').dataTable(
{
	"aProcessing":true,//se activa el proceso de la datatable
	"aServerSide":true,//paginacion y filtrado realizado por el servidor
	dom:'Bfrtip',//definimos los elementos del control de tabla
	buttons: [
    'copyHtml5',
    'exelHtml5',
    'cvsHtml5',
    'pdf'
	],
	"ajax":
	{
		url: '../ajax/categoria.php?op=listar',
		type: "get",
		dataType: "json",
		error: function(e){
			console.log(e.responseText);
		}
	},
	"bDestroy":true,
	"iDisplayLength":5, //para paginar
	"order":[[0,"desc"]]
}).dataTable();
}

init();
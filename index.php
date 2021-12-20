<?php
	require_once 'modelo/Pagina.php';
	require_once 'modelo/Acceso.php';
	require_once 'modelo/CRUD.php';
	require_once 'modelo/CRUDExterno.php';
	require_once 'modelo/CRUDAgenda.php';
	require_once 'modelo/CRUDUsuario.php';
	require_once 'controlador/Controlador.php';
	require_once 'controlador/ControladorExterno.php';
	require_once 'controlador/ControladorAgenda.php';
	require_once 'controlador/ControladorWord.php';
	require_once 'controlador/ControladorUsuario.php';
	require_once 'controlador/Validacion.php';
	require_once 'controlador/Pic.php';
	require_once 'controlador/HTMLToDoc.php';
	// require_once 'controlador/MainInfo.php';
	// require_once 'controlador/Paginacion.php';

	if(isset($_GET["pagina"])) {
		if ($_GET["pagina"] == "HistoriaMedica") {
		}
	}
	$controlador = new Controlador();
	$controlador -> getPlantilla();

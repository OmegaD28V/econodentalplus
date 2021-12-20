<?php 
	$cargo = 0;
	$idUsuario = 0;
	if(isset($_SESSION["tipo-usuario"])){
		$cargo = $_SESSION["tipo-usuario"];
	}
	if(isset($_SESSION["usuario"])){
		$idUsuario = $_SESSION["usuario"];
	}
	
	// $size = 3;
	// $init = 0;
	// $inicio = 0;
	// $modulo = '';
	// if(isset($_GET["pag"])){
	// 	$init = $_GET["pag"];
	// }
	// if(isset($_GET["pagina"])){
	// 	$modulo = $_GET["pagina"];
	// }

	// $arrayConfiguracion = ControladorUsuario::selUsuarioCtl($idUsuario);
	// $paginacion = Paginacion::pnt($modulo, sizeof($arrayClientes), $init, $size);
	// $paginacion != null ? $inicio = $paginacion['inicio'] : null ;
	// $clientes = array_slice($arrayClientes, $inicio, $size);
?>
<div class="title">
	<h2>Configuración</h2>
</div>
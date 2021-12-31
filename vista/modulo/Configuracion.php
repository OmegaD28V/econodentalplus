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

<div class="C__Table center">
	<div class="Bar__Btns column w70">
		<span class="Lbl__Bar">Información Personal</span>
		<div class="C__Btn">
			<a href="MisDatos" id="historiaBtn-d" class="btn">Mis Datos</a>
		</div>
	</div>
	<div class="Bar__Btns column w70">
		<span class="Lbl__Bar">Seguridad</span>
		<div class="C__Btn">
			<a href="index.php?pagina=HistoriaMedica&type-doc=generar" id="historiaBtn-d" class="btn">Cambiar Contraseña</a>
		</div>
	</div>
</div>
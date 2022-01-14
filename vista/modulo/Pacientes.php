<?php
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

	$arrayPacientes = ControladorPaciente::selPacientesCtl();
	$arrayPacientes = array(
		array(
			'idUsuario' => "6", 
			'nombre' => "Amanda", 
			'apellidos' => "Reyes", 
			'fechaRegistro' => "21-dic-2022 12:30 hrs", 
			'expediente' => "Ver expediente"
		), 
		array(
			'idUsuario' => "5", 
			'nombre' => "Bernadette", 
			'apellidos' => "Hills", 
			'fechaRegistro' => "13-ene-2022 10:00 hrs", 
			'expediente' => "+ Nuevo expediente"
		)
	);
	$totalPacientes = ControladorPaciente::contarPacientesCtl()["totalPacientes"];
	$totalPacientes = 2;
	$mostrando = sizeof($arrayPacientes);
	// $paginacion = Paginacion::pnt($modulo, sizeof($arrayClientes), $init, $size);
	// $paginacion != null ? $inicio = $paginacion['inicio'] : null ;
	// $clientes = array_slice($arrayClientes, $inicio, $size);
?>
<div class="title">
	<h2>Pacientes</h2>
</div>

<?php if(!$arrayPacientes) { ?>
<div class="C__Table">
	<div class="Bar__Btns">
		<div class="C__Btn">
			<input type="button" id="pacienteNBtn-s" class="btn" value=" + Nuevo">
		</div>
		<div class="info nodata">
			<span>No hay pacientes registrados</span>
		</div>
	</div>
</div>
<?php } else { ?>
<div class="C__Table">
	<div class="Bar__Btns">
		<div class="C__Btn">
			<input type="button" id="pacienteNBtn-s" class="btn" value=" + Nuevo">
			<input type="button" id="pacienteABtn-s" class="btn" value="Actualizar" disabled>
			<input type="button" id="pacienteFBtn-s" class="btn" value="Archivar" disabled>
		</div>
		<div class="C__Btn">
			<span class="results" id="results"><?=$mostrando?> resultados de <?=$totalPacientes?></span>
		</div>
		<div class="C__Btn__Last">
			<input class="search" type="text" id="pacienteBtn-b" name="pacienteBtn-b" placeholder="Buscar Paciente">
		</div>
	</div>

	<table class="table" id="tbl-pacientes">
		<tr>
			<th>
				<input type="checkbox" name="checkPacientes" id="checkPacientes">
			</th>
			<th>Nombre</th>
			<th>Fecha de registro</th>
			<th>Expediente</th>
		</tr>
			<?php 
				foreach($arrayPacientes as $key => $value) : 
					$nombre = $value["nombre"].' '.$value["apellidos"];
					$expediente = $value["expediente"];
			?>
		<tr name="pacientes-row">
			<td>
				<input type="checkbox" name="checkPaciente" id="checkPaciente<?=$value["idUsuario"]?>" value="<?=$value["idUsuario"]?>">
			</td>
			<td id="<?=$value["idUsuario"]?>" name="checkPaciente"><?=$nombre?></td>
			<td id="<?=$value["idUsuario"]?>" name="checkPaciente"><?=$value["fechaRegistro"]?></td>
			<td id="<?=$value["idUsuario"]?>" name="checkPaciente">
				<input type="button" id="historiaNBtn-s" class="btn" value="<?=$expediente?>">
			</td>
		</tr>
			<?php endforeach ?>
	</table>
</div>

<div class="C__f oculto" id="pacienteAForm">
	<form method="post" class="f">
		<span class="f__x" id="pacienteABtn-x"></span>
		<h2 class="f__title">Actualizar Paciente</h2>
		<div class="line-top"></div>
		<div class="iflex">
			<div class="i__group">
				<input class="textfield" type="text" id="pacienteNombre-A" name="pacienteNombre-A" autofocus required>
				<label class="labels" for="pacienteNombre-A">Nombre</label>
			</div>
			<div class="i__group">
				<input class="textfield" type="text" id="pacienteApellidos-A" name="pacienteApellidos-A" required>
				<label class="labels" for="pacienteApellidos-A">Apellidos</label>
			</div>
		</div>

		<div>
			<input type="hidden" name="idPaciente-A" id="idPaciente-A" required>
			<input class="submit" type="submit" value="Actualizar">
			<?php //ControladorUsuario::actualizarUsuarioCtl(); ?>
		</div>
	</form>
</div>

<div class="C__f oculto" id="pacienteEForm">
	<form method="post" class="f">
		<span class="f__x" id="pacienteEBtn-x"></span>
		<h2 class="f__title">Eliminar pacientes</h2>
		<div class="line-top"></div>
		<div class="i__group">
			<span class="label-checkbox">¿Eliminar los pacientes seleccionados?</span>
		</div>
		<input class="submit" type="button" id="pacienteEBtn-C" value="Aceptar">
	</form>
</div>

<?php } ?>

<div class="C__f oculto" id="pacienteNForm">
	<form method="post" class="f">
		<span class="f__x" id="pacienteNBtn-x"></span>
		<h2 class="f__title">Nuevo Paciente</h2>
		<div class="line-top"></div>
		<div class="iflex">
			<div class="i__group">
				<input class="textfield" type="text" id="pacienteNombre-N" name="pacienteNombre-N" autofocus required>
				<label class="labels" for="pacienteNombre-N">Nombre</label>
			</div>
			<div class="i__group">
				<input class="textfield" type="text" id="pacienteApellidos-N" name="pacienteApellidos-N" required>
				<label class="labels" for="pacienteApellidos-N">Apellidos</label>
			</div>
		</div>
		<div class="i__group">
			<input class="textfield" type="text" id="pacienteApellidos-N" name="pacienteApellidos-N" required>
			<label class="labels" for="pacienteApellidos-N">Teléfono</label>
		</div>

		<div>
			<input class="submit" type="submit" value="Agregar">
			<?php //ControladorUsuario::crearCuentaCtl(); ?>
		</div>
	</form>
</div>
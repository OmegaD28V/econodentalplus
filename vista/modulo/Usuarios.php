<?php 
	$cargo = 0;
	if(isset($_SESSION["tipo-usuario"])){
		$cargo = $_SESSION["tipo-usuario"];
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

	$arrayUsuarios = ControladorUsuario::selUsuariosCtl();
	// $paginacion = Paginacion::pnt($modulo, sizeof($arrayClientes), $init, $size);
	// $paginacion != null ? $inicio = $paginacion['inicio'] : null ;
	// $clientes = array_slice($arrayClientes, $inicio, $size);
?>

<h2 class="title">Usuarios</h2>

<?php if($cargo >= 1) { ?>
<div class="C__Table">
	<div class="Bar__Btns">
		<div class="C__Btn">
			<input type="button" id="usuarioNBtn-s" class="btn" value=" + Nuevo">
			<input type="button" id="usuarioABtn-s" class="btn" value="Actualizar" disabled>
			<input type="button" id="usuarioEBtn-s" class="btn" value="Eliminar" disabled>
		</div>
		<div class="C__Btn__Last">
			<input class="search" type="text" id="usuarioBtn-b" name="usuarioBtn-b" placeholder="Buscar Usuario">
		</div>
	</div>

	<table class="table" id="tbl-usuarios">
		<tr>
			<th>
				<input type="checkbox" name="checkUsuarios" id="checkUsuarios">
			</th>
			<th>Nombre</th>
			<th>Cargo</th>
			<th>Fecha de registro</th>
			<th>Estado</th>
		</tr>
			<?php 
				foreach($arrayUsuarios as $key => $value) : 
					$nombre = $value["nombre"].' '.$value["apellidos"];
					$cargos = ['Paciente', 'Admin', 'Doctor', 'Asistente', 'Recepcionista'];
					$estados = ['Desconectado', 'Conectado'];
					$cargo = $cargos[$value["tipoUsuario"]];
					$estado = $estados[$value["estado"]];
			?>
		<tr name="usuarios-row">
			<td>
				<input type="checkbox" name="checkUsuario" id="checkUsuario<?=$value["idUsuario"]?>" value="<?=$value["idUsuario"]?>">
			</td>
			<td id="<?=$value["idUsuario"]?>" name="checkUsuario"><?=$nombre?>
			</td>
			<td id="<?=$value["idUsuario"]?>" name="checkUsuario"><?=$cargo?></td>
			<td id="<?=$value["idUsuario"]?>" name="checkUsuario"><?=$value["fechaRegistro"]?></td>
			<td id="<?=$value["idUsuario"]?>" name="checkUsuario"><?=$estado?></td>
		</tr>
			<?php endforeach ?>
	</table>
</div>

<div class="C__f oculto" id="usuarioAForm">
	<form method="post" class="f">
		<span class="f__x" id="usuarioABtn-x"></span>
		<h2 class="f__title">Actualizar usuario</h2>
		<div class="line-top"></div>
		<div class="iflex">
			<div class="i__group">
				<input class="textfield" type="text" id="usuarioNombre-A" name="usuarioNombre-A" autofocus required>
				<label class="labels" for="usuarioNombre-A">Nombre</label>
			</div>
			<div class="i__group">
				<input class="textfield" type="text" id="usuarioApellidos-A" name="usuarioApellidos-A" required>
				<label class="labels" for="usuarioApellidos-A">Apellidos</label>
			</div>
		</div>
		
		<div class="i__group">
			<input class="textfield" type="tel" name="usuarioTelefono-A" id="usuarioTelefono-A" required>
			<label class="labels" for="usuarioTelefono-A">Número de teléfono</label>
		</div>
		
		<div class="i__group">
			<select class="textfield" name="usuarioTipo-A" id="usuarioTipo-A" required>
				<option value="">Seleccione un cargo</option>
				<option value="1">Gerente</option>
				<option value="2">Doctor</option>
				<option value="3">Asistente</option>
				<option value="4">Recepcionista</option>
			</select>
			<label class="labels" for="usuarioTipo-A">Cargo</label>
		</div>

		<input type="hidden" name="usuarioId-A" id="usuarioId-A" required>
		<input class="submit" type="submit" value="Actualizar">
		<?php //$posponerCita = ControladorAgenda::posponerCitaCtl(); ?>
	</form>
</div>

<div class="C__f oculto" id="usuarioEForm">
	<form method="post" class="f">
		<span class="f__x" id="usuarioEBtn-x"></span>
		<h2 class="f__title">Eliminar usuarios</h2>
		<div class="line-top"></div>
		<div class="i__group">
			<span class="label-checkbox">¿Eliminar los usuarios seleccionados?</span>
		</div>
		<input class="submit" type="button" id="usuarioEBtn-C" value="Aceptar">
	</form>
</div>

<?php } elseif ($cargo == 0) { ?>
	
<?php } ?>

<div class="C__f oculto" id="usuarioNForm">
	<form method="post" class="f">
		<span class="f__x" id="usuarioNBtn-x"></span>
		<h2 class="f__title">Nuevo usuario</h2>
		<div class="line-top"></div>
		<div class="iflex">
			<div class="i__group">
				<input class="textfield" type="text" id="usuarioNombre-N" name="usuarioNombre-N" autofocus required>
				<label class="labels" for="usuarioNombre-N">Nombre</label>
			</div>
			<div class="i__group">
				<input class="textfield" type="text" id="usuarioApellidos-N" name="usuarioApellidos-N" required>
				<label class="labels" for="usuarioApellidos-N">Apellidos</label>
			</div>
		</div>
		
		<div class="i__group">
			<input class="textfield" type="tel" name="usuarioTelefono-N" id="usuarioTelefono-N" required>
			<label class="labels" for="usuarioTelefono-N">Número de teléfono</label>
		</div>
		
		<div class="i__group">
			<select class="textfield" name="usuarioTipo-N" id="usuarioTipo-N" required>
				<option value="">Seleccione un cargo</option>
				<option value="1">Gerente</option>
				<option value="2">Doctor</option>
				<option value="3">Asistente</option>
				<option value="4">Recepcionista</option>
			</select>
			<label class="labels" for="usuarioTipo-N">Cargo</label>
		</div>

		<input type="hidden" name="usuarioId-N" id="usuarioId-N" required>
		<input class="submit" type="submit" value="Agregar">
		<?php //$posponerCita = ControladorAgenda::posponerCitaCtl(); ?>
	</form>
</div>
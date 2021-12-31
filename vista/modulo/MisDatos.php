<?php
	$idUsuario = $_SESSION["usuario"];
	$telefonos = Controlador::selTelefonosCtl($idUsuario);
	$correos = Controlador::selCorreosCtl($idUsuario);
	$domicilios = Controlador::selDomiciliosCtl($idUsuario);
?>
<div class="title">
	<h2>Mis Datos</h2>
</div>

<div class="C__Table center">
	<div class="Bar__Btns column w70">
		<span class="subtitle center">Teléfono</span>
		<div class="C__Btn">
			<input type="button" id="telefonoBtn-s" class="btn" value=" + Agregar teléfono">
		</div>
		<?php if (!$telefonos) : ?>
			<div class="nodata"><span>No hay teléfonos registrados</span></div>
		<?php else : foreach ($telefonos as $key => $value) : ?>
			
		<?php endforeach; endif; ?>
	</div>
	
	<div class="Bar__Btns column w70">
		<span class="subtitle center">Correo electrónico</span>
		<div class="C__Btn">
			<input type="button" id="correoNBtn-s" class="btn" value=" + Agregar Correo electrónico">
		</div>
		<?php if (!$correos) :  ?>
			<div class="nodata"><span>No hay Correos electrónicos registrados</span></div>
		<?php else : foreach ($correos as $key => $value) : ?>
			<div class="lista">
				<div class="listaItem">
					<span><?=$value["correo"]?></span>
					<div>
						<input class="btn link" id="correoABtn-s" type="button" value="Actualizar">
						<input class="btn link" id="correoEBtn-s" type="button" value="Eliminar">
					</div>
				</div>
			</div>
		<?php endforeach; endif; ?>
	</div>
	
	<div class="Bar__Btns column w70">
		<span class="subtitle center">Domicilio</span>
		<div class="C__Btn">
			<input type="button" id="domicilioBtn-s" class="btn" value=" + Agregar domicilio">
		</div>
		<?php if (!$domicilios) :  ?>
			<div class="nodata"><span>No hay domicilios registrados</span></div>
		<?php endif ?>
	</div>
</div>

<div class="C__f oculto" id="correoNForm">
	<form method="post" class="f">
		<span class="f__x" id="correoNBtn-x"></span>
		<h2 class="f__title">Nuevo Correo Electrónico</h2>
		<div class="i__group">
			<input class="textfield" type="email" name="correo-n" id="correo-n" required>
			<label class="labels" for="correo-n">Correo electrónico</label>
		</div>
		<div>
			<input type="hidden" name="correoIdPersona-n" id="correoIdPersona-n" value="<?=$idUsuario?>">
			<input class="submit" type="submit" value="Guardar">
			<?php Controlador::nuevoCorreoCtl(); ?>
		</div>
	</form>
</div>

<div class="C__f oculto" id="correoAForm">
	<form method="post" class="f">
		<span class="f__x" id="correoABtn-x"></span>
		<h2 class="f__title">Actualizar Correo Electrónico</h2>
		<div class="i__group">
			<input class="textfield" type="email" name="correo-a" id="correo-a" required>
			<label class="labels" for="correo-a">Correo electrónico</label>
		</div>
		<div>
			<input type="hidden" name="correoId-a" id="correoId-a" value="">
			<input class="submit" type="submit" value="Guardar">
			<?php //Controlador::actualizarCorreoCtl(); ?>
		</div>
	</form>
</div>

<div class="C__f oculto" id="correoEForm">
	<form method="post" class="f">
		<span class="f__x" id="correoEBtn-x"></span>
		<h2 class="f__title">Eliminar Correos Electrónicos</h2>
		<div class="line-top"></div>
		<div class="i__group">
			<span class="label-checkbox">¿Eliminar los correos electrónicos seleccionados?</span>
		</div>
		<input class="submit" type="button" id="correoEBtn-C" value="Aceptar">
	</form>
</div>
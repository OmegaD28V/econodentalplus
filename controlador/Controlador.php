<?php
	class Controlador{
		#Traer plantilla al index.
		static public function getPlantilla(){
			include 'vista/Plantilla.php';
		}
		
		#Traer las vistas.
		static public function getPaginaCtl(){
			if (isset($_GET["pagina"])) {
				$pagina = $_GET["pagina"];
			}else{
				$pagina = "index";
			}
			$respuesta = Pagina::getPagina($pagina);
			include $respuesta;
		}

		#Seleccionar correo electrónico del paciente o usuario para editar.
		static public function selCorreoCtl($idCorreo){
			$respuesta = CRUD::selCorreoBD($idCorreo);
			return $respuesta;
		}
		
		#Seleccionar teléfono del paciente o usuario para editar.
		static public function selTelefonoCtl($idTelefono){
			$respuesta = CRUD::selTelefonoBD($idTelefono);
			return $respuesta;
		}

		#Seleccionar domicili del paciente o usuario para editar.
		static public function selDomicilioCtl($idDomicilio){
			$respuesta = CRUD::selDomicilioBD($idDomicilio);
			return $respuesta;
		}

		#Seleccionar todos los correos electrónicos del paciente o usuario.
		static public function selCorreosCtl($idPersona){
			$respuesta = CRUD::selCorreosBD($idPersona);
			return $respuesta;
		}
		
		#Seleccionar todos los teléfonos del paciente o usuario.
		static public function selTelefonosCtl($idPersona){
			$respuesta = CRUD::selTelefonosBD($idPersona);
			return $respuesta;
		}
		
		#Seleccionar todos los domicilios del paciente o usuario.
		static public function selDomiciliosCtl($idPersona){
			$respuesta = CRUD::selDomiciliosBD($idPersona);
			return $respuesta;
		}
		
		#Agregar nuevo correo electrónico.
		static public function nuevoCorreoCtl(){
			if (
				isset($_POST["correo-n"]) && 
				isset($_POST["correoIdPersona-n"])
			) {
				if (Validacion::correosElectronicos($_POST["correo-n"], 30)) {
					$datosCorreo = array(
						"idPersona" => $_POST["correoIdPersona-n"], 
						"correo" => $_POST["correo-n"]
					);
					$hayCorreos = CRUD::hayCorreosBD($datosCorreo["idPersona"]);
					$hayCorreos["correos"] == 0 ? $estado = 2 : $estado = 1;
					if ($hayCorreos["correos"] < 2) {
						$respuesta = CRUD::nuevoCorreoBD($datosCorreo, $estado);
						if ($respuesta == true) {
							echo '<script>toast("¡Correo electrónico guardado!");</script>';
						} else {
							echo '<script>toast("Ocurrió un error al guardar el correo electrónico.");</script>';
						}
					} else {
						echo '<script>toast("Solo es posible guardar 2 correos electrónicos.");</script>';
					}
				} else {
					echo '<script>toast("Correo electrónico no válido, ejemplo: Alguien@ejemplo.com");</script>';
				}
			}
		}
		
		#Agregar nuevo teléfono.
		static public function nuevoTelefonoCtl(){
			if (
				isset($_POST["telNumero-n"]) && 
				isset($_POST["telTipo-n"]) && 
				isset($_POST["telIdPersona-n"])
			) {
				if (Validacion::enterosSinIntervalo($_POST["telNumero-n"], 10)) {
					$datosTelefono = array(
						"idPersona" => $_POST["telIdPersona-n"], 
						"telefono" => $_POST["telNumero-n"], 
						"tipo" => $_POST["telTipo-n"]
					);
					$hayTelefonos = CRUD::hayTelefonosBD($datosTelefono["idPersona"]);
					$hayTelefonos["telefonos"] == 0 ? $status = 2 : $status = 1;
					if ($hayTelefonos["telefonos"] < 2) {
						$respuesta = CRUD::nuevoTelefonoBD($datosTelefono, $status);
						if ($respuesta) {
							echo '<script>toast("¡Telefono guardado!");</script>';
						}else{
							echo '<script>toast("Ocurrió un error al guardar el teléfono.");</script>';
						}
					} else {
						echo '<script>toast("Solo es posible guardar 2 teléfonos.");</script>';
					}
					
				} else {
					echo '<script>toast("El teléfono debe contener 10 digitos");</script>';
				}
			}
		}

		#Agregar nuevo domicilio.
		static public function nuevoDomicilioCtl(){
			if (
				isset($_POST["domEstado-n"]) && 
				isset($_POST["domicilio-municipio-n"]) && 
				isset($_POST["domColonia-n"]) && 
				isset($_POST["domCalle-n"]) && 
				isset($_POST["domNumExt-n"]) && 
				isset($_POST["domNumInt-n"]) && 
				isset($_POST["domCalle1-n"]) && 
				isset($_POST["domCalle2-n"]) && 
				isset($_POST["domRef-n"]) && 
				isset($_POST["domIdPersona-n"])
			) {
				if (
					Validacion::nombresPropiosNumerados($_POST["domEstado-n"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domicilio-municipio-n"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domColonia-n"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domCalle-n"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domCalle1-n"], 0, 25) && 
					Validacion::nombresPropiosNumerados($_POST["domCalle2-n"], 0, 25) && 
					Validacion::enterosEnIntervalo($_POST["domNumExt-n"], 0, 5) && 
					Validacion::enterosEnIntervalo($_POST["domNumInt-n"], 0, 5) && 
					Validacion::descripciones($_POST["domRef-n"], 2, 50)
				) {
					$datosDomicilio = array(
						"idPersona" => $_POST["domIdPersona-n"], 
						"estado" => $_POST["domEstado-n"], 
						"municipio" => $_POST["domicilio-municipio-n"], 
						"colonia" => $_POST["domColonia-n"], 
						"calle" => $_POST["domCalle-n"], 
						"numExt" => $_POST["domNumExt-n"], 
						"numInt" => $_POST["domNumInt-n"], 
						"calle1" => $_POST["domCalle1-n"], 
						"calle2" => $_POST["domCalle2-n"], 
						"referencia" => $_POST["domRef-n"]
					);
					$hayDomicilios = CRUD::hayDomiciliosBD($datosDomicilio["idPersona"]);
					if ($hayDomicilios["domicilios"] < 2) {
						$hayDomicilios["domicilios"] == 0 ? $status = 2 : $status = 1;
						$respuesta = CRUD::nuevoDomicilioBD($datosDomicilio, $status);
						if ($respuesta) {
							echo '<script>toast("¡Domicilio guardado!");</script>';
						}else{
							echo '<script>toast("Ocurrió un error al guardar el Domicilio");</script>';
						}
					} else {
						echo '<script>toast("Solo es posible guardar 2 domicilios.");</script>';
					}
				} else {
					echo '<script>toast("Por favor, llene los campos con el formato solicitado.");</script>';
				}
			}
		}

		#Actualizar el correo electrónico.
		static public function actualizarCorreoCtl(){
			if (isset($_POST["correo-a"]) && isset($_POST["correoId-a"])) {
				if (Validacion::correosElectronicos($_POST["correo-a"], 30)) {
					$datosCorreo = array (
						"correoId" => $_POST["correoId-a"], 
						"correo" => $_POST["correo-a"]
					);
					$respuesta = CRUD::actualizarCorreoBD($datosCorreo);
					if ($respuesta) {
						echo '<script>toast("¡Correo electrónico guardado!");</script>';
					}else{
						echo '<script>toast("Ocurrió un error al guardar el correo electrónico.");</script>';
					}
				} else {
					echo '<script>toast("No válido usa el formato Alguien@ejemplo.com");</script>';
				}
			}
		}

		#Actualizar el teléfono.
		static public function actualizarTelefonoCtl(){
			if (
				isset($_POST["telNumero-a"]) && 
				isset($_POST["telTipo-a"]) && 
				isset($_POST["telId-a"])
			) {
				if (Validacion::enterosSinIntervalo($_POST["telNumero-a"], 10)) {
					$datosTelefono = array (
						"idTelefono" => $_POST["telId-a"], 
						"numero" => $_POST["telNumero-a"], 
						"tipo" => $_POST["telTipo-a"]
					);
	
					$respuesta = CRUD::actualizarTelefonoBD($datosTelefono);
					if ($respuesta) {
						echo '<script>toast("Teléfono actualizado");</script>';
					}else{
						echo '<script>toast("no se pudo actualizar el teléfono, revise sus datos");</script>';
					}
				} else {
					echo '<script>toast("Debe contener solo 10 digitos númericos");</script>';
				}
			}
		}
		
		#Actualizar el domicilio.
		static public function actualizarDomicilioCtl($idPersona){
			if (
				isset($_POST["domicilio-estado-edit"]) && 
				isset($_POST["domicilio-municipio-edit"]) && 
				isset($_POST["domicilio-colonia-edit"]) && 
				isset($_POST["domicilio-calle-edit"]) && 
				isset($_POST["domicilio-numero-e-edit"]) && 
				isset($_POST["domicilio-numero-i-edit"]) && 
				isset($_POST["domicilio-calle1-edit"]) && 
				isset($_POST["domicilio-calle2-edit"]) && 
				isset($_POST["domicilio-referencia-edit"]) && 
				isset($_POST["address-id-edit"])
			) {
				if (
					Validacion::nombresPropiosNumerados($_POST["domicilio-estado-edit"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domicilio-municipio-edit"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domicilio-colonia-edit"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domicilio-calle-edit"], 2, 50) && 
					Validacion::nombresPropiosNumerados($_POST["domicilio-calle1-edit"], 0, 25) && 
					Validacion::nombresPropiosNumerados($_POST["domicilio-calle2-edit"], 0, 25) && 
					Validacion::enterosEnIntervalo($_POST["domicilio-numero-e-edit"], 0, 5) && 
					Validacion::enterosEnIntervalo($_POST["domicilio-numero-i-edit"], 0, 5) && 
					Validacion::descripciones($_POST["domicilio-referencia-edit"], 2, 50)
				) {
					$datosDomicilioCliente = array(
						"domicilioId" => $_POST["address-id-edit"], 
						"estado" => $_POST["domicilio-estado-edit"], 
						"municipio" => $_POST["domicilio-municipio-edit"], 
						"colonia" => $_POST["domicilio-colonia-edit"], 
						"calle" => $_POST["domicilio-calle-edit"], 
						"numeroE" => $_POST["domicilio-numero-e-edit"], 
						"numeroI" => $_POST["domicilio-numero-i-edit"], 
						"calle1" => $_POST["domicilio-calle1-edit"], 
						"calle2" => $_POST["domicilio-calle2-edit"], 
						"referencia" => $_POST["domicilio-referencia-edit"], 
					);
	
					$respuesta = CRUD::actualizarDomicilioBD($datosDomicilioCliente);
					if ($respuesta) {
						echo '<script>toast("Domicilio actualizado");</script>';
					}else{
						echo '<script>toast("no se pudo actualizar el domicilio, revise sus datos");</script>';
					}
				} else {
					echo '<script>toast("Debe llenar todos los campos correctamente.");</script>';
				}
			}
		}
		
		#Deshabilitar un correo electrónico.
		static public function eliminarCorreoCtl(){
			if (isset($_POST["correoId-e"])) {
				$idCorreo = $_POST["correoId-e"];
				$respuesta = CRUD::eliminarCorreoBD($idCorreo);
				if ($respuesta) {
					echo '<script>toast("¡Correo electrónico eliminado!");</script>';
				}else{
					echo '<script>toast("Ocurrió un error al eliminar el correo electrónico.");</script>';
				}
			}
		}
		
		#Deshabilitar un teléfono.
		static public function eliminarTelefonoCtl(){
			if (isset($_POST["telId-e"])) {
				$idTelefono = $_POST["telId-e"];
				$respuesta = CRUD::eliminarTelefonoBD($idTelefono);
				if ($respuesta) {
					echo '<script>toast("¡Teléfono eliminado!");</script>';
				}else{
					echo '<script>toast("Ocurrió un error al eliminar el teléfono.");</script>';
				}
			}
		}
		
		#Deshabilitar uno o más correos electrónicos de clientes o usuarios.
		static public function eliminarCorreosCtl($correos){
			$respuestas = array();
			$conclusion = true;
			for ($i = 0; $i < sizeof($correos); $i++) {
				$respuesta = CRUD::eliminarCorreoBD($correos[$i]);
				if ($respuesta == false) {
					$respuestas[$i] = false;
				}
			}
			
			for ($i = 0; $i < sizeof($respuestas); $i++) {
				if ($respuestas[$i] == false) {
					$conclusion = false;
				}
			}
			return $conclusion;
		}
		
		#Deshabilitar uno o más teléfonos de clientes o usuarios.
		static public function eliminarTelefonosCtl($telefonos){
			$respuestas = array();
			$conclusion = true;
			for ($i = 0; $i < sizeof($telefonos); $i++) {
				$respuesta = CRUD::eliminarTelefonoBD($telefonos[$i]);
				if ($respuesta == false) {
					$respuestas[$i] = false;
				}
			}
			
			for ($i = 0; $i < sizeof($respuestas); $i++) {
				if ($respuestas[$i] == false) {
					$conclusion = false;
				}
			}
			return $conclusion;
		}
		
		#Deshabilitar uno o más domicilios de clientes o usuarios.
		static public function eliminarDomiciliosCtl($domicilios){
			$respuestas = array();
			$conclusion = true;
			for ($i = 0; $i < sizeof($domicilios); $i++) {
				$respuesta = CRUD::eliminarDomicilioBD($domicilios[$i]);
				if ($respuesta == false) {
					$respuestas[$i] = false;
				}
			}
			
			for ($i = 0; $i < sizeof($respuestas); $i++) {
				if ($respuestas[$i] == false) {
					$conclusion = false;
				}
			}
			return $conclusion;
		}

		#Establecer información de contacto de cliente o ususario como principal.
		static public function asMainElementCtl($idElemento, $tabla) {
			$respuesta = CRUD::asMainElementBD($idElemento, $tabla);
			return $respuesta;
		}
	}
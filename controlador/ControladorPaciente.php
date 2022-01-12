<?php
	class ControladorPaciente{
		// #Buscar Pacientes.
		// static public function buscarPacientesCtl($buscar) {
		// 	$respuesta = CRUDPaciente::buscarPacientesBD($buscar);
		// 	return $respuesta;
		// }

		#Seleccionar los Pacientes 
		static public function selPacientesCtl(){
			$respuesta = CRUDPaciente::selPacientesBD();
			return $respuesta;
		}
		
		#Contar los Pacientes 
		static public function contarPacientesCtl(){
			$respuesta = CRUDPaciente::contarPacientesBD();
			return $respuesta;
		}

		// // #Seleccionar estado de conexión de los Pacientes activos.
		// // static public function seleccionarConexionPacientesCtl(){
		// // 	$respuesta = CRUDPaciente::seleccionarConexionPacientesBD();
		// // 	return $respuesta;
		// // }

		// #Recuperar datos de Paciente.
		// static public function datosPacienteCtl($idPaciente){
		// 	$respuesta = CRUDPaciente::datosPacienteBD($idPaciente);
		// 	return $respuesta;
		// }

		// // #Seleccionar todos los Pacientes de tipo médico.
		// // static public function medicosCtl() {
		// // 	$respuesta = CRUDPaciente::medicosBD();
		// // 	return $respuesta;
		// // }

		// #Actualizar datos de Paciente.
		// static public function actualizarPacienteCtl(){
		// 	if (
		// 		isset($_POST["idPaciente-A"]) && 
		// 		isset($_POST["PacienteNombre-A"]) && 
		// 		isset($_POST["PacienteApellidos-A"]) && 
		// 		isset($_POST["PacienteCargo-A"])
		// 		) {
		// 		if (
		// 			Validacion::nombresPropios($_POST["PacienteNombre-A"], 2, 30) && 
		// 			Validacion::nombresPropios($_POST["PacienteApellidos-A"], 2, 50)
		// 		) {
		// 			$datosPaciente = array(
		// 				"idPaciente" => $_POST["idPaciente-A"], 
		// 				"nombre" => $_POST["PacienteNombre-A"], 
		// 				"apellidos" => $_POST["PacienteApellidos-A"], 
		// 				"cargo" => $_POST["PacienteCargo-A"]
		// 			);
		// 			$respuesta = CRUDPaciente::actualizarPacienteBD($datosPaciente);
		// 			if($respuesta) {
		// 				echo '<script>toast("Datos actualizados");</script>
		// 				';
		// 			}else{
		// 				echo '<script>toast("Error al actualizar");</script>
		// 				';
		// 			}
		// 		} else {
		// 			echo '<script>toast("Debe llenar todos los campos correctamente.");</script>';
		// 		}
				
		// 	}
		// }

		// // #Actualizar contraseña de Paciente.
		// // static public function actualizarPicCtl(){
		// // 	if (
		// // 		isset($_POST["PacienteId"]) && 
		// // 		isset($_POST["contrasena-old"]) && 
		// // 		isset($_POST["contrasena-edit"])
		// // 		) {
		// // 		if (Validacion::contrasenas($_POST["contrasena-edit"], 30)) {
		// // 			$picOld = Pic::progPic($_POST["contrasena-old"]);
		// // 			$picNew = Pic::progPic($_POST["contrasena-edit"]);
		// // 			$datosPic = array(
		// // 				"PacienteId" => $_POST["PacienteId"], 
		// // 				"contrasenaOld" => $picOld, 
		// // 				"contrasenaNew" => $picNew
		// // 			);
		// // 			$PicOld = CRUDPaciente::verificarPicOldBD($datosPic);
		// // 			if ($PicOld == null) {
		// // 				echo '<script>toast("La contraseña anterior no es válida");</script>';
		// // 			} else {
		// // 				$respuesta =CRUDPaciente::actualizarPicBD($datosPic);
		// // 				if($respuesta) {
		// // 					echo '
		// // 						<script>
		// // 							window.location = "index.php?pagina=Pacientes";
		// // 							alert("Datos actualizados");
		// // 						</script>
		// // 					';
		// // 				}else{
		// // 					echo '
		// // 						<script>
		// // 							alert("Error al actualizar");
		// // 							window.location = "index.php?pagina=Pacientes";
		// // 						</script>
		// // 					';
		// // 				}   
		// // 			}
		// // 		} else {
		// // 			echo '<script>alert("Debe llenar todos los campos correctamente.");</script>';
		// // 		}
				
		// // 	}
		// // }

		// #Abrir la sesión de Paciente.
		// static public function iniciarSesionCtl(){
		// 	if (isset($_POST["Paciente"]) && isset($_POST["contrasena"])) {
		// 		$pic = Pic::progPic($_POST["contrasena"]);
		// 		$respuesta = CRUDPaciente::iniciarSesionBD($_POST["Paciente"], $pic);
		// 		if ($respuesta["Paciente"] == null) {
		// 			echo '<script>toast("Datos incorrectos!.");</script>';
		// 		}elseif ($respuesta["Paciente"] == $_POST["Paciente"] && $respuesta["contrasena"] == $pic) {
		// 			$existePaciente = CRUDPaciente::existePacienteBD($respuesta["idPaciente"]);
		// 			if ($existePaciente["nombre"] != null) {
		// 				$datosPaciente = CRUDPaciente::seleccionarPacienteSesionBD($respuesta["idPaciente"]);
		// 				$conectarPaciente = CRUDPaciente::conectarPacienteBD($respuesta["idPaciente"]);
		// 				if ($datosPaciente["nombre"] == null) {
		// 					echo '<script>window.location = "IniciarSesion";</script>';
		// 				}elseif ($datosPaciente["idPaciente"] == $respuesta["idPaciente"] && $conectarPaciente == true) {
		// 					$_SESSION["ingresado"] = $datosPaciente["nombre"];
		// 					$_SESSION["Paciente"] = $datosPaciente["idPaciente"];
		// 					$_SESSION["tipo-Paciente"] = $datosPaciente["tipoPaciente"];
		// 					echo '<script>window.location = "Inicio";</script>';
		// 				}
		// 			} else {
		// 				echo '<script>toast("Datos incorrectos!.");</script>';
		// 			}
		// 		}
		// 	}
		// }
		
		// // #Cerrar la sesión de Paciente.
		// static public function desconectarPacienteCtl($idPaciente){
		// 	$desconectar = CRUDPaciente::desconectarPacienteBD($idPaciente);
		// 	return $desconectar;
		// }

		// #Crear cuenta de Paciente.
		// static public function crearCuentaCtl(){
		// 	if (
		// 		isset($_POST["PacienteNombre-N"]) && 
		// 		isset($_POST["PacienteApellidos-N"]) && 
		// 		isset($_POST["Paciente-N"]) && 
		// 		isset($_POST["PacientePwd-N"]) && 
		// 		isset($_POST["PacienteCargo-N"])
		// 		) {
		// 		if (CRUDPaciente::validarPacienteBD($_POST["Paciente-N"]) != null) {
		// 			echo '<script>toast("Debe elegir otro nombre de Paciente");</script>';
		// 		} else {
		// 			if (
		// 				Validacion::nombresPropios($_POST["PacienteNombre-N"], 2, 30) && 
		// 				Validacion::nombresPropios($_POST["PacienteApellidos-N"], 2, 50) && 
		// 				Validacion::nombresPacientes($_POST["Paciente-N"], 2, 30) && 
		// 				Validacion::contrasenas($_POST["PacientePwd-N"], 8)
		// 			) {
		// 				$pic = Pic::progPic($_POST["PacientePwd-N"]);
		// 				$datosPaciente = array(
		// 					"nombre" => $_POST["PacienteNombre-N"], 
		// 					"apellidos" => $_POST["PacienteApellidos-N"], 
		// 					"Paciente" => $_POST["Paciente-N"], 
		// 					"contrasena" => $pic, 
		// 					"tipoPaciente" => $_POST["PacienteCargo-N"]
		// 				);
		// 				$crearPacienteYCuenta = CRUDPaciente::crearCuentaBD($datosPaciente);
		// 				if ($crearPacienteYCuenta) {
		// 					echo '<script>toast("Paciente creado");</script>
		// 						';
		// 				}else{
		// 					echo '<script>toast("Ha ocurrido un error consulte al desarrollador");</script>
		// 						';
		// 				}
		// 			} else {
		// 				echo '<script>toast("Debe llenar todos los campos correctamente.");</script>';
		// 			}
		// 		}
		// 	}
		// }

		// #Deshabilitar uno o más Pacientes.
		// static public function eliminarPacientesCtl($Pacientes){
		// 	$respuestas = array();
		// 	$conclusion = true;
		// 	for ($i = 0; $i < sizeof($Pacientes); $i++) {
		// 		$respuesta = CRUDPaciente::eliminarPacientesBD($Pacientes[$i]);
		// 		if ($respuesta == false) {
		// 			$respuestas[$i] = false;
		// 		}
		// 	}
			
		// 	for ($i = 0; $i < sizeof($respuestas); $i++) {
		// 		if ($respuestas[$i] == false) {
		// 			$conclusion = false;
		// 		}
		// 	}
		// 	return $conclusion;
		// }
	}
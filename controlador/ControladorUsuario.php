<?php
	class ControladorUsuario{
		#Buscar usuarios.
		public function buscarUsuariosCtl($buscar) {
			$respuesta = CRUDUsuario::buscarUsuariosBD($buscar);
			return $respuesta;
		}

		#Seleccionar los usuarios 
		public function selUsuariosCtl(){
			$respuesta = CRUDUsuario::selUsuariosBD();
			return $respuesta;
		}
		
		#Contar los usuarios 
		public function contarUsuariosCtl(){
			$respuesta = CRUDUsuario::contarUsuariosBD();
			return $respuesta;
		}

		// #Seleccionar estado de conexión de los usuarios activos.
		// public function seleccionarConexionUsuariosCtl(){
		// 	$respuesta = CRUDUsuario::seleccionarConexionUsuariosBD();
		// 	return $respuesta;
		// }

		#Recuperar datos de usuario.
		public function datosUsuarioCtl($idUsuario){
			$respuesta = CRUDUsuario::datosUsuarioBD($idUsuario);
			return $respuesta;
		}

		// #Seleccionar todos los usuarios de tipo médico.
		// public function medicosCtl() {
		// 	$respuesta = CRUDUsuario::medicosBD();
		// 	return $respuesta;
		// }

		#Actualizar datos de usuario.
		public function actualizarUsuarioCtl(){
			if (
				isset($_POST["idUsuario-A"]) && 
				isset($_POST["usuarioNombre-A"]) && 
				isset($_POST["usuarioApellidos-A"]) && 
				isset($_POST["usuarioCargo-A"])
				) {
				if (
					Validacion::nombresPropios($_POST["usuarioNombre-A"], 2, 30) && 
					Validacion::nombresPropios($_POST["usuarioApellidos-A"], 2, 50)
				) {
					$datosUsuario = array(
						"idUsuario" => $_POST["idUsuario-A"], 
						"nombre" => $_POST["usuarioNombre-A"], 
						"apellidos" => $_POST["usuarioApellidos-A"], 
						"cargo" => $_POST["usuarioCargo-A"]
					);
					$respuesta = CRUDUsuario::actualizarUsuarioBD($datosUsuario);
					if($respuesta) {
						echo '<script>toast("Datos actualizados");</script>
						';
					}else{
						echo '<script>toast("Error al actualizar");</script>
						';
					}
				} else {
					echo '<script>toast("Debe llenar todos los campos correctamente.");</script>';
				}
				
			}
		}

		// #Actualizar contraseña de usuario.
		// public function actualizarPicCtl(){
		// 	if (
		// 		isset($_POST["usuarioId"]) && 
		// 		isset($_POST["contrasena-old"]) && 
		// 		isset($_POST["contrasena-edit"])
		// 		) {
		// 		if (Validacion::contrasenas($_POST["contrasena-edit"], 30)) {
		// 			$picOld = Pic::progPic($_POST["contrasena-old"]);
		// 			$picNew = Pic::progPic($_POST["contrasena-edit"]);
		// 			$datosPic = array(
		// 				"usuarioId" => $_POST["usuarioId"], 
		// 				"contrasenaOld" => $picOld, 
		// 				"contrasenaNew" => $picNew
		// 			);
		// 			$PicOld = CRUDUsuario::verificarPicOldBD($datosPic);
		// 			if ($PicOld == null) {
		// 				echo '<script>toast("La contraseña anterior no es válida");</script>';
		// 			} else {
		// 				$respuesta =CRUDUsuario::actualizarPicBD($datosPic);
		// 				if($respuesta) {
		// 					echo '
		// 						<script>
		// 							window.location = "index.php?pagina=Usuarios";
		// 							alert("Datos actualizados");
		// 						</script>
		// 					';
		// 				}else{
		// 					echo '
		// 						<script>
		// 							alert("Error al actualizar");
		// 							window.location = "index.php?pagina=Usuarios";
		// 						</script>
		// 					';
		// 				}   
		// 			}
		// 		} else {
		// 			echo '<script>alert("Debe llenar todos los campos correctamente.");</script>';
		// 		}
				
		// 	}
		// }

		#Abrir la sesión de usuario.
		public function iniciarSesionCtl(){
			if (isset($_POST["usuario"]) && isset($_POST["contrasena"])) {
				$pic = Pic::progPic($_POST["contrasena"]);
				$respuesta = CRUDUsuario::iniciarSesionBD($_POST["usuario"], $pic);
				if ($respuesta["usuario"] == null) {
					echo '<script>toast("Datos incorrectos!.");</script>';
				}elseif ($respuesta["usuario"] == $_POST["usuario"] && $respuesta["contrasena"] == $pic) {
					$existeUsuario = CRUDUsuario::existeUsuarioBD($respuesta["idUsuario"]);
					if ($existeUsuario["nombre"] != null) {
						$datosUsuario = CRUDUsuario::seleccionarUsuarioSesionBD($respuesta["idUsuario"]);
						$conectarUsuario = CRUDUsuario::conectarUsuarioBD($respuesta["idUsuario"]);
						if ($datosUsuario["nombre"] == null) {
							echo '<script>window.location = "IniciarSesion";</script>';
						}elseif ($datosUsuario["idUsuario"] == $respuesta["idUsuario"] && $conectarUsuario == true) {
							$_SESSION["ingresado"] = $datosUsuario["nombre"];
							$_SESSION["usuario"] = $datosUsuario["idUsuario"];
							$_SESSION["tipo-usuario"] = $datosUsuario["tipoUsuario"];
							echo '<script>window.location = "Inicio";</script>';
						}
					} else {
						echo '<script>toast("Datos incorrectos!.");</script>';
					}
				}
			}
		}
		
		// #Cerrar la sesión de usuario.
		public function desconectarUsuarioCtl($idUsuario){
			$desconectar = CRUDUsuario::desconectarUsuarioBD($idUsuario);
			return $desconectar;
		}

		#Crear cuenta de usuario.
		public function crearCuentaCtl(){
			if (
				isset($_POST["usuarioNombre-N"]) && 
				isset($_POST["usuarioApellidos-N"]) && 
				isset($_POST["usuario-N"]) && 
				isset($_POST["usuarioPwd-N"]) && 
				isset($_POST["usuarioCargo-N"])
				) {
				if (CRUDUsuario::validarUsuarioBD($_POST["usuario-N"]) != null) {
					echo '<script>toast("Debe elegir otro nombre de usuario");</script>';
				} else {
					if (
						Validacion::nombresPropios($_POST["usuarioNombre-N"], 2, 30) && 
						Validacion::nombresPropios($_POST["usuarioApellidos-N"], 2, 50) && 
						Validacion::nombresUsuarios($_POST["usuario-N"], 2, 30) && 
						Validacion::contrasenas($_POST["usuarioPwd-N"], 8)
					) {
						$pic = Pic::progPic($_POST["usuarioPwd-N"]);
						$datosUsuario = array(
							"nombre" => $_POST["usuarioNombre-N"], 
							"apellidos" => $_POST["usuarioApellidos-N"], 
							"usuario" => $_POST["usuario-N"], 
							"contrasena" => $pic, 
							"tipoUsuario" => $_POST["usuarioCargo-N"]
						);
						$crearUsuarioYCuenta = CRUDUsuario::crearCuentaBD($datosUsuario);
						if ($crearUsuarioYCuenta) {
							echo '<script>toast("Usuario creado");</script>
								';
						}else{
							echo '<script>toast("Ha ocurrido un error consulte al desarrollador");</script>
								';
						}
					} else {
						echo '<script>toast("Debe llenar todos los campos correctamente.");</script>';
					}
				}
			}
		}

		#Deshabilitar uno o más usuarios.
		public function eliminarUsuariosCtl($usuarios){
			$respuestas = array();
			$conclusion = true;
			for ($i = 0; $i < sizeof($usuarios); $i++) {
				$respuesta = CRUDUsuario::eliminarUsuariosBD($usuarios[$i]);
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
	}
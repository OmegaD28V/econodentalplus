<?php 
	// require_once '../modelo/CRUD.php';
	require_once '../modelo/CRUDUsuario.php';
	// require_once 'Controlador.php';
	require_once 'ControladorUsuario.php';
	require_once '../modelo/CRUDAgenda.php';
	require_once 'ControladorAgenda.php';

	class Ajax{
		// public $usuarioElegido;
		// public $clienteElegido;
		public $cancelarCitas;
		// public $usuariosElegidosEliminar;
		// public $mascotasElegidosEliminar;
		// public $correosClienteEliminar;
		// public $telefonosClienteEliminar;
		// public $domiciliosClienteEliminar;
		// public $petInfoEliminar;
		
		// public $requestClientEdit;
		public $datosCita;
		// public $requestClientDataEdit;
		// public $requestPetDataEdit;
		// public $asMain;

		// public $datosMascota;

		// public $grafica;
		// public $selectRaza;
		public $buscar;

		#Recuperar fecha de cita para editar o posponer.
		public function fechaCitaAjax(){
			$dato = $this -> datosCita;
			$respuesta = ControladorAgenda::fechaCitaCtl($dato);
			echo json_encode($respuesta);
		}
		
		// #Recuperar datos de cliente para editarlos.
		// public function datosClienteAjax(){
		// 	$dato = $this -> requestClientEdit;
		// 	$respuesta = ControladorCliente::datosClienteCtl($dato);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar estado de conexión de los usuarios activos de la base de datos.
		// public function seleccionarConexionUsuariosAjax(){
		// 	$respuesta = ControladorUsuario::seleccionarConexionUsuariosCtl();
		// 	echo json_encode($respuesta);
		// }
		
		#Cancelar una o más citas.
		public function cancelarCitasAjax(){
			$datos = $this -> cancelarCitas;
			$respuesta = ControladorAgenda::cancelarCitasCtl($datos);
			echo $respuesta;
		}
		
		// #Deshabilitar uno o más correos de clientes.
		// public function eliminarCorreosAjax(){
		// 	$datos = $this -> correosClienteEliminar;
		// 	$respuesta = Controlador::eliminarCorreosCtl($datos);
		// 	echo $respuesta;
		// }
		
		// #Deshabilitar uno o más teléfonos de clientes.
		// public function eliminarTelefonosAjax(){
		// 	$datos = $this -> telefonosClienteEliminar;
		// 	$respuesta = Controlador::eliminarTelefonosCtl($datos);
		// 	echo $respuesta;
		// }
		
		// #Deshabilitar uno o más domicilios de clientes.
		// public function eliminarDomiciliosAjax(){
		// 	$datos = $this -> domiciliosClienteEliminar;
		// 	$respuesta = Controlador::eliminarDomiciliosCtl($datos);
		// 	echo $respuesta;
		// }
		
		// #Deshabilitar uno o más usuarios.
		// public function eliminarUsuariosAjax(){
		// 	$datos = $this -> usuariosElegidosEliminar;
		// 	$respuesta = ControladorUsuario::eliminarUsuariosCtl($datos);
		// 	echo json_encode($respuesta);
		// }
		
		// #Deshabilitar una o más mascotas.
		// public function eliminarMascotasAjax(){
		// 	$datos = $this -> mascotasElegidosEliminar;
		// 	$respuesta = ControladorMascota::eliminarMascotasCtl($datos);
		// 	echo json_encode($respuesta);
		// }
		
		// #Deshabilitar una o más jaulas.
		// public function eliminarJaulasAjax(){
		// 	$datos = $this -> petInfoEliminar;
		// 	$respuesta = ControladorMascota::eliminarJaulasCtl($datos);
		// 	echo json_encode($respuesta);
		// }
		
		// #Deshabilitar una o más razas.
		// public function eliminarRazasAjax(){
		// 	$datos = $this -> petInfoEliminar;
		// 	$respuesta = ControladorMascota::eliminarRazasCtl($datos);
		// 	echo json_encode($respuesta);
		// }

		// #Seleccionar correo electrónico del cliente para editar.
		// public function seleccionarCorreoAjax(){
		// 	$requestCD = $this -> requestClientDataEdit;
		// 	$respuesta = Controlador::seleccionarCorreoCtl($requestCD);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar teléfono del cliente para editar.
		// public function seleccionarTelefonoAjax(){
		// 	$requestCD = $this -> requestClientDataEdit;
		// 	$respuesta = Controlador::seleccionarTelefonoCtl($requestCD);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar domicilio del cliente para editar.
		// public function seleccionarDomicilioAjax(){
		// 	$requestCD = $this -> requestClientDataEdit;
		// 	$respuesta = Controlador::seleccionarDomicilioCtl($requestCD);
		// 	echo json_encode($respuesta);
		// }

		// #Seleccionar mascota para editar.
		// public function seleccionarMascotaAjax(){
		// 	$mascotaId = $this -> requestPetDataEdit;
		// 	$respuesta = ControladorMascota::infoMascotaCtl($mascotaId);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar jaula para editar.
		// public function seleccionarJaulaAjax(){
		// 	$requestCD = $this -> requestPetDataEdit;
		// 	$respuesta = ControladorMascota::seleccionarJaulaCtl($requestCD);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar datos de raza para editar.
		// public function seleccionarDatosRazaAjax(){
		// 	$requestCD = $this -> requestPetDataEdit;
		// 	$respuesta = ControladorMascota::seleccionarDatosRazaCtl($requestCD);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar los atributos de la mascota.
		// public function seleccionarAtributosAjax(){
		// 	$mascotaId = $this -> grafica;
		// 	$respuesta = ControladorMascota::seleccionarAtributosCtl($mascotaId);
		// 	echo json_encode($respuesta);
		// }
		
		// #Seleccionar las razas de la especie obtenida.
		// public function seleccionarRazasByEspecieAjax(){
		// 	$requestCD = $this -> selectRaza;
		// 	$respuesta = ControladorMascota::seleccionarRazasByEspecieCtl($requestCD);
		// 	echo json_encode($respuesta);
		// }
		
		// #Establecer correo electrónico como principal.
		// public function asMainElementAjax($tabla){
		// 	$elementId = $this -> asMain;
		// 	$respuesta = Controlador::asMainElementCtl($elementId, $tabla);
		// 	echo json_encode($respuesta);
		// }
		
		// #Obtener la información de una mascota para mostrarla en el registro de consulta.
		// public function datosMascotaAjax(){
		// 	$mascotaId = $this -> datosMascota;
		// 	$respuesta = ControladorMascota::datosMascotaCtl($mascotaId);
		// 	echo json_encode($respuesta);
		// }
		
		#Buscar citas.
		public function buscarCitasAjax(){
			$buscar = $this -> buscar;
			$respuesta = ControladorAgenda::buscarCitasCtl($buscar);
			echo json_encode($respuesta);
		}
		
		#Buscar usuario.
		public function buscarUsuariosAjax(){
			$buscar = $this -> buscar;
			$respuesta = ControladorUsuario::buscarUsuariosCtl($buscar);
			echo json_encode($respuesta);
		}
		
		// #Buscar usuario.
		// public function buscarMascotaAjax(){
		// 	$buscar = $this -> buscar;
		// 	$respuesta = $buscar;
		// 	$respuesta = ControladorMascota::buscarMascotaCtl($buscar);
		// 	echo json_encode($respuesta);
		// }
		
		// #Buscar raza.
		// public function buscarRazaAjax(){
		// 	$buscar = $this -> buscar;
		// 	$respuesta = ControladorMascota::buscarRazaCtl($buscar);
		// 	echo json_encode($respuesta);
		// }
		
		// #Buscar jaula.
		// public function buscarJaulaAjax(){
		// 	$buscar = $this -> buscar;
		// 	$respuesta = ControladorMascota::buscarJaulaCtl($buscar);
		// 	echo json_encode($respuesta);
		// }
	}
	
	if (isset($_POST["cancelarCitas"])) {
		$objIdEliminar = new Ajax();
		$objIdEliminar -> cancelarCitas = json_decode($_POST["cancelarCitas"]);
		$objIdEliminar -> cancelarCitasAjax();
	}
	
	// if (isset($_POST["usersToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> usuariosElegidosEliminar = json_decode($_POST["usersToDelete"]);
	// 	$objIdEliminar -> eliminarUsuariosAjax();
	// }
	
	// if (isset($_POST["petsToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> mascotasElegidosEliminar = json_decode($_POST["petsToDelete"]);
	// 	$objIdEliminar -> eliminarMascotasAjax();
	// }
	
	// if (isset($_POST["emailsClientToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> correosClienteEliminar = json_decode($_POST["emailsClientToDelete"]);
	// 	$objIdEliminar -> eliminarCorreosAjax();
	// }
	
	// if (isset($_POST["phonesClientToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> telefonosClienteEliminar = json_decode($_POST["phonesClientToDelete"]);
	// 	$objIdEliminar -> eliminarTelefonosAjax();
	// }
	
	// if (isset($_POST["addressClientToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> domiciliosClienteEliminar = json_decode($_POST["addressClientToDelete"]);
	// 	$objIdEliminar -> eliminarDomiciliosAjax();
	// }
	
	// if (isset($_POST["jaulasToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> petInfoEliminar = json_decode($_POST["jaulasToDelete"]);
	// 	$objIdEliminar -> eliminarJaulasAjax();
	// }
	
	// if (isset($_POST["razasToDelete"])) {
	// 	$objIdEliminar = new Ajax();
	// 	$objIdEliminar -> petInfoEliminar = json_decode($_POST["razasToDelete"]);
	// 	$objIdEliminar -> eliminarRazasAjax();
	// }
	
	// if (isset($_POST["estado-usuarios"])) {
	// 	$objEstadoUsuarios = new Ajax();
	// 	$objEstadoUsuarios -> seleccionarConexionUsuariosAjax();
	// }
	
	// if (isset($_POST["correo-id-edit"])) {
	// 	$objRequestClientDataEdit = new Ajax();
	// 	$objRequestClientDataEdit -> requestClientDataEdit = $_POST["correo-id-edit"];
	// 	$objRequestClientDataEdit -> seleccionarCorreoAjax();
	// }
	
	// if (isset($_POST["phone-id-edit"])) {
	// 	$objRequestClientDataEdit = new Ajax();
	// 	$objRequestClientDataEdit -> requestClientDataEdit = $_POST["phone-id-edit"];
	// 	$objRequestClientDataEdit -> seleccionarTelefonoAjax();
	// }
	
	// if (isset($_POST["address-id-edit"])) {
	// 	$objRequestClientDataEdit = new Ajax();
	// 	$objRequestClientDataEdit -> requestClientDataEdit = $_POST["address-id-edit"];
	// 	$objRequestClientDataEdit -> seleccionarDomicilioAjax();
	// }
	
	// if (isset($_POST["clienteId-edit"])) {
	// 	$objRequestClientEdit = new Ajax();
	// 	$objRequestClientEdit -> requestClientEdit = $_POST["clienteId-edit"];
	// 	$objRequestClientEdit -> datosClienteAjax();
	// }
	
	if (isset($_POST["idPosponer"])) {
		$objdatosCita = new Ajax();
		$objdatosCita -> datosCita = $_POST["idPosponer"];
		$objdatosCita -> fechaCitaAjax();
	}

	// if (isset($_POST["petId-edit"])) {
	// 	$petEdit = new Ajax();
	// 	$petEdit -> requestPetDataEdit = $_POST["petId-edit"];
	// 	$petEdit -> seleccionarMascotaAjax();
	// }
	
	// if (isset($_POST["jaulaId-edit"])) {
	// 	$objJaulaEdit = new Ajax();
	// 	$objJaulaEdit -> requestPetDataEdit = $_POST["jaulaId-edit"];
	// 	$objJaulaEdit -> seleccionarJaulaAjax();
	// }
	
	// if (isset($_POST["razaId-edit"])) {
	// 	$objRazaEdit = new Ajax();
	// 	$objRazaEdit -> requestPetDataEdit = $_POST["razaId-edit"];
	// 	$objRazaEdit -> seleccionarDatosRazaAjax();
	// }
	
	// if (isset($_POST["graficaMascota"])) {
	// 	$objGrafica = new Ajax();
	// 	$objGrafica -> grafica = $_POST["graficaMascota"];
	// 	$objGrafica -> seleccionarAtributosAjax();
	// }
	
	// if (isset($_POST["select-raza"])) {
	// 	$objSelectRaza = new Ajax();
	// 	$objSelectRaza -> selectRaza = $_POST["select-raza"];
	// 	$objSelectRaza -> seleccionarRazasByEspecieAjax();
	// }
	
	// if (isset($_POST["asmain-email"])) {
	// 	$objAsMain = new Ajax();
	// 	$objAsMain -> asMain = $_POST["asmain-email"];
	// 	$objAsMain -> asMainElementAjax("user_correo");
	// }
	
	// if (isset($_POST["asmain-phone"])) {
	// 	$objAsMain = new Ajax();
	// 	$objAsMain -> asMain = $_POST["asmain-phone"];
	// 	$objAsMain -> asMainElementAjax("user_telefono");
	// }
	
	// if (isset($_POST["asmain-address"])) {
	// 	$objAsMain = new Ajax();
	// 	$objAsMain -> asMain = $_POST["asmain-address"];
	// 	$objAsMain -> asMainElementAjax("user_domicilio");
	// }
	
	// if (isset($_POST["pet-id-add-consult"])) {
	// 	$objInfoPet = new Ajax();
	// 	$objInfoPet -> datosMascota = $_POST["pet-id-add-consult"];
	// 	$objInfoPet -> datosMascotaAjax();
	// }
	
	if (isset($_POST["buscarCitas"])) {
		$objbuscar = new Ajax();
		$objbuscar -> buscar = $_POST["buscarCitas"];
		$objbuscar -> buscarCitasAjax();
	}
	
	if (isset($_POST["buscarUsuarios"])) {
		$objbuscar = new Ajax();
		$objbuscar -> buscar = $_POST["buscarUsuarios"];
		$objbuscar -> buscarUsuariosAjax();
	}
	
	// if (isset($_POST["buscar-pet"])) {
	// 	$objbuscar = new Ajax();
	// 	$objbuscar -> buscar = json_decode($_POST["buscar-pet"]);
	// 	$objbuscar -> buscarMascotaAjax();
	// }
	
	// if (isset($_POST["buscar-raza"])) {
	// 	$objbuscar = new Ajax();
	// 	$objbuscar -> buscar = $_POST["buscar-raza"];
	// 	$objbuscar -> buscarRazaAjax();
	// }
	
	// if (isset($_POST["buscar-jaula"])) {
	// 	$objbuscar = new Ajax();
	// 	$objbuscar -> buscar = $_POST["buscar-jaula"];
	// 	$objbuscar -> buscarJaulaAjax();
	// }
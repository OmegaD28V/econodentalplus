<?php
	require_once 'Conexion.php';
	class CRUDAgenda {
		#Buscar citas en la base de datos.
		public function buscarCitasBD($buscar){
			$sql = Conexion::conectar() -> prepare(
				"SELECT idCita, nombre, apellidos, telefono, 
				date_format(fechaCita, '%d-%b-%Y %H:%i hrs') fechaCita 
				FROM cita 
				WHERE (nombre LIKE '%$buscar%' 
				OR apellidos LIKE '%$buscar%' 
				OR fechaCita LIKE '%$buscar%') 
				AND estado = 1 ORDER BY fechaCita ASC;"
			);
			$sql -> execute();
			return $sql -> fetchAll();
			$sql -> close();
			$sql = null;
		}

		#Vista de las citas existentes.
		public function selCitasBD() {
			$sql = Conexion::conectar() -> prepare(
				"SELECT *, date_format(fechaCita, '%d-%b-%Y %H:%i hrs') fechaCita 
				FROM cita WHERE estado = 1 ORDER BY fechaCita ASC;"
			);
			$sql -> execute();
			return $sql -> fetchAll();
			$sql -> close();
			$sql = null;
		}
		
		#Recuperar fecha de cita para editar o posponer.
		public function fechaCitaBD($idCita) {
			$sql = Conexion::conectar() -> prepare(
				"SELECT fechaCita FROM cita WHERE idCita = :idCita;"
			);
			$sql -> bindParam(":idCita", $idCita, PDO::PARAM_INT);
			$sql -> execute();
			return $sql -> fetch();
			$sql -> close();
			$sql = null;
		}
		
		#Posponer una cita.
		public function posponerCitaBD($datosCita) {
			$sql = Conexion::conectar() -> prepare(
				"UPDATE cita SET fechaCita = :fechaCita WHERE idCita = :idCita;"
			);
			$sql -> bindParam(":idCita", $datosCita["idPosponer"], PDO::PARAM_INT);
			$sql -> bindParam(":fechaCita", $datosCita["tiempo"]);
			if($sql -> execute()) {
				return true;
			} else {
				return false;
			}
			$sql -> close();
			$sql = null;
		}

		#Cancelar una o más citas.
		public function cancelarCitaBD($idCita){
			$sql = Conexion::conectar() -> prepare(
				"UPDATE cita set estado = 0 WHERE idCita = :idCita;"
			);
			$sql -> bindParam(":idCita", $idCita, PDO::PARAM_INT);
			if ($sql -> execute()) {
				return true;
			}else{
				return false;
			}
			$sql -> close();
			$sql = null;
		}
	}
	
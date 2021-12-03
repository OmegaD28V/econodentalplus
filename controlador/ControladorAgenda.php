<?php
	class ControladorAgenda {
		#Buscar citas.
		public function buscarCitasCtl($buscar) {
			$respuesta = CRUDAgenda::buscarCitasBD($buscar);
			return $respuesta;
		}

		#Vista de las citas existentes.
		public function selCitasCtl() {
			$citas = CRUDAgenda::selCitasBD();
			return $citas;
		}
		
		#Recuperar fecha de cita para editar o posponer.
		public function fechaCitaCtl($idCita) {
			$fechaCita = CRUDAgenda::fechaCitaBD($idCita);
			return $fechaCita;
		}
		
		#Posponer una cita.
		public function posponerCitaCtl() {
			if (
				isset($_POST["posponerTiempo"]) &&
				isset($_POST["idPosponer"])
			) {
				$datosCita = array(
					'idPosponer' => $_POST["idPosponer"], 
					'tiempo' => $_POST["posponerTiempo"]
				);
				$posponerCita = CRUDAgenda::posponerCitaBD($datosCita);
				if ($posponerCita == true) {
					echo '<script>toast("Cita ajustada para " + "'.$datosCita["tiempo"].'");</script>';
				} else {
					echo '<script>toast("Cita no ajustada, revise su información.");</script>';
				}
			}
		}

		#Cancelar una o más citas.
		public function cancelarCitasCtl($citas){
			$respuestas = array();
			$conclusion = true;
			for ($i = 0; $i < sizeof($citas); $i++) {
				$respuesta = CRUDAgenda::cancelarCitaBD($citas[$i]);
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
	
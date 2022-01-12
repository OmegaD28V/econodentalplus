<?php
	class DataArrays {
		#Obtener los tipos de teléfonos.
		static public function getTipoTel() {
			return array(
				'1' => 'Móvil', 
				'2' => 'Casa', 
				'3' => 'Trabajo'
			);
		}
		
		#Obtener la fecha actual.
		static public function getFecha() {
			setlocale(LC_TIME, "spanish");
			$fecha = date("d-m-Y H:i");
			return $fecha;
		}
	}
<?php
	class ControladorWord {
		#Generar archivo DOCX de Historia médica y dental.
		public function historiaMedicaCtl() {
			echo '
				<style>
					h1 { font-size: 16px; color: pink; }
				</style>
				<h1>Hola mundo</h1>
			';
			header("Content-type: application/vnd.ms-word");
			header("Content-Disposition: attachment; filename=hme.doc; charset=iso-8859-1");
		}
	}
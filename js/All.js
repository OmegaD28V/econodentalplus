import Pagina from './Pagina.js';
import Interactividad from './Interactividad.js';
import JQueryAcciones from './JQueryAcciones.js';
import Validaciones from './Validaciones.js';

// fechaA = d.getFullYear() + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" + ("0" + d.getDate()).slice(-2) + "T" + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2);
const pagina = Pagina.getPagina();
class All {
	constructor () {
		this.callScripts();
		new Pagina();
	}

	static navegacion(userBar, menuBar) {
		userBar.addEventListener('click', () => {
			menuBar.classList.toggle('showBar');
		});
	}

	callScripts () {
		if(pagina == 'Agenda') {
			Interactividad.interactFormModal(
				document.querySelector('#citaBtn-s'), 
				document.querySelector('#citaBtn-x'), 
				document.querySelector('#citaForm')
			);
			
			Interactividad.interactFormModal(
				document.querySelector('#posponerBtn-s'), 
				document.querySelector('#posponerBtn-x'), 
				document.querySelector('#posponerForm')
			);
			
			Interactividad.interactFormModal(
				document.querySelector('#cancelarBtn-s'), 
				document.querySelector('#cancelarBtn-x'), 
				document.querySelector('#cancelarForm')
			);
			
			Interactividad.checkBox(
				document.querySelector('#checkCitas'), 
				document.getElementsByName('checkCita'), 
				document.querySelector('#posponerBtn-s'), 
				document.querySelector('#cancelarBtn-s')
			);
			
			Interactividad.itemsTable(document.getElementsByName('checkCita'));

			Interactividad.confirmarCita(document.getElementsByName('citaBtn-C'));
			
			JQueryAcciones.search($('#citaBtn-b'), $('#tbl-citas'), 'buscarCitas', (respuesta) => {
				let tabla = $('#tbl-citas tr:gt(0)');
				let tbl = $('#tbl-citas > tbody');
				if (respuesta.length > 0) {
					tabla.empty();
					for (const k in respuesta) {
						let idCita = respuesta[k]["idCita"];
						let nombre = respuesta[k]["nombre"] + respuesta[k]["apellidos"];
						let fechaCita = respuesta[k]["fechaCita"];
						let telefono = respuesta[k]["telefono"];
						let row = $(
							'<tr>' + 
								'<td>' + 
									'<input type="checkbox" name="checkCita" id="checkCita' + idCita + '" value="' + idCita + '">' + 
								'</td>' + 
								'<td id="' + idCita + '" name="checkCita">' + nombre + '</td>' + 
								'<td id="' + idCita + '" name="checkCita">' + fechaCita + '</td>' + 
								'<td id="' + idCita + '" name="checkCita">' + telefono + '</td>' + 
								'<td id="' + idCita + '" name="checkCita">' + 
									'<input type="button" name="citaBtn-C" class="btn" value="Confirmar">' + 
								'</td>' + 
							'</tr>'
						);
						tbl.append(row);
						$('#results').text(respuesta.length + ' resultados');
					}
					Interactividad.checkBox(
						document.querySelector('#checkCitas'), 
						document.getElementsByName('checkCita'), 
						document.querySelector('#posponerBtn-s'), 
						document.querySelector('#cancelarBtn-s')
					);
					Interactividad.itemsTable(document.getElementsByName('checkCita'));
					Interactividad.confirmarCita(document.getElementsByName('citaBtn-C'));
					JQueryAcciones.editForm(
						$('#posponerBtn-s'), 
						$('[name="checkCita"]'), 
						$('#idPosponer'), 
						function (resultado) {
							let fecha = JQueryAcciones.completarHoraInicio(resultado['fechaCita']);
							$('#posponerTiempo').val(fecha);
						}
					);
					
					JQueryAcciones.deleteForm(
						$('#cancelarBtn-s'), 
						$('#cancelarBtn-C'), 
						$('#cancelarBtn-x'), 
						$('[name="checkCita"]'), 
						document.getElementById('cancelarForm'), 
						'cancelarCitas', 
						'Agenda'
					);
				}
			});

			JQueryAcciones.editForm(
				$('#posponerBtn-s'), 
				$('[name="checkCita"]'), 
				$('#idPosponer'), 
				function (resultado) {
					let fecha = JQueryAcciones.completarHoraInicio(resultado['fechaCita']);
					$('#posponerTiempo').val(fecha);
				}
			);
			
			JQueryAcciones.deleteForm(
				$('#cancelarBtn-s'), 
				$('#cancelarBtn-C'), 
				$('#cancelarBtn-x'), 
				$('[name="checkCita"]'), 
				document.getElementById('cancelarForm'), 
				'cancelarCitas', 
				'Agenda'
			);

			Validaciones.nombresPropios(document.getElementById('citaNombre-n'), 2, 30);
			Validaciones.nombresPropios(document.getElementById('citaApellidos-n'), 2, 50);
			Validaciones.enterosSinIntervalo(document.getElementById('citaTelefono-n'), 10);
		} else if (pagina == 'Cita') {
			Validaciones.nombresPropios(document.getElementById('citaNombre-n'), 2, 30);
			Validaciones.nombresPropios(document.getElementById('citaApellidos-n'), 2, 50);
			Validaciones.enterosSinIntervalo(document.getElementById('citaTelefono-n'), 10);
			Validaciones.fechas(document.getElementById('citaFecha-n'), 1);
			Validaciones.horas(document.getElementById('citaHora-n'), "10:00", "18:30");
		} else if (pagina == 'Usuarios') {
			Interactividad.interactFormModal(
				document.querySelector('#usuarioNBtn-s'), 
				document.querySelector('#usuarioNBtn-x'), 
				document.querySelector('#usuarioNForm')
			);
			
			Interactividad.interactFormModal(
				document.querySelector('#usuarioABtn-s'), 
				document.querySelector('#usuarioABtn-x'), 
				document.querySelector('#usuarioAForm')
			);
			
			Interactividad.interactFormModal(
				document.querySelector('#usuarioEBtn-s'), 
				document.querySelector('#usuarioEBtn-x'), 
				document.querySelector('#usuarioEForm')
			);

			Interactividad.checkBox(
				document.querySelector('#checkUsuarios'), 
				document.getElementsByName('checkUsuario'), 
				document.querySelector('#usuarioABtn-s'), 
				document.querySelector('#usuarioEBtn-s')
			);
			
			Interactividad.itemsTable(document.getElementsByName('checkUsuario'));
			
			JQueryAcciones.search($('#usuarioBtn-b'), $('#tbl-usuarios'), 'buscarUsuarios', (respuesta) => {
				let tabla = $('#tbl-usuarios tr:gt(0)');
				let tbl = $('#tbl-usuarios > tbody');
				if (respuesta.length > 0) {
					tabla.empty();
					for (const k in respuesta) {
						let nombre = respuesta[k]["nombre"] + respuesta[k]["apellidos"];
						let idUsuario = respuesta[k]["idUsuario"];
						let fechaRegistro = respuesta[k]["fechaRegistro"];
						let cargos = ['Paciente', 'Admin', 'Doctor', 'Asistente', 'Recepcionista'];
						let estados = ['Desconectado', 'Conectado'];
						let cargo = cargos[respuesta[k]["tipoUsuario"]];
						let estado = estados[respuesta[k]["estado"]];
						let row = $(
							'<tr>' + 
								'<td>' + 
									'<input type="checkbox" name="checkUsuario" id="checkUsuario' + idUsuario + '" value="' + idUsuario + '">' + 
								'</td>' + 
								'<td id="' + idUsuario + '" name="checkUsuario">' + nombre + '</td>' + 
								'<td id="' + idUsuario + '" name="checkUsuario">' + cargo + '</td>' + 
								'<td id="' + idUsuario + '" name="checkUsuario">' + fechaRegistro + '</td>' + 
								'<td id="' + idUsuario + '" name="checkUsuario">' + estado + '</td>' + 
							'</tr>'
						);
						tbl.append(row);
						$('#results').text(respuesta.length + ' resultados');
					}
					Interactividad.checkBox(
						document.querySelector('#checkUsuarios'), 
						document.getElementsByName('checkUsuario'), 
						document.querySelector('#usuarioABtn-s'), 
						document.querySelector('#usuarioEBtn-s')
					);
					Interactividad.itemsTable(document.getElementsByName('checkUsuario'));

					JQueryAcciones.editForm(
						$('#usuarioABtn-s'), 
						$('[name="checkUsuario"]'), 
						$('#idUsuario-A'), 
						function (resultado) {
							let select = $('#usuarioCargo-A');
							$('#usuarioNombre-A').val(resultado["nombre"]);
							$('#usuarioApellidos-A').val(resultado["apellidos"]);
							select[0].options.selectedIndex = false;
							for(const k of select[0].options){
								if(k.value == resultado["tipoUsuario"]){
									k.selected = true;
								}
							}
						}
					);
					
					JQueryAcciones.deleteForm(
						$('#usuarioEBtn-s'), 
						$('#usuarioEBtn-C'), 
						$('#usuarioEBtn-x'), 
						$('[name="checkUsuario"]'), 
						document.getElementById('usuarioEForm'), 
						'eliminarUsuarios', 
						'Usuarios'
					);
				}
			});

			JQueryAcciones.editForm(
				$('#usuarioABtn-s'), 
				$('[name="checkUsuario"]'), 
				$('#idUsuario-A'), 
				function (resultado) {
					let select = $('#usuarioCargo-A');
					$('#usuarioNombre-A').val(resultado["nombre"]);
					$('#usuarioApellidos-A').val(resultado["apellidos"]);
					select[0].options.selectedIndex = false;
					for(const k of select[0].options){
						if(k.value == resultado["tipoUsuario"]){
							k.selected = true;
						}
					}
				}
			);
			
			JQueryAcciones.deleteForm(
				$('#usuarioEBtn-s'), 
				$('#usuarioEBtn-C'), 
				$('#usuarioEBtn-x'), 
				$('[name="checkUsuario"]'), 
				document.getElementById('usuarioEForm'), 
				'eliminarUsuarios', 
				'Usuarios'
			);
		} else if (pagina == 'Configuracion') {
			Validaciones.correosElectronicos(document.getElementById('correo-n'), 30);
			Interactividad.interactFormModal(
				document.querySelector('#correoNBtn-s'), 
				document.querySelector('#correoNBtn-x'), 
				document.querySelector('#correoNForm')
			);
			
			Interactividad.interactFormModal(
				document.querySelector('#correoABtn-s'), 
				document.querySelector('#correoABtn-x'), 
				document.querySelector('#correoAForm')
			);
			
			Interactividad.interactFormModal(
				document.querySelector('#correoEBtn-s'), 
				document.querySelector('#correoEBtn-x'), 
				document.querySelector('#correoEForm')
			);
		}
	}
}

All.navegacion(
	document.getElementById('userBar'), 
	document.getElementById('menuBar')
);
new All();
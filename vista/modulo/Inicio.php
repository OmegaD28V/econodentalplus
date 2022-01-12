<div class="title">
	<h2>Inicio</h2>
</div>

<div class="C__Table">
	<div class="Bar__Btns column">
		<span class="Lbl__Bar">Formatos</span>
		<div class="C__Btn list">
			<a href="index.php?pagina=HistoriaMedica&type-doc=generar" id="historiaBtn-d" class="btn">Formato Historia Médica.docx</a>
			<a href="index.php?pagina=HistoriaMedica&type-doc=llenar" id="plantillaBtn-d" class="btn">Generar Historia Médica.docx</a>
		</div>
	</div>
	
	<div class="Bar__Btns column">
		<span class="Lbl__Bar">Agenda</span>
		<div class="C__Btn list">
			<a href="Agenda" class="btn">Hay n pacientes nuevos para hoy</a>
			<!-- <a href="index.php?pagina=HistoriaMedica&type-doc=llenar" id="plantillaBtn-d" class="btn">Generar Historia Médica.docx</a> -->
		</div>
	</div>
	
	<div class="Bar__Btns column">
		<span class="Lbl__Bar">Pacientes</span>
		<div class="C__Btn list">
			<a href="Pacientes" class="btn">Hay n pacientes para hoy</a>
			<!-- <a href="index.php?pagina=HistoriaMedica&type-doc=llenar" id="plantillaBtn-d" class="btn">Generar Historia Médica.docx</a> -->
		</div>
	</div>
	<div class="Bar__Btns column">
		<?php
			echo DataArrays::getFecha();
		?>
	</div>
</div>
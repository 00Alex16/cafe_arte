<?php 
	include('cabecera.php');//realiza el llamado a otro documento
	include_once('menu.php');//realiza el llamado al documento, si no ha sido cargado antes
 ?>
<div class="row">
	<div class="col-3"></div>
		<div class="col-6" align="center">
			<div class="container text-center">
				<br>
		 	<h3 style="font-family: Comic Sans MS; color:#c4a887; font-size: 2vw">A TU SERVICIO</h3>
		 	<h4 style="font-family: Comic Sans MS; color:#c4a887; font-size: 1.8vw">Cuéntame un poco sobre tu visita</h4>
		</div>
		<br>
			<form method="POST" action="admin/control/envia.php">
				<input id="etiqueta" type="text" name="nombre" class="nombre" placeholder="Nombres" required>
				<input id="etiqueta" type="text" name="apellido" class="apellido" placeholder="Apellidos" required>

				<input id="etiqueta" type="email" name="email" class="email" placeholder="Correo" required>
				<input id="etiqueta" type="number" name="telefono" class="telefono" placeholder="Télefono" required>
				<textarea id="etiqueta" name="mensaje" class="mensaje" placeholder="Mensaje:" required></textarea>
				<button style="font-size: 1.3vw" id="boton" class="btn btn-outline-success" type="submit" name="Enviar" value="Enviar">Enviar</button>
			</form>
		</div>
		<div class="col-3"></div>
</div>
<?php 
	require('pie.php');//realiza el llamado obligatorio
 ?>
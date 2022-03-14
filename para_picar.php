<?php 
	include('cabecera.php');//realiza el llamado a otro documento
	include_once('admin/control/conexion.php');
	include_once('menu.php');//realiza el llamado al documento, si no ha sido cargado antes
 ?>
 <br>
 <h2 class="text-center" style="font-size: 2.2vw; color: #f4d661">Para Picar</h2><br>
 <div class="row">
 	<div class="col-2"></div>
	 <div class="col-8">
		<div class="row container-fluid">
			<?php 
				$sql= "SELECT * FROM menu WHERE categoria='paraPicar' ORDER BY nombre";
			  	$resultado=mysqli_query($conexion, $sql);
			  	while($consulta = mysqli_fetch_array($resultado)){
			 ?>
			 	
				<div class="col-4">
						<center><img src="imagenes/<?php echo $consulta['imagen']; ?>" class="img-fluid"><br>
						<span id="detalles"><?php echo $consulta['nombre']; ?></span>
						<p style="font-size: 1.2vw; color: white">$<?php echo number_format($consulta['precio'], 0, ",", "."); ?></p><br><br></center>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-2"></div>
</div>
<?php 
	require('pie.php');//realiza el llamado obligatorio
 ?>
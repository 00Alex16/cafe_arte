<?php 
	include('cabecera.php');//realiza el llamado a otro documento
	include_once('admin/control/conexion.php');
	include_once('menu.php');//realiza el llamado al documento, si no ha sido cargado antes
 ?>
 <br>
 <h2 class="text-center" style="font-size: 2.2vw; color: #f4d661">Jugoterapia</h2><br>
 <div class="row">
 	<div class="col-2"></div>
	 <div class="col-8">
		<div class="row container-fluid">
			<?php 
				$sql= "SELECT * FROM menu WHERE categoria='jugoterapia' ORDER BY nombre";
			  	$resultado=mysqli_query($conexion, $sql);
			  	while($consulta = mysqli_fetch_array($resultado)){
			 ?>
			 	
				<div class="col-4">
					<center>
						<a id="cursor" data-toggle="modal" data-target="#<?php echo $consulta['id']; ?>" ><img src="imagenes/<?php echo $consulta['imagen']; ?>" class="img-fluid"></a>
							<div class="modal fade" id="<?php echo $consulta['id']; ?>">
								<div class="modal-dialog modal-lg">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								      	<span id="modal"><?php echo $consulta['nombre']; ?></span>
								      </div>

								      <!-- Modal body -->
								      <div class="modal-body">
								        <div class="row">
								        	<div class="col-8">
								        		<img src="imagenes/<?php echo $consulta['imagen']; ?>" class="img-fluid">
								        	</div>
								        	<div class="col-4">
								        		<h5 style="font-size: 1.6vw">Ingredientes</h5>
								        		<span id="modal"><?php echo $consulta['ingredientes']; ?></span>
								        	</div>
								        </div>
								      </div>

								      <!-- Modal footer -->
								      <div class="modal-footer">
								      </div>

								    </div>
							  	</div>
							</div>
						
						<span id="detalles"><?php echo $consulta['nombre']; ?></span>
						<p style="font-size: 1.2vw; color: white">$<?php echo number_format($consulta['precio'], 0, ",", "."); ?></p><br><br>
					</center>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-2"></div>
</div>
<?php 
	require('pie.php');//realiza el llamado obligatorio
 ?>
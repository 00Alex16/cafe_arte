<?php 
	include('control/sesionValidar.php');
	include_once('header.php');
	include_once('menu_horizontal.php');
	include_once('menu_principal.php');
 ?>
 <?php 
 	$categoria=$_GET['categoria'];
  ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LISTA DE PRODUCTOS CREADOS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Listar productos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de productos, use los botones para realizar una accion</h3>
          <br>
          <h5><a href="frm_crear_elementos_menu.php?categoria=<?php echo $categoria ?>" class="btn btn-success" title="Nuevo" role="button" value="<?php echo $consulta['id']; ?>"><span class="fa fa-plus"></span></a> Añadir nuevo elemento al menú</h5>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
			<div class="card-body">
				<div class="row">
					
					<div class="panel panel-red">

						<div class="panel-heading">

							<b>TABLA DE PRODUCTOS</b>
							
						</div>
						<div class="panel-body">
							<table width=100% class="table table-striped table-bordered table-hover" id="tablaDatos">
								<thead>
									<tr>
										<th>ID</th>
										<th>NOMBRE</th>
										<th>CATEGORIA</th>
										<?php if($categoria=='infusion'){ ?>
											<th>TE</th>
											<th>PROPIEDADES</th>
										<?php } ?>

										<?php if($categoria=='jugoterapia' || $categoria=='desayuno' || $categoria=='infusion'){ ?>
											<th>INGREDIENTES</th>
										<?php }  ?>

										<?php if($categoria=='licor'){ ?>
											<th>TRAGO</th>
										<?php }else{ ?>
											<th>PRECIO</th>
										<?php } ?>

										<?php if($categoria=='licor'){ ?>
											<th>MEDIA</th>
											<th>BOTELLA</th>
										<?php } ?>

										
										<th width="100px">IMAGEN</th>
										<th width="20px">Editar</th>
										<th width="20px">Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										include 'control/conexion.php';
										$sql = "SELECT * FROM menu WHERE categoria='$categoria' ORDER BY id"; //se mostraran los usuarios que no esten eliminados
										$resultado = mysqli_query($conexion, $sql);
										while ($consulta = mysqli_fetch_array($resultado)) { //se crea un ciclo que convierte el resultado en una matriz asociativa que va a recorrer los registros de la consulta
									 ?>
									 	<tr class="odd gradeX">
									 		<td>
									 			<?php echo $consulta["id"]; ?>
									 		</td>
									 		<td>
									 			<?php echo $consulta["nombre"]; ?>
									 		</td>
									 		<td>
									 			<?php echo $categoria; ?>
									 		</td>

									 		<?php if($categoria=='infusion'){ ?>
									 		<td>
									 			<?php echo $consulta["te"]; ?>
									 		</td>
									 		<td>
									 			<?php echo $consulta["propiedades"]; ?>
									 		</td>
									 		<?php } ?>

									 		<?php if($categoria=='jugoterapia' || $categoria=='desayuno' || $categoria=='infusion'){ ?>
									 		<td>
									 			<?php echo $consulta["ingredientes"]; ?>
									 		</td>
									 		<?php } ?>

									 		<td>
									 			<?php echo $consulta["precio"]; ?>
									 		</td>

									 		<?php if($categoria=='licor'){ ?>
									 		<td>
									 			<?php echo $consulta["media"]; ?>
									 		</td>
									 		<td>
									 			<?php echo $consulta["botella"]; ?>
									 		</td>
									 		<?php } ?>
									 		
									 		<td width="100px">
									 			<img src="../imagenes/<?php echo $consulta["imagen"]; ?>" class="img-fluid">
									 		</td>
									 		<td width="20px">
									 			<form action="frm_crear_elementos_menu.php" method="POST">
									 				<input type="hidden" name="id" value="<?php echo $consulta["id"]; ?>">
									 				<input type="hidden" name="nombre" value="<?php echo $consulta["nombre"]; ?>">
									 				<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
									 				<input type="hidden" name="te" value="<?php echo $consulta["te"]; ?>">
									 				<input type="hidden" name="propiedades" value="<?php echo $consulta["propiedades"]; ?>">
									 				<input type="hidden" name="ingredientes" value="<?php echo $consulta["ingredientes"]; ?>">	
									 				<input type="hidden" name="precio" value="<?php echo $consulta["precio"]; ?>">
									 				<input type="hidden" name="media" value="<?php echo $consulta["media"]; ?>">
									 				<input type="hidden" name="botella" value="<?php echo $consulta["botella"]; ?>">
									 				<input type="hidden" name="imagen" value="<?php echo $consulta["imagen"]; ?>">
									 				<input type="hidden" name="accion" value="editar">
									 				<button class="btn btn-success" title="Editar" type="submit">
									 					<span class="fa fa-edit"></span>
									 				</button>
									 			</form>
									 		</td>
									 		<td width="20px">
									 			<form action="control/fconfirmacion.php" method="POST">
									 				<input type="hidden" name="categoria" value="<?php echo $categoria; ?>">
									 				<input type="hidden" name="accion" value="eliminar">
									 				<input type="hidden" name="elemento" value="producto">
									 				<button class="btn btn-danger" title="Eliminar" type="submit" name="id" value="<?php echo $consulta['id']; ?>"><span class="fa fa-user-times"></span>
									 				</button>
									 			</form>
									 		</td>
									 	</tr>
									 	<?php 
									 		}
									 	 ?>
								</tbody>
							</table>
						</div>
						
					</div>

				</div>          
			

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Use el cuadro de busqueda para filtrar la informacion
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

 <?php 
 include_once('footer.php');
  ?>
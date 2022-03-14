<?php 
	include('control/sesionValidar.php');
	include_once('header.php');
	include_once('menu_horizontal.php');
	include_once('menu_principal.php');
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LISTA DE IMAGENES DEL SLIDER</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Listar imagenes</li>
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
          <h3 class="card-title">Lista de imagenes, use los botones para realizar una accion</h3>

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

							<b>TABLA DE IMAGENES</b>
							
						</div>

						<div class="panel-body">
							<table width=100% class="table table-striped table-bordered table-hover" id="dataTables">
								<thead>
									<tr>
										<th>ID</th>
										<th>ORDEN</th>
										<th>NOMBRE</th>
										<th>TITULO</th>
										<th>DESCRIPCION</th>
										<th width="100px">IMAGEN</th>
										<th width="20px"></th>
										<th width="20px"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										include 'control/conexion.php';
										$sql = "SELECT * FROM imagenes WHERE seccion='slider principal' ORDER BY orden"; //se mostraran los usuarios que no esten eliminados
										$resultado = mysqli_query($conexion, $sql);
										while ($consulta = mysqli_fetch_array($resultado)) { //se crea un ciclo que convierte el resultado en una matriz asociativa que va a recorrer los registros de la consulta
									 ?>
									 	<tr class="odd gradeX">
									 		<form action="control/fImagenes.php" method="post" enctype="multipart/form-data">
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-key form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Id" name="id" required readonly value="<?php echo $consulta['id'] ?>">
											        </div>
										 		</td>
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-sort-amount-asc form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Orden" name="orden" required value="<?php echo $consulta['orden'] ?>">
											        </div>
										 		</td>
										 		<td>
										 			<div class="form-group has-feedback">
											          <input type="text" class="form-control" placeholder="Nombre de imagen" name="nombreT" required readonly value="<?php echo $consulta['nombre'] ?>">
											        </div>
											        <div class="input-group has-feedback">
											        	<span class="fa fa-thumb-tack form-control-feedback"></span>
											          <input type="file" class="form-control" name="nombre">
											        </div>
										 		</td>
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-tag form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Titulo" name="titulo" value="<?php echo $consulta['titulo'] ?>">
											        </div>
										 		</td>
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-tag form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="<?php echo $consulta['descripcion'] ?>">
											        </div>
										 		</td>
										 		<td width="100px">
										 			<img src="../imagenes/<?php echo $consulta["nombre"]; ?>" class="img-fluid">
										 		</td>
										 		<td width="20px">
										 				<input type="hidden" name="accion" value="editar">
										 				<button class="btn btn-success" title="Editar" type="submit">
										 					<span class="fa fa-edit"></span>
										 				</button>
										 		</td>
									 		</form>
									 		<td width="20px">
									 			<form action="control/fconfirmacion.php" method="POST">
									 				<input type="hidden" name="accion" value="eliminar">
									 				<input type="hidden" name="elemento" value="imagen">
									 				<button class="btn btn-danger" title="Eliminar" type="submit" name="id" value="<?php echo $consulta['id']; ?>"><span class="fa fa-user-times"></span>
									 				</button>
									 			</form>
									 		</td>
									 	</tr>
									 	<?php 
									 		} //cierre del while
									 	 ?>

									 	<?php 
									 		$id=0;
									 		$sql = "SELECT id FROM imagenes ORDER BY id DESC LIMIT 1"; //se mostraran los usuarios que no esten eliminados
											$result = mysqli_query($conexion, $sql);
											$filas=mysqli_num_rows($result);
											if ($filas>0){
												$resultado=mysqli_fetch_array($result);
												$id=$resultado["id"];
											}
											$id=$id+1;
									 	 ?>
									 	<tr class="odd gradeX">
									 		<form action="control/fImagenes.php" method="post" enctype="multipart/form-data">
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-key form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Id" name="id" required readonly value="<?php echo $id ?>">
											        </div>
										 		</td>
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-sort-amount-asc form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Orden" name="orden" required>
											        </div>
										 		</td>
										 		<td>
											        <div class="input-group has-feedback">
											        	<span class="fa fa-thumb-tack form-control-feedback"></span>
											          <input type="file" class="form-control" name="nombre">
											        </div>
										 		</td>
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-tag form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Titulo" name="titulo">
											        </div>
										 		</td>
										 		<td>
										 			<div class="input-group has-feedback">
										 				<span class="fa fa-tag form-control-feedback"></span>
											          <input type="text" class="form-control" placeholder="Descripcion" name="descripcion">
											        </div>
										 		</td>
										 		<td width="100px">
										 			<img src="../imagenes/sinimagen.jpg" class="img-fluid">
										 		</td>
										 		<td colspan="2" width="40px">
										 				<input type="hidden" name="accion" value="crear">
										 				<input type="hidden" name="seccion" value="slider principal">
										 				<button class="btn btn-success" title="Crear" type="submit">
										 					<span class="fa fa-plus-square"></span>
										 				</button>
										 		</td>
									 		</form>
									 	</tr>
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
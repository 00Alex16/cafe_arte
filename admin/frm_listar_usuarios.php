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
            <h1>LISTA DE USUARIOS REGISTRADOS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Listar usuarios</li>
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
          <h3 class="card-title">Lista de usuarios, use los botones para realizar una accion</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
			<div class="card-body">
				<div class="row">
					
					<div class="panel panel-red">

						<div class="panel-heading">

							<b>TABLA DE USUARIOS</b>
							
						</div>

						<div class="panel-body">
							<table width=100% class="table table-striped table-bordered table-hover" id="dataTables">
								<thead>
									<tr>
										<th>DOCUMENTO</th>
										<th>NOMBRE</th>
										<th>ROL</th>
										<th>ESTADO</th>
										<th width="20px"></th>
										<th width="20px"></th>
										<th width="20px"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
										include 'control/conexion.php';
										$sql = "SELECT * FROM usuarios WHERE estado='Activo' OR estado='Inactivo' ORDER BY nombre"; //se mostraran los usuarios que no esten eliminados
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
									 			<?php echo $consulta["tipo"]; ?>
									 		</td>
									 		<td>
									 			<?php echo $consulta["estado"]; ?>
									 		</td>
									 		<td width="20px">
									 			<form action="frm_crear_usuarios.php" method="POST">
									 				<input type="hidden" name="id" value="<?php echo $consulta["id"]; ?>">
									 				<input type="hidden" name="nombre" value="<?php echo $consulta["nombre"]; ?>">
									 				<input type="hidden" name="tipo" value="<?php echo $consulta["tipo"]; ?>">
									 				<input type="hidden" name="estado" value="<?php echo $consulta["estado"]; ?>">
									 				<input type="hidden" name="accion" value="editar">
									 				<button class="btn btn-success" title="Editar" type="submit">
									 					<span class="fa fa-edit"></span>
									 				</button>
									 			</form>
									 		</td>
									 		<td width="20px">
									 			<form action="control/fconfirmacion.php" method="POST">
									 				<input type="hidden" name="accion" value="eliminar">
									 				<input type="hidden" name="elemento" value="usuario">
									 				<button class="btn btn-danger" title="Eliminar" type="submit" name="id" value="<?php echo $consulta['id']; ?>"><span class="fa fa-user-times"></span>
									 				</button>
									 			</form>
									 		</td>
									 		<td width="20px">
									 			<form action="control/fconfirmacion.php" method="POST">
									 				<input type="hidden" name="accion" value="resetear">
									 				<input type="hidden" name="elemento" value="usuario">
									 				<button class="btn btn-warning" title="Resetear clave" type="submit" name="id" value="<?php echo $consulta['id']; ?>"><span class="fa fa-key"></span>
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
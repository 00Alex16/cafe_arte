<?php 
	include_once('control/conexion.php');
	include('control/sesionValidar.php');
	include_once('header.php');
	include_once('menu_horizontal.php');
	include_once('menu_principal.php');
	//Inicializams las variables que se van a cargar en el formulario
	$id="";
	$nombre="";
	$tipo="";
	$estado="";
	$accion="crear";
	if(isset($_POST['id'])){//si existe un id desde POST (desde una de los botones)
		//cargamos las variables del post
		$id=mysqli_real_escape_string($conexion,$_POST['id']);//evita la inyeccion sql
		$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
		$tipo=mysqli_real_escape_string($conexion,$_POST['tipo']);
		$estado=mysqli_real_escape_string($conexion,$_POST['estado']);
		$accion=mysqli_real_escape_string($conexion,$_POST['accion']);
	}
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>REGISTRO DE NUEVOS USUARIOS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Crear usuarios</li>
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
          <h3 class="card-title">Llene el formulario con los datos del nuevo usuario</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
			<div class="card-body">
			          
			<div class="register-box">
			  <div class="register-logo">
			    <a href="index.php">Administracion <b>Café Arte</b></a>
			  </div>

			  <div class="card">
			    <div class="card-body register-card-body">
			      <p class="login-box-msg">
			      	<?php 
			      		if($accion=='editar'){
			      			echo "Modificando usuario ".$nombre;
			     		}else{
			      			echo "Crear nuevo usuario ";
			      		} 
			      	?>
			      </p>

			      <form action="control/fusuarios.php" method="post">
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Nombre completo" name="nombre" required value="<?php echo $nombre ?>">
			          <span class="fa fa-user form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Documento de identidad" name="id" required value="<?php echo $id ?>" <?php if($accion=='editar'){echo 'readonly';} ?>>
			          <span class="fa fa-cc-amex form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			         <select class="form-control" name="tipo">
		                    <option value="Vendedor" <?php if($tipo=='Vendedor') echo 'selected' ?>>Vendedor</option>
		                    <option value="Administrador" <?php if($tipo=='Administrador') echo 'selected' ?>>Administrador</option>
		                    <option value="Gerente" <?php if($tipo=='Gerente') echo 'selected' ?>>Gerente</option>
		                    <option value="Soporte" <?php if($tipo=='Soporte') echo 'selected' ?>>Soporte</option>
		                </select>
			          <span class="fa fa-group form-control-feedback"></span>
			        </div>

			        <div class="form-group has-feedback">
			         <select class="form-control" name="estado" <?php if($accion== 'crear') echo 'disabled'; ?>>
		                    <option value="Activo" <?php if($estado=='Activo') echo 'selected' ?>>Activo</option>
		                    <option value="Inactivo" <?php if($estado=='Desactivo') echo 'selected' ?>>Inactivo</option>
		                </select>
			          <span class="fa fa-power-off form-control-feedback"></span>
			        </div>

					<?php  if($accion=='crear'){//si la accion es crear un usuario se muestra los campos de clave ?>
				        <div class="form-group has-feedback">
				          <input type="password" class="form-control" placeholder="Contraseña" name="clave" required>
				          <span class="fa fa-lock form-control-feedback"></span>
				        </div>
				        <div class="form-group has-feedback">
				          <input type="password" class="form-control" placeholder="Repita la contraseña" name="clave2" required>
				          <span class="fa fa-lock form-control-feedback"></span>
				        </div>
					<?php } ?>

			        <div class="row">
			          <div class="col-8">
			            
			          </div>
			          <!-- /.col -->
			          <div class="col-4">
			          	<input type="hidden" name="accion" value="<?php if($accion=='crear'){echo 'crear';}else{echo 'editar';} ?>">
			            <button type="submit" class="btn btn-primary btn-block btn-flat"> <?php if($accion=='crear'){
			            	echo 'Crear';}else{echo 'Modificar';} ?> </button>
			          </div>
			          <!-- /.col -->
			        </div>
			      </form>
			    </div>
			    <!-- /.form-box -->
			  </div><!-- /.card -->
			</div>
			<!-- /.register-box -->

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <?php 
			      		if($accion=='editar'){
			      			echo "Pulse Modificar para guardar los cambios";
			     		}else{
			      			echo "Pulse Crear para guardar el nuevo usuario";
			      		} 
			      	?>
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
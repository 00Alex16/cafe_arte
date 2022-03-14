<?php 
	include_once('control/conexion.php');
	include('control/sesionValidar.php');
	include_once('header.php');
	include_once('menu_horizontal.php');
	include_once('menu_principal.php');
	//Inicializams las variables que se van a cargar en el formulario
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CAMBIO DE CONTRASEÑA DE USUARIO</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Cambiar contraseña</li>
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
          <h3 class="card-title">Llene el formulario con los datos de la nueva contraseña</h3>

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
			    <a href="index.php"><b>Administracion</b><br>MI TIENDITA</a>
			  </div>

			  <div class="card">
			    <div class="card-body register-card-body">
			      <p class="login-box-msg">
			      	<?php 
			      			echo "Cambiando contraseña de: ".$_SESSION['nombre'];
			      	?>
			      </p>

			      <form action="control/fusuarios.php" method="post">
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Documento de identidad" name="id" required readonly value="<?php echo $_SESSION['id']; ?>">
			          <span class="fa fa-cc-amex form-control-feedback"></span>
			        </div>

				        <div class="form-group has-feedback">
				          <input type="password" class="form-control" placeholder="Contraseña actual" name="claveActual" required>
				          <span class="fa fa-lock form-control-feedback"></span>
				        </div>
				        <div class="form-group has-feedback">
				          <input type="password" class="form-control" placeholder="Contraseña nueva" name="clave" required>
				          <span class="fa fa-lock form-control-feedback"></span>
				        </div>
				        <div class="form-group has-feedback">
				          <input type="password" class="form-control" placeholder="Repita contraseña" name="clave2" required>
				          <span class="fa fa-lock form-control-feedback"></span>
				        </div>

			        <div class="row">
			          <div class="col-8">
			            
			          </div>
			          <!-- /.col -->
			          <div class="col-4">
			          	<input type="hidden" name="accion" value="cambiarClave">
			            <button type="submit" class="btn btn-primary btn-block btn-flat">Cambiar</button>
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
			      			Pulse Cambiar para guardar
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
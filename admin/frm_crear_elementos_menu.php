<?php 
	include_once('control/conexion.php');
	include('control/sesionValidar.php');
	include_once('header.php');
	include_once('menu_horizontal.php');
	include_once('menu_principal.php');
	//Inicializams las variables que se van a cargar en el formulario
	$id="";
	$nombre="";
	$te="";
	$propiedades="";
	$ingredientes="";
	$precio="";
	$media="";
	$botella="";
	$accion="crear";
	$imagen="sinimagen.png";
	if(isset($_POST['id'])){//si existe un id desde POST (desde una de los botones)
		//cargamos las variables del post
		$id=mysqli_real_escape_string($conexion,$_POST['id']);//evita la inyeccion sql
		$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
		$categoria=mysqli_real_escape_string($conexion,$_POST['categoria']);
		$te=mysqli_real_escape_string($conexion,$_POST['te']);
		$propiedades=mysqli_real_escape_string($conexion,$_POST['propiedades']);
		$ingredientes=mysqli_real_escape_string($conexion,$_POST['ingredientes']);
		$precio=mysqli_real_escape_string($conexion,$_POST['precio']);
		$media=mysqli_real_escape_string($conexion,$_POST['media']);
		$botella=mysqli_real_escape_string($conexion,$_POST['botella']);
		$accion=mysqli_real_escape_string($conexion,$_POST['accion']);
		$imagen=mysqli_real_escape_string($conexion,$_POST['imagen']);
	}else{
		$categoria=$_GET['categoria'];
	}
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CREACIÓN DE ELEMENTOS DEL MENÚ</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
              <li class="breadcrumb-item active">Crear productos</li>
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
          <h3 class="card-title">Llene el formulario con los datos del nuevo producto</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Minimizar">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Cerrar">
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
			      		if($accion=='editar'){
			      			echo "Modificando producto: ".$nombre;
			     		}else{
			      			echo "Crear nuevo producto ";
			      		}
			      	?>
			      </p>

			      <?php 
			      if($accion=='crear'){
			 		$id=0;
			 		$sql = "SELECT id FROM menu ORDER BY id DESC LIMIT 1"; //se mostraran los usuarios que no esten eliminados
					$result = mysqli_query($conexion, $sql);
					$filas=mysqli_num_rows($result);
					if ($filas>0){
						$resultado=mysqli_fetch_array($result);
						$id=$resultado["id"];
					}
					$id=$id+1;
				}
			 	 ?>

			      <form action="control/fMenu.php" method="post" enctype="multipart/form-data">
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Id del producto" name="id" readonly required value="<?php echo $id ?>">
			          <span class="fa fa-tags form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Nombre" name="nombre" required value="<?php echo $nombre ?>">
			          <span class="fa fa-sticky-note-o form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			         <select class="form-control" name="categoria" disabled >
			         		<option value="Bebida caliente" <?php if($categoria=='bebidaCaliente') echo 'selected' ?>>Bebida caliente</option>
		                    <option value="Bebida fria" <?php if($categoria=='bebidaFria') echo 'selected' ?>>Bebida fria</option>
		                    <option value="Bebida origen" <?php if($categoria=='bebidaOrigen') echo 'selected' ?>>Bebida origen</option>
		                    <option value="Dulces" <?php if($categoria=='dulce') echo 'selected' ?>>Dulces</option>
		                    <option value="Desayuno" <?php if($categoria=='desayuno') echo 'selected' ?>>Desayuno</option>
		                    <option value="Para picar" <?php if($categoria=='paraPicar') echo 'selected' ?>>Para picar</option>
		                    <option value="Infusion" <?php if($categoria=='infusion') echo 'selected' ?>>Infusion</option>
		                    <option value="Jugoterapia" <?php if($categoria=='jugoterapia') echo 'selected' ?>>Jugoterapia</option>
		                    <option value="Licor" <?php if($categoria=='licor') echo 'selected' ?>>Licor</option>
		                    <option value="Cerveza" <?php if($categoria=='cerveza') echo 'selected' ?>>Cerveza</option>
		                    <option value="Coctel o shot" <?php if($categoria=='coctel') echo 'selected' ?>>Coctel o shot</option>
		                </select>
			          <span class="fa fa-stack-exchange form-control-feedback"></span>
			        </div>
			        <?php  if($categoria=='infusion') {?>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Te" name="te" required value="<?php echo $te ?>">
			          <span class="fa fa-coffee form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Propiedades" name="propiedades" required value="<?php echo $propiedades ?>">
			          <span class="fa fa-tree form-control-feedback"></span>
			        </div>
			        <?php } ?>
			        
			        <?php if($categoria=='jugoterapia' || $categoria=='desayuno' || $categoria=='infusion'){ ?>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Ingredientes" name="ingredientes" required value="<?php echo $ingredientes ?>">
			          <span class="fa fa-shopping-cart form-control-feedback"></span>
			        </div>
			    	<?php } ?>

			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="<?php if($categoria=='licor'){ echo 'Trago';}else{echo 'Precio';} ?>" name="precio" required value="<?php echo $precio ?>">
			          <span class="<?php if($categoria=='licor'){ echo 'fa fa-beer';}else{echo 'fa fa-dollar';} ?> form-control-feedback"></span>
			        </div>

			        <?php if($categoria=='licor'){ ?>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Media" name="media" required value="<?php echo $media ?>">
			          <span class="fa fa-hourglass-3 form-control-feedback"></span>
			        </div>
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" placeholder="Botella" name="botella" required value="<?php echo $botella ?>">
			          <span class="fa fa-dollar form-control-feedback"></span>
			        </div>
			    	<?php } ?>

			        <div class="form-group has-feedback">
			          <input type="file" class="form-control" placeholder="Imagen" name="imagen" value="<?php echo $imagen ?>">
			          <span class="fa fa-image form-control-feedback"></span>
			        </div>

			        <div class="row">
			          <div class="col-8">
			            
			          </div>
			          <!-- /.col -->
			          <div class="col-4">
			          	<input type="hidden" name="categoria" value="<?php echo $categoria ?>">
			          	<input type="hidden" name="imagenVieja" value="<?php echo $imagen ?>">
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
			      			echo "Pulse Crear para guardar el nuevo producto";
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
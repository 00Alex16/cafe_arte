<?php 
include "conexion.php"; //llamado a la clase de la conexion a la DB
include('sesionValidar.php');
if(isset($_POST['accion'])){
	$accion=mysqli_real_escape_string($conexion,$_POST['accion']);
}else{
	$accion=mysqli_real_escape_string($conexion,$_GET['accion']);
}
if($accion=='crear'){
	$id=mysqli_real_escape_string($conexion,$_POST['id']);
	$titulo=mysqli_real_escape_string($conexion,$_POST['titulo']);
	$descripcion=mysqli_real_escape_string($conexion,$_POST['descripcion']);
	$orden=mysqli_real_escape_string($conexion,$_POST['orden']);
	$seccion=mysqli_real_escape_string($conexion,$_POST['seccion']);
	$nombre="sinimagen.jpg";
	$archivo=$_FILES['nombre']['name'];
		if($archivo!=""){
		$nombre=$_FILES['nombre']['name']; //alamacena el nombre de la imagen
		$ruta="../../imagenes/$nombre"; //definimos la ruta donde se guardara el archivo
		if(move_uploaded_file($_FILES['nombre']['tmp_name'],$ruta)){ //si se sube la imagen al servidor
			$sql="INSERT INTO imagenes (id, nombre, titulo, descripcion, seccion, orden) VALUES ('$id', '$nombre', '$titulo', '$descripcion', '$seccion', '$orden')";
			mysqli_query($conexion, $sql); //ejecutamos la consulta sql
			$filas = mysqli_affected_rows($conexion);
			if($filas>0){ //si la consulta se ejecuto correctamente
				echo "<script type='text/javascript'>alert('Slide creado con exito');
				window.location.href='../frm_admin_slider.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
				echo "<script type='text/javascript'>alert('Error, no se creo el slide');
				history.go(-1);</script>"; //si no se creo vuelve atras
			}
		}else{
			echo "<script type='text/javascript'>alert('Error, no se subio la imagen');
				history.go(-1);</script>";
		} 
	}
	

	}elseif($accion=='editar'){
	$id=mysqli_real_escape_string($conexion,$_POST['id']);
	$titulo=mysqli_real_escape_string($conexion,$_POST['titulo']);
	$descripcion=mysqli_real_escape_string($conexion,$_POST['descripcion']);
	$orden=mysqli_real_escape_string($conexion,$_POST['orden']);
	$nombre=mysqli_real_escape_string($conexion,$_POST['nombreT']);
	$archivo=$_FILES['nombre']['name'];
		if($archivo!=""){
			$nombre=$_FILES['nombre']['name'];
			$ruta="../../imagenes/$nombre";
			if(move_uploaded_file($_FILES['nombre']['tmp_name'],$ruta)){
				$sql="UPDATE imagenes SET nombre='$nombre', titulo='$titulo', descripcion='$descripcion', orden='$orden' WHERE id='$id'";
				mysqli_query($conexion, $sql); //ejecutamos la consulta sql
				$filas = mysqli_affected_rows($conexion);
				if($filas>0){ //si la consulta se ejecuto correctamente
					echo "<script type='text/javascript'>alert('Slide modificado con exito');
					window.location.href='../frm_admin_slider.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
					}else{
					echo "<script type='text/javascript'>alert('Error, no se modifico el slide');
					history.go(-1);</script>"; //si no se creo vuelve atras
				}
			}else{
				echo "<script type='text/javascript'>alert('Error, no se subio la slide');
				history.go(-1);</script>";
			}
		}else{
			$sql="UPDATE imagenes SET nombre='$nombre', titulo='$titulo', descripcion='$descripcion', orden='$orden' WHERE id='$id'";
			mysqli_query($conexion, $sql); //ejecutamos la consulta sql
			$filas = mysqli_affected_rows($conexion);
			if($filas>0){ //si la consulta se ejecuto correctamente
				echo "<script type='text/javascript'>alert('Slide modificado con exito');
				window.location.href='../frm_admin_slider.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
				}else{
				echo "<script type='text/javascript'>alert('Error, no se modifico el slide');
				history.go(-1);</script>"; //si no se creo vuelve atras
			}
	}

		
	}elseif($accion=='eliminar'){
		$id=mysqli_real_escape_string($conexion, $_GET['id']);
		$sql="DELETE FROM imagenes WHERE id='$id'";
		mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		$filas = mysqli_affected_rows($conexion);
		if($filas>0){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Slide eliminado con exito');
			window.location.href='../frm_admin_slider.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
			echo "<script type='text/javascript'>alert('Error, no se elimino el slide');
			history.go(-2);</script>"; //si no se creo vuelve atras
		}
	}
?>
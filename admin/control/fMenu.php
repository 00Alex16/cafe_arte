<?php 
include "conexion.php"; //llamado a la clase de la conexion a la DB
include('sesionValidar.php');
if(isset($_POST['accion'])){
	$accion=mysqli_real_escape_string($conexion,$_POST['accion']);
}else{
	$accion=mysqli_real_escape_string($conexion,$_GET['accion']);
}
$id="";
$nombre="";
$categoria="";
$te="";
$propiedades="";
$ingredientes="";
$precio="";
$media="";
$botella="";
$imagen="";

if($accion=='crear'){
	$id=mysqli_real_escape_string($conexion,$_POST['id']);
	$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
	$categoria=mysqli_real_escape_string($conexion,$_POST['categoria']);
	if($categoria=='infusion'){
	$te=mysqli_real_escape_string($conexion,$_POST['te']);
	$propiedades=mysqli_real_escape_string($conexion,$_POST['propiedades']);
	}
	if($categoria=='jugoterapia' || $categoria=='desayuno' || $categoria=='infusion'){
	$ingredientes=mysqli_real_escape_string($conexion,$_POST['ingredientes']);
	}
	$precio=mysqli_real_escape_string($conexion,$_POST['precio']);
	if($categoria=='licor'){
	$media=mysqli_real_escape_string($conexion,$_POST['media']);
	$botella=mysqli_real_escape_string($conexion,$_POST['botella']);
	}
	$imagen="sinimagen.jpg"; //imagen por defecto
	$archivo=$_FILES['imagen']['name'];
	if($archivo!=""){ //si existe una imagen seleccionada
		$imagen=$_FILES['imagen']['name']; //alamacena el nombre de la imagen
		$ruta="../../imagenes/$imagen"; //definimos la ruta donde se guardara el archivo
		if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){ //si se sube la imagen al servidor
			$sql="INSERT INTO menu (id, nombre, categoria, te, propiedades, ingredientes, precio, media, botella, imagen) VALUES ('$id', '$nombre', '$categoria', '$te', '$propiedades', '$ingredientes', '$precio','$media', '$botella', '$imagen')";
			mysqli_query($conexion, $sql);//ejecuta la consulta
			$filas = mysqli_affected_rows($conexion); //devuelve el numero de filas afectadas en la ultima consulta
			if($filas>0){ //si la consulta se ejecuto correctamente
				echo "<script type='text/javascript'>alert('Producto creado con exito');
				window.location.href='../frm_listar_elementos_menu.php?categoria=$categoria';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
				echo "<script type='text/javascript'>alert('Error, no se creo el producto');
				history.go(-1);</script>"; //si no se creo vuelve atras
			}
		}else{
			echo "<script type='text/javascript'>alert('Error, no se subio la imagen');
				history.go(-1);</script>";
		} 
	}else{
		$sql="INSERT INTO menu (id, nombre, categoria, te, propiedades, ingredientes, precio, media, botella, imagen) VALUES ('$id', '$nombre', '$categoria', '$te', '$propiedades', '$ingredientes', '$precio','$media', '$botella', '$imagen')";
			mysqli_query($conexion, $sql);
			$filas = mysqli_affected_rows($conexion); //devuelve el numero de filas afectadas en la ultima consulta
			if($filas>0){ //si la consulta se ejecuto correctamente
				echo "<script type='text/javascript'>alert('Producto creado con exito');
				window.location.href='../frm_listar_elementos_menu.php?categoria=$categoria';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
				echo "<script type='text/javascript'>alert('Error, no se creo el producto');
				history.go(-1);</script>"; //si no se creo vuelve atras
			}
	}



	}elseif($accion=='editar'){
		$id=mysqli_real_escape_string($conexion,$_POST['id']);
		$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
		$categoria=mysqli_real_escape_string($conexion,$_POST['categoria']);
		if($categoria=='infusion'){
		$te=mysqli_real_escape_string($conexion,$_POST['te']);
		$propiedades=mysqli_real_escape_string($conexion,$_POST['propiedades']);
		}
		if($categoria=='jugoterapia' || $categoria=='desayuno' || $categoria=='infusion'){
		$ingredientes=mysqli_real_escape_string($conexion,$_POST['ingredientes']);
		}
		$precio=mysqli_real_escape_string($conexion,$_POST['precio']);
		if($categoria=='licor'){
		$media=mysqli_real_escape_string($conexion,$_POST['media']);
		$botella=mysqli_real_escape_string($conexion,$_POST['botella']);
		}
		$archivo=$imagen=$_FILES['imagen']['name'];
		if($archivo!=""){
			$imagen=$_FILES['imagen']['name'];
			$ruta="../../imagenes/$imagen";
			if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){
				$sql="UPDATE menu SET nombre='$nombre', categoria='$categoria', te='$te', propiedades='$propiedades', ingredientes='$ingredientes', precio='$precio', media='$media', botella='$botella', imagen='$imagen' WHERE id='$id'";
				mysqli_query($conexion, $sql);
				$filas = mysqli_affected_rows($conexion); //devuelve el numero de filas afectadas en la ultima consulta
				if($filas>0){ //si la consulta se ejecuto correctamente
					echo "<script type='text/javascript'>alert('Producto modificado con exito');
					window.location.href='../frm_listar_elementos_menu.php?categoria=$categoria';</script>"; //si se creo el usuario cargue de nuevo el formulario
				}else{
					echo "<script type='text/javascript'>alert('Error, no se modifico el producto');
					history.go(-1);</script>"; //si no se creo vuelve atras
				}
			}else{
				echo "<script type='text/javascript'>alert('Error, no se modifico la imagen');
				history.go(-1);</script>";
			}
		}else{
			$imagen=mysqli_real_escape_string($conexion,$_POST['imagenVieja']);
			$sql="UPDATE menu SET nombre='$nombre', categoria='$categoria', te='$te', propiedades='$propiedades', ingredientes='$ingredientes', precio='$precio', media='$media', botella='$botella', imagen='$imagen' WHERE id='$id'";
				mysqli_query($conexion, $sql);
				$filas = mysqli_affected_rows($conexion); //devuelve el numero de filas afectadas en la ultima consulta
				if($filas>0){ //si la consulta se ejecuto correctamente
					echo "<script type='text/javascript'>alert('Producto modificado con exito');
					window.location.href='../frm_listar_elementos_menu.php?categoria=$categoria';</script>"; //si se creo el usuario cargue de nuevo el formulario
				}else{
					echo "<script type='text/javascript'>alert('Error, no se modifico el producto');
					history.go(-1);</script>"; //si no se creo vuelve atras
				}
	}

		
	}elseif($accion=='eliminar'){
		$id=mysqli_real_escape_string($conexion, $_GET['id']);
		$categoria=mysqli_real_escape_string($conexion, $_GET['categoria']);
		$sql="DELETE FROM menu WHERE id='$id'";
		$resultado = mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		if($resultado){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Producto eliminado con exito');
			window.location.href='../frm_listar_elementos_menu.php?categoria=$categoria';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
			echo "<script type='text/javascript'>alert('Error, no se elimino el producto');
			history.go(-2);</script>"; //si no se creo vuelve atras
		}
	}
?>
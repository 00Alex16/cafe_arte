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
	$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
	$clave=mysqli_real_escape_string($conexion,$_POST['clave']);
	$clave2=mysqli_real_escape_string($conexion,$_POST['clave2']);
	$tipo=mysqli_real_escape_string($conexion,$_POST['tipo']);
	if($clave==$clave2){
		$salt = 'Al3x'; //Encriptacion de la clave
		$clave = sha1(md5($salt . $clave));
		$sql="INSERT INTO usuarios (id, nombre, clave, tipo) VALUES ('$id', '$nombre', '$clave', '$tipo')";
		mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		$filas = mysqli_affected_rows($conexion);
		if($filas>0){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Usuario creado con exito');
			window.location.href='../frm_crear_usuarios.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
		}else{
			echo "<script type='text/javascript'>alert('Error, no se creo el usuario');
			history.go(-1);</script>"; //si no se creo vuelve atras
		}
	}else{ // si las claves no son iguales
		echo "<script type='text/javascript'>alert('Error, las claves no coinciden');
			history.go(-1);</script>"; //si no se creo vuelve atras
	}
	}elseif($accion=='editar'){
		$id=mysqli_real_escape_string($conexion, $_POST['id']);
		$nombre=mysqli_real_escape_string($conexion,$_POST['nombre']);
		$tipo=mysqli_real_escape_string($conexion,$_POST['tipo']);
		$estado=mysqli_real_escape_string($conexion,$_POST['estado']);
		$sql="UPDATE usuarios SET nombre='$nombre', tipo='$tipo', estado='$estado' WHERE id='$id'";
		mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		$filas = mysqli_affected_rows($conexion);
		if($filas>0){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Usuario modificado con exito');
			window.location.href='../frm_listar_usuarios.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
			echo "<script type='text/javascript'>alert('Error, no se modifico el usuario');
			history.go(-1);</script>"; //si no se creo vuelve atras
		}
	}elseif($accion=='eliminar'){
		$id=mysqli_real_escape_string($conexion, $_GET['id']);
		$sql="UPDATE usuarios SET estado='Eliminado' WHERE id='$id'";
		mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		$filas = mysqli_affected_rows($conexion);
		if($filas>0){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Usuario eliminado con exito');
			window.location.href='../frm_listar_usuarios.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
			echo "<script type='text/javascript'>alert('Error, no se elimino el usuario');
			history.go(-2);</script>"; //si no se creo vuelve atras
		}
	}elseif($accion=='resetear'){
		$id=mysqli_real_escape_string($conexion, $_GET['id']);
		$salt = 'Al3x'; 
		$clave = sha1(md5($salt . $id));
		$sql="UPDATE usuarios SET clave='$clave' WHERE id='$id'";
		mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		$filas = mysqli_affected_rows($conexion);
		if($filas>0){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Clave de usuario reseteada con exito');
			window.location.href='../frm_listar_usuarios.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
			}else{
			echo "<script type='text/javascript'>alert('Error, no se reseteo la clave del usuario');
			history.go(-2);</script>"; //si no se creo vuelve atras
		}
	}elseif($accion=='cambiarClave'){
	$id=$_SESSION['id'];
	$claveActual=mysqli_real_escape_string($conexion,$_POST['claveActual']);
	$clave=mysqli_real_escape_string($conexion,$_POST['clave']);
	$clave2=mysqli_real_escape_string($conexion,$_POST['clave2']);
	if($clave==$clave2){
		$salt = 'Al3x'; //Encriptacion de la clave
		$clave = sha1(md5($salt . $clave));
		$claveActual = sha1(md5($salt . $claveActual));
		$sql="UPDATE usuarios SET clave='$clave' WHERE id='$id' AND clave='$claveActual'";
		mysqli_query($conexion, $sql); //ejecutamos la consulta sql
		$filas = mysqli_affected_rows($conexion); //devuelve el numero de filas afectadas en la ultima consulta
		if($filas>0){ //si la consulta se ejecuto correctamente
			echo "<script type='text/javascript'>alert('Clave cambiada con exito');
			window.location.href='../index.php';</script>"; //si se creo el usuario cargue de nuevo el formulario
		}else{
			echo "<script type='text/javascript'>alert('Error, clave actual incorrecta o error de servidor');
			history.go(-1);</script>"; //si no se creo vuelve atras
		}
	}else{ // si las claves no son iguales
		echo "<script type='text/javascript'>alert('Error, las claves no coinciden');
			history.go(-1);</script>"; //si no se creo vuelve atras
	}
}
?>
<?php 
include "conexion.php"; //llamado a la clase de la conexion a la DB

$id = $_POST["id"]; //recogemos el id del usuario que se envio por POST
$clave = $_POST["clave"]; //recogemos la clave que se envio por POST
$salt = 'Al3x'; 
$clave = sha1(md5($salt . $clave));
$sql = "SELECT * FROM usuarios WHERE id= '$id' && clave='$clave' && estado='Activo'";
//consulta para ver si los datos de inicio son validos, se extraen todos los campos
$resultado = mysqli_query($conexion, $sql); //ejecutamos la consulta sql

if (mysqli_num_rows($resultado) > 0) { //si se obtuvo un resultado positivo(las credenciales son correctas)
	$usuario=mysqli_fetch_array($resultado); //convierta la lista de campos a un array asociativo (para usar los titulos de los campos)
		session_start(); //creamos una sesion de php
		$_SESSION["id"] = $usuario["id"]; //creamos la variable de sesion id
		$_SESSION["nombre"] = $usuario["nombre"]; //creamos la variable de sesion nombre
		$_SESSION["documento"] = $usuario["id"]; //creamos la variable de sesion documento
		$_SESSION["rol"] = $usuario["tipo"]; //creamos la variable de sesion rol
	header("Location: ../index.php"); //cargamos el index
}else{
	echo "<script type='text/javascript'>alert('No se puede iniciar sesion');
	window.location.href='../login.php';</script>"; //si las credenciales no son correctas muestra este mensaje en un cuadro de dialogo
	}
 ?>


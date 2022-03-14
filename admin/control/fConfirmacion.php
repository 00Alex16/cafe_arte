<?php 
include('conexion.php'); 
$accion=mysqli_real_escape_string($conexion,$_POST['accion']);
$id=mysqli_real_escape_string($conexion,$_POST['id']);
$elemento="";
if(isset($_POST['elemento'])){
	$elemento=mysqli_real_escape_string($conexion, $_POST['elemento']);
}
if($accion=='eliminar'){
	$mensaje="¿Esta seguro de eliminar el $elemento?";
}else{
	$mensaje="¿Esta seguro de resetear la clave?";
}
if($elemento=='usuario'){
	echo "<script type='text/javascript'> if(confirm('$mensaje')){
				window.location.href='fUsuarios.php?accion=$accion&id=$id';
			}else{
				history.go(-1);
			}</script>";
}elseif($elemento=='producto'){
	$categoria=mysqli_real_escape_string($conexion, $_POST['categoria']);
	echo "<script type='text/javascript'> if(confirm('$mensaje')){
				window.location.href='fMenu.php?accion=$accion&id=$id&categoria=$categoria';
			}else{
				history.go(-1);
			}</script>";
		}elseif($elemento=='categoria'){
			echo "<script type='text/javascript'> if(confirm('$mensaje')){
				window.location.href='fMenu.php?accion=$accion&id=$id';
			}else{
				history.go(-1);
			}</script>";
		}
?>
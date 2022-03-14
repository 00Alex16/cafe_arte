<?php 
session_start(); //invocamos el sistema de sesiones de php
if(!isset($_SESSION["documento"])){ //si existe la variable de sesion llamada documento
	$ruta=substr(getcwd(), -7);
	if($ruta=='control'){
		header("Location: ../login.php");
	}else{
		header("Location: login.php");
	}
}
 ?>

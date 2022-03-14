<?php 
session_start(); //abrimos sistema de sesiones php

session_destroy(); //destruimos las variables de sesion existentes
header("Location: ../login.php") //cargamos de nuevo el login
 ?>
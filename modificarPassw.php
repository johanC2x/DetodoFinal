<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse(); 
	$ck1 = $_POST["ck1"];
	$ck2 = $_POST["ck2"];
	$pass = $_POST["pass"];

	$sql = "UPDATE usuario set contrasenia = '$pass' WHERE ";

	echo $ck1;
	echo $ck2;
 ?>
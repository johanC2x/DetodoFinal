<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtUsuario = $_POST['txtUsuario'];
	$txtClave = $_POST['txtClave'];
	$sql = "SELECT usu.idusuario, usu.nombre, usu.apepat, usu.apemat, usu.edad, usu.nickname, usu.contrasenia, usu.flgstatus, usu.direccion 
			FROM usuario usu
			WHERE usu.nickname = '$txtUsuario' and usu.contrasenia = '$txtClave'";
	$result = mysql_query($sql);
	if($rsUsuario = mysql_fetch_array($result)){
		$_SESSION['nickname']=$rsUsuario['nickname'];
		$_SESSION['idusuario']=$rsUsuario['idusuario'];
		/*echo $_SESSION['idusuario'];*/
		echo"<script type=\"text/javascript\">alert(\"Sesión Iniciada\");</script>";
		echo"<script type=\"text/javascript\">window.location.href='principal.php';</script>";
	}else{
		echo"<script type=\"text/javascript\">alert(\"Datos incorrectos\");</script>";
		echo"<script type=\"text/javascript\">window.location.href='index.php';</script>";
	}
?>
<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$archivo = $_POST["archivo"];
	$user = $_POST["user"]; 
	$txtIdUsuario = $_SESSION['idusuario'];
	$message = $_POST["message"];
	$sql = " INSERT INTO post(usuario_idusuario,descripcion,flgpost,idArchivo) 
			 VALUES ('$txtIdUsuario','$message',1,'$archivo')";
	$result = mysql_query($sql);
	echo $user."".$archivo;
	if($result)
		echo "Operacion Correcta";

?>
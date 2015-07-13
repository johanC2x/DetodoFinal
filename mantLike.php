<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdArchivo = $_POST["txtIdArchivo"];
	$sql = "INSERT INTO liker(flgLike,idarchivo) 
			VALUES (1,'$txtIdArchivo')";
	$result = mysql_query($sql);
	echo "Esto te gusto"; 
?>

 
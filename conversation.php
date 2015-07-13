<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdUsuario = $_SESSION['idusuario'];
	$archivo = $_POST["archivo"];
	$sql = "SELECT p.idpost, p.usuario_idusuario, p.descripcion, p.flgpost, p.idArchivo , usu.nombre , usu.nickname
			FROM post p
			inner join usuario usu on p.usuario_idusuario = usu.idusuario 
			WHERE  p.idArchivo = '$archivo' ORDER BY p.idpost";/*usu.idusuario = '$txtIdUsuario' and*/
	$result = mysql_query($sql);
	while ($data = mysql_fetch_array($result)) {
		echo "<p><b>".$data["nickname"]."</b> dice: ".$data["descripcion"]."</p>";
	}
?>
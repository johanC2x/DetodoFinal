<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdUsuario = $_SESSION['idusuario'];
	$sql = "UPDATE usuario SET flgActivo = 0 
            WHERE idusuario = '$txtIdUsuario'";
    $result = mysql_query($sql);
    session_destroy();
    echo "Sesion Cerrada";
    echo"<script type=\"text/javascript\">window.location.href='index.php';</script>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
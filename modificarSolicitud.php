<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario']; 
    $usuarioemi = $_POST["usuarioemi"];
    $usuario_idusuario = $_POST["usuario_idusuario"];
    $idsolicitudes = $_POST["idsolicitudes"];
 	$mail = "";
 	$mail2 = "";
 	$master = "admin@DetoD0.com";
 	$usuario = ""; 
    $sql = "UPDATE solicitudes
		    SET    
		    flgstatus = 0
		    WHERE usuarioemi = '$usuarioemi'
		    and usuario_idusuario = '$usuario_idusuario'
		   	and idsolicitudes = '$idsolicitudes'";
	echo $sql;  
	$resultSol = mysql_query($sql);
	$sql2 = "SELECT idusuario,nombre,apepat,apemat,edad,nickname,
			 contrasenia,flgstatus,direccion,flgActivo,mail 
			 FROM usuario WHERE idusuario = '$usuarioemi'"; 
	$resultado = mysql_query($sql2);
	$resultRemi = mysql_fetch_array($resultado);
	$mail = $resultRemi["mail"];  
	$sql3 = "SELECT idusuario,nombre,apepat,apemat,edad,nickname,
			 contrasenia,flgstatus,direccion,flgActivo,mail 
			 FROM usuario WHERE idusuario = '$usuario_idusuario'"; 
  	$result = mysql_query($sql3);
  	$resultUsuario = mysql_fetch_array($result);
  	$mail2 = $resultUsuario["mail"];
  	$usuario = $resultUsuario["nickname"]; 
  	$asunto="Solicitud aceptada";
	$mensaje = "<b>$usuario</b> (<span style='color:red;'>$mail2</span>) ha aceptado tu solicitud, ahora son eres parte de un todo."."<br/>";
    $headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html;charset=UTF-8\r\n";
	$headers.= "From:DetoD0.com <$master>"; 
	if($mail!=""){
		mail($mail,$asunto,$mensaje,$headers);
		echo "Mensaje Enviado";
	}
	
 ?>
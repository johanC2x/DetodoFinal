<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtUser = $_POST['txtUser'];
	$txtPass = $_POST['txtPass'];
	$txtMail = $_POST['txtMail'];
	$txtNombre = $_POST['txtNombre'];
	$txtApePat = $_POST['txtApePat'];
	$txtApeMat = $_POST['txtApeMat'];
	$txtEdad = $_POST['txtEdad'];
	$txtDireccion = $_POST['txtDireccion'];

	$postMaster = "johins2x@gmail.com";
	
	$mail = "Registro Exitoso en Detodo.com <span style='color:red'>Bienvenido</span>";
	$titulo = "Registro Exitoso";
	//cabecera
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	//dirección del remitente 
	$headers .= "From: DetoD0.com <$postMaster>\r\n";
	//Enviamos el mensaje a info@geekytheory.com 
	$bool = mail($txtMail,$titulo,$headers,$mail);
	if($bool){
    	echo "Mensaje enviado";
	}else{
    	echo "Mensaje no enviado";
	}
 
	$sql="INSERT INTO usuario(nombre,apepat,apemat,edad,nickname,contrasenia,direccion,flgstatus,mail) 
	      VALUES 
	      ('$txtNombre','$txtApePat','$txtApeMat','$txtEdad','$txtUser','$txtPass','$txtDireccion',1,'$txtMail')";  
	$usuario = mysql_query($sql);
	echo"<script type=\"text/javascript\">alert(\"Operacion Correcta\");</script>";
	echo"<script type=\"text/javascript\">window.location.href='index.php';</script>";
	$sql2="SELECT idusuario from usuario"; 
	$usuario2 = mysql_query($sql2);
	echo "$usuario2";
?>
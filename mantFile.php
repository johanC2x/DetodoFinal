<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdUsuario = $_POST['txtIdUsuario'];
	$cboTipoArchivo = $_POST['cboTipoArchivo'];
	$txtNombreFile = $_POST['txtNombreFile'];
	$txtDescFile = $_POST['txtDescFile'];
	/*$rutaEnServidor = "../subidas/".$_FILES['$txtFile ']['name'];*/
	/*$ruta = "subidas/".$_FILES['$txtFile ']['name'];*/

	if ($txtIdUsuario=="" || $cboTipoArchivo=="" || $txtNombreFile=="") {
		echo "<script>
					  alert('No se permiten nulos!!');
					  window.location='panelControl.php';	
			  </script>";
	}else{
		if ($_FILES['file']["error"] > 0)
	  {
	  echo "Error: ".$_FILES['file']['error']."<br>";
	  echo'<script type="text/javascript">
						 alert("Hubo un error");
						 window.location="panelControl.php";
						 </script>';
	  }
	else
	  {
	  	$carpeta="subidas/";
		opendir($carpeta);
		$destino = $carpeta.$_FILES['file']['name'];
		copy($_FILES['file']['tmp_name'], $destino);
		/*echo "Archivo Subido Exitosamente";*/
		$nombre = $_FILES['file']['name'];
		/*echo $_FILES['file']['name'];*/
		$ruta = $carpeta.$nombre;
		/*echo "<img src=\"subidas/$nombre\">";*/
	  	/*move_uploaded_file($_FILES['$txtFile ']['tmp_name'],"subidas/".$_FILES['$txtFile ']['name']);*/
	  	$file = "INSERT INTO archivo(usuario_idusuario,codigo_idcodigo,nombre,descripcion,creaFecha,posteo) 
	  			 VALUES('$txtIdUsuario','$cboTipoArchivo','$txtNombreFile','$ruta',CURDATE(),'$txtDescFile')";
		$resultFile = mysql_query($file);
		echo'<script type="text/javascript">
						 alert("Operacion Correcta");
						 window.location="panelControl.php"
						 </script>';
	  }
	}

?>
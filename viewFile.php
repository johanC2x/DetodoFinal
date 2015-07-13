<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$sql = "SELECT idarchivo,usuario_idusuario,codigo_idcodigo,nombre,descripcion from archivo";
	$result = mysql_query($sql);
	echo $result."<br>";
	echo "Operacion con exito";
	$resultFile=mysql_fetch_array($result);
	$data = 0;
	if($_POST){
		foreach ($resultFile as $file){
   			echo '<img class="img-responsive img-hover" src="'.$file['descripcion'].'"/>'; 
			echo "Cargo imagen";
			echo "<p>".$file['nombre']."</p>";
   		}
	}
?>
<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario'];
    $idusuario = $_POST["idusuario"]; 
    $miArray = "";
    try {
    	$sql = "INSERT INTO solicitudes(usuario_idusuario,flgstatus,usuarioemi) 
    			VALUES ('$txtIdUsuario',1,'$idusuario')";
    	$result = mysql_query($sql);
    	$miArray[]=array('cRespuesta'=>'ok');
    } catch(ErrorException $e){
		$miArray[]=array("cRespuesta"=>$e->getMessage());
	}catch(Exception $e){
		$miArray[]=array("cRespuesta"=>$e->getMessage());
	}echo json_encode($miArray);  
 ?>

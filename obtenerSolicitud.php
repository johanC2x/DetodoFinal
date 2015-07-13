<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario']; 
    $miArray=""; 
 	try{
 		$notificacion = "SELECT sol.idsolicitudes,sol.usuario_idusuario, 
                     sol.idtiposolicitud,sol.flgstatus,sol.usuarioemi,
                     usu.nombre,usu.apepat,usu.apemat,usu.nickname
                     FROM solicitudes sol
                     inner join usuario usu on sol.usuarioemi = usu.idusuario
                     WHERE sol.usuario_idusuario = '$txtIdUsuario' and sol.flgstatus = 1";
        $result = mysql_query($notificacion);
        while($resultNoti = mysql_fetch_array($result)){
        	$miArray[]=array(
        						'nickname' => $resultNoti["nickname"],
        						'usuarioemi' => $resultNoti["usuarioemi"],
        						'usuario_idusuario' => $resultNoti["usuario_idusuario"],
        						'idsolicitudes' => $resultNoti["idsolicitudes"],
        					);
        	}
 	}catch(ErrorException $e){
		$miArray[]=array("cRespuesta"=>$e->getMessage());
	}catch(Exception $e){
		$miArray[]=array("cRespuesta"=>$e->getMessage());
	}
	echo json_encode($miArray);
 ?>
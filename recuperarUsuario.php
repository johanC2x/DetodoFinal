<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();  
    $correo = $_POST["correo"];
    $nombreFull = $_POST["nombreFull"];
    $miArray="";
    try{
    	$sql = "SELECT idusuario,nombre,apepat,apemat,edad,nickname,contrasenia, 
				flgstatus,direccion,mail FROM usuario
				WHERE    
				concat(nombre,'',apepat,'',apemat) like('$nombreFull%') and
				mail like('$correo%')"; 
		$result = mysql_query($sql);
		while($resultUsu = mysql_fetch_array($result)){
			if($correo!=""){
				$miArray[] = array(
								'nombre' => $resultUsu["nombre"],
								'apepat' => $resultUsu["apepat"],
								'apemat' => $resultUsu["apemat"],
								'mail' => $resultUsu["mail"],
								'nickname' => $resultUsu["nickname"],
								'idusuario' => $resultUsu["idusuario"]
							   );
			}else{
				if($nombreFull!=""){
					$miArray[] = array(
								'nombre' => $resultUsu["nombre"],
								'apepat' => $resultUsu["apepat"],
								'apemat' => $resultUsu["apemat"], 
								'nickname' => $resultUsu["nickname"],
								'idusuario' => $resultUsu["idusuario"],
							   );
				}
			} 
		}
    }catch(ErrorException $e){
		$miArray[]=array("cRespuesta"=>$e->getMessage());
	}catch(Exception $e){
		$miArray[]=array("cRespuesta"=>$e->getMessage());
	} 
	echo json_encode($miArray);
 ?>
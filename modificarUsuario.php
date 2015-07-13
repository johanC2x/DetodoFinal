<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario'];  
    $txtIdUserConf = $_POST["txtIdUserConf"];
	$txtNomConf = $_POST["txtNomConf"];
	$txtApePatConf = $_POST["txtApePatConf"];
	$txtApeMatConf = $_POST["txtApeMatConf"];
	$txtUserConf = $_POST["txtUserConf"];
	$txtPassConf = $_POST["txtPassConf"];
	$txtMailConf = $_POST["txtMailConf"]; 
	$postMaster = "johins2x@gmail.com"; 
	$asunto="Modificacion exitosa";
	$mensaje="Usted a modificado exitosamente sus datos."."<br/>";
	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html;charset=UTF-8\r\n";
	$headers.= "From:DetoD0.com <$postMaster>";

	//Ejecutando Codigo
    $sql = "UPDATE usuario
    		SET 
    		nombre = '$txtNomConf',
    		apepat = '$txtApePatConf',
    		apemat = '$txtApeMatConf',
    		nickname = '$txtUserConf',
    		contrasenia = '$txtPassConf'
    		WHERE idusuario = '$txtIdUserConf'"; 
    echo $sql;
    $result = mysql_query($sql);
    if($result){
    	echo"<script type=\"text/javascript\">alert(\"Operacion Correcta\");</script>"; 
    }else{
    	echo"<script type=\"text/javascript\">alert(\"Operacion Fallida\");</script>"; 
    } 
    //Enviando Email
    if($txtMailConf != ""){
    	mail($txtMailConf,$asunto,$mensaje,$headers); 
    }else{
    	"No tiene Correo";
    }
	
	echo "EMAIL ENVIADO..."; 
 ?>
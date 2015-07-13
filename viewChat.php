<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdUsuario = $_SESSION['idusuario'];
	$idusuario = $_GET["idusuario"];
	$sql = "SELECT idusuario, nombre, apepat, apemat, edad, nickname from usuario";
	$result = mysql_query($sql);
	$resultCon = mysql_fetch_array($result);
	echo $idusuario;
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>DetoDo.com</title>
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!--Jquery ui-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="kartik/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/link.js"></script>
</head>
<body>
	<div  class="container-fluid">
			<section  style="padding: 15%;">			
				<div class="row">				
					<h1 class="text-center">Chat: <small>DetoDo's</small></h1>	
					<hr>
				</div>	
				<div class="row">
					<form id="formChat" role="form">
						<div class="form-group">
							<label for="user">Usuario</label>
							<input type="text" class="form-control" id="user" name="user" placeholder="<?php echo $resultCon['nickname']?>" readonly = "true">
						</div>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12" >
									<div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">				
							<label for="message">Mensaje</label>
							<textarea id="message" name="message" placeholder="Ingresa Mensaje"  class="form-control" rows="3"></textarea>
						</div>
						<button id="send" class="btn btn-primary" >Enviar</button>						
					</form>
				</div>
			</section>	
		</div>	
</body>
</html>
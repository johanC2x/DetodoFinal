<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdUsuario = $_SESSION['idusuario']; 
	$sql = "SELECT idusuario , nombre , apepat , apemat from usuario WHERE flgActivo = 1";
 	$result = mysql_query($sql);
 	$resultUsuario = mysql_fetch_array($result);
 	$txtNombre = $resultUsuario['nombre'];
 	$txtApePat = $resultUsuario['apepat'];
 	$txtApeMat = $resultUsuario['apemat'];
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
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 </head>
 <body>
 <div class="container">
	<div class="row">
	    <div class="col-lg-12">
	        <h2 class="page-header">Service Tabs</h2>
	    </div>
	    <div class="col-lg-12">
            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active" style="width:250px;"><a href="#service-one" data-toggle="tab"><i class="fa fa-tree"></i>Perfil</a>
                </li>
                <li class="" style="width:250px;"><a href="#service-two" data-toggle="tab"><i class="fa fa-car"></i>Seguridad</a>
                </li>
            </ul>
            <div class="container">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one" style="padding:20px">
                	<div class="row">
                		<p style="font-size:18px"><?php echo $txtNombre." ".$txtApePat." ".$txtApeMat." "; ?><span><a href="#" style="color:red">cambiar</a></span></p>
                	</div>
                	<br>
                	<br>
                	<div class="row">
                	<p style="font-size:18px">Correo Electronico</p>
                	</div>
                </div>
                <div class="tab-pane fade" id="service-two">
                	
                </div>
            </div>
            </div>
        </div>
	</div>
</div>
<!-- ====================================| JQUERY |================================================== -->
	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>
<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario']; 
    $rsUsuario = "SELECT idusuario , nombre , apepat , apemat from usuario WHERE flgActivo = 1";
	            /*Cargar tabla Usuario*/ 
	$resultUsuario = mysql_query($rsUsuario);
 ?>

<!DOCTYPE html>
<html>
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

    <!--Admin CSS-->
    <link href="css/admin.css" rel="stylesheet">

    <!--Jquery ui-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="kartik/css/fileinput.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/link3.js"></script>
    <script src="js/funciones.js"></script>
    <script type="text/javascript">
        obtenerSol();
    </script>
</head>
<body>
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="principal.php"><span style="color:red">..::</span> DetoDo <span style="color:red">::..</span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="principal.php">Inicio</a>
                    </li>
                    <li> 
                        <!--<a id="linkPost" href="#" data-toggle="modal" data-target="#popPost">Post</a>-->
                        <a id="linkPost" href="panelControl.php">Galeria</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#popUpload" >Subir</a>
                    </li>
                    <li>
                        <a id="linkPapelera" href="#" data-toggle="modal" data-target="#popUsuario">Contactos</a> 
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buscar<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="linkArchivo" href="buscarArchivo.php">Archivos</a>
                            </li>
                            <li>
                                <a id="linkBlog" href="buscarBloggero.php">Blogeros</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown" >
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul id="ulSol" class="dropdown-menu dropdown-alerts"> 
                        </ul>
                    </li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">En Sesión: <span style="color:red"><?php echo $_SESSION['nickname'] ?></span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="linkConfiguracion" href="#">Configuración</a>
                            </li>
                            <li>
                                <a href="cerrarSesion.php">Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse  ;float:right;padding-right:20px;-->
        </div>
        <!-- /.container -->
    </nav>

<!--=================================================================================-->
	<div id="contentBloggero" class="be-color">
		<form role="form">
			<div class="form-group">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<input id="txtNomBloggeroFiltro" type="text" class="form-control">
						</div>
						<div class="col-md-6">
							<input type="button" value="Buscar" class="btn btn-primary" 
								   style="width:150px" onclick="obtenerBloggeroFiltro()">
						</div>
					</div>
				</div>
			</div>
		</form>	
	</div>
	<hr>
	<div id="responseBloggero"></div>
	
<!-- ====================================| popUpPost |================================================== -->
        <!--Modal Servicio_7-->
        <div class="modal fade" id="popUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog" style="width:800px;height:300px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Nuevo Post
                </h4>
              </div>
              <div id="nuevaAventura" class="modal-body" >
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-comment fa-stack-1x fa-inverse"></i>
                              <!--<i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>-->
                        </span> 
                    </div>
                    <div class="media-body" > 
                        <div class="row">
                            <div class="col-md-12" >
                            <center>
                                <table class="table table-hover">
                                    <tr class="success">
                                        <td>Codigo</td>
                                        <td>Nombre</td>
                                        <td>Apellido Paterno</td>
                                        <td>Apellido Materno</td>
                                        <td>Acciones</td>
                                    </tr>
                                    <?php
                                        while($resultUsuarioFull=mysql_fetch_array($resultUsuario)) {
                                    ?>
                                    <tr>
                                        <td ><?php echo $resultUsuarioFull['idusuario']; ?></td>
                                        <td ><?php echo $resultUsuarioFull['nombre']; ?></td>
                                        <td ><?php echo $resultUsuarioFull['apepat']; ?></td>
                                        <td ><?php echo $resultUsuarioFull['apepat'];?></td> 
                                        <td>
                                            <center>
                                                <a href="viewChat.php?idusuario=<?php echo $resultUsuarioFull['idusuario']?>">
                                                    <img class="img-circle" src="img/bs_7.jpg" width="10px" height="10px">
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                    ?>
                                </table> 
                            </center>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>       
              </div>
            </div>
          </div>
        </div>
<!-- ====================================================================================== -->




	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>


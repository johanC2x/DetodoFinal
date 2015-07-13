<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario']; 
                /*Obtener IdUsuario en Sesion*/

    $rsStatus = "UPDATE usuario SET flgActivo = 1 
                 WHERE idusuario = '$txtIdUsuario'"; 
                 /*Modificar Tabla usuario*/

    $rsUsuario = "SELECT idusuario , nombre , apepat , apemat from usuario WHERE flgActivo = 1";
	            /*Cargar tabla Usuario*/ 

    $rsCodigo ="SELECT idcodigo,codigo,descripcion,creaFecha FROM codigo 
				WHERE codigo = 'tipoArchivo'";
                /*Cargar tabla archivos tipoArchivo*/
 
    $rsCodigoPost = "SELECT idcodigo,codigo,descripcion,creaFecha FROM codigo 
                     WHERE codigo = 'tipoPost'";
            /*Cargar tabla codigo tipoPost*/
 
    $file = "SELECT a.idarchivo,a.usuario_idusuario,a.codigo_idcodigo,a.nombre,a.descripcion,a.creaFecha,a.posteo,usu.nickname
             from archivo a
             left join usuario usu on a.usuario_idusuario = usu.idusuario
             where a.usuario_idusuario = '$txtIdUsuario'";
             /*Cargar tabla archivos*/

    $usuario = "SELECT idusuario,nombre,apepat,apemat,edad,nickname,contrasenia, 
                flgstatus,direccion,mail FROM usuario 
                WHERE idusuario = '$txtIdUsuario'"; 

    $notificacion = "SELECT sol.idsolicitudes,sol.usuario_idusuario, 
                     sol.idtiposolicitud,sol.flgstatus,sol.usuarioemi,
                     usu.nombre,usu.apepat,usu.apemat,usu.nickname
                     FROM solicitudes sol
                     inner join usuario usu on sol.usuarioemi = usu.idusuario
                     WHERE sol.usuario_idusuario = '$txtIdUsuario' and sol.flgstatus = 1
                     order by sol.usuario_idusuario DESC LIMIT 2";

	$codigo = mysql_query($rsCodigo); 
    $codigoPost = mysql_query($rsCodigoPost);
    $resultFile = mysql_query($file);
    $resultStatus = mysql_query($rsStatus);
    $resultUsuario = mysql_query($rsUsuario);
    $resultConfUsu = mysql_query($usuario);
    $resultNoti = mysql_query($notificacion);
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
    <script src="js/link3.js"></script>
    <script src="js/funciones.js"></script>
    <!--<script type="text/javascript" src="js/link.js"></script>-->
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        a{
            cursor: pointer;
        }
    </style>

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
                <a class="navbar-brand" href="panelcontrol.php"><span style="color:red">..::</span> DetoDo <span style="color:red">::..</span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a onclick="activarLink()" href="principal.php">Inicio</a>
                    </li>
                    <li> 
                        <!--<a id="linkPost" href="#" data-toggle="modal" data-target="#popPost">Post</a>-->
                        <a onclick="activarLink()" id="linkPost" href="panelControl.php">Galeria</a>
                    </li> 
                    <li>
                        <a onclick="activarLink()" id="linkSubir" href="#" data-toggle="modal" data-target="#popUpload" >Subir</a>
                    </li>
                    <li>
                        <a onclick="activarLink()" id="linkPapelera" href="#" data-toggle="modal" data-target="#popUsuario">Contactos</a> 
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buscar<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li> 
                                <a onclick="activarLink()" id="linkArchivo" href="buscarArchivo.php">Archivos</a>
                            </li>
                            <li>
                                <a onclick="activarLink()" id="linkBlog" href="buscarBloggero.php">Blogeros</a>
                            </li>
                        </ul>
                    </li> 
                    <li class="dropdown" >
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul id="ulSol" class="dropdown-menu dropdown-alerts">
                            <!--
                                cambio 
                                <?php while($resultDatNoti=mysql_fetch_array($resultNoti)){ ?>
                                    <li>   
                                        <a href="#" onclick="modificarSolicitud(<?php echo $resultDatNoti['usuarioemi']; ?>,<?php echo $resultDatNoti['usuario_idusuario']; ?>,<?php echo $resultDatNoti['idsolicitudes']; ?>)"> 
                                            <div>
                                                <i class="fa fa-bell fa-fw"></i> Responder Notificacion
                                                <span class="pull-right text-muted small">Enviada por: <?php echo $resultDatNoti["nickname"]; ?> </span>
                                            </div>
                                        </a> 
                                    </li>
                                <?php } ?>
                            -->
                        </ul>
                    </li> 
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">En Sesión: <span style="color:red"><?php echo $_SESSION['nickname'] ?></span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a onclick="activarLink()" id="linkConfiguracion" href="#" data-toggle="modal" data-target="#popUpConfiguracion">Configuración</a>
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
	<hr>
<!--====================================== |Cuerpo de La pagina| ======================================================-->
<!-- Page Content -->
<div id="contenido">
    <div class="container"> 

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blog DetoDo
                    <small>Resumen</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="panelControl.php">Inicio</a>
                    </li>
                    <li class="active">Blog</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Blog Post Row -->
        <?php
            $i = 0;
            while($resultCodigoPost=mysql_fetch_array($resultFile)) {
            $i = $i + 1;
        ?>
        <div class="row">
            <div class="col-md-1 text-center">
                <p><i class="fa fa-camera fa-4x"></i>
                </p>
                <!--<p>June 17, 2014</p>-->
                <p><?php echo $resultCodigoPost['creaFecha']?></p> 
            </div>
            <div class="col-md-5" id="cargaImagen">
                <input type="hidden" id="<?php echo 'txtIdArchivo'.$i;?>" name="txtIdArchivo" value="<?php echo $resultCodigoPost['idarchivo']?>">
                <img class="img-responsive img-hover" width="300px" height="300px" src="<?php echo $resultCodigoPost['descripcion']?>"/>
            </div>
            <div class="col-md-6">
                <h3>
                    <a href="blog-post.html"><?php echo $resultCodigoPost['nombre']?></a>
                </h3>
                <p>by <a href="#"><?php echo $_SESSION['nickname'] ?></a>
                </p>
                <p style="text-align:justify">
                    <?php echo $resultCodigoPost['posteo'];?>  
                </p> 
                <a class="btn btn-primary" href="viewArchivo.php?idarchivo=<?php echo $resultCodigoPost['idarchivo']?>">Ver Mas<i class="fa fa-angle-right"></i></a>
                <a style="color:red" id="btnLike" onclick="registroLike(<?php echo $i;?>)" />Liker</a>
                <div id="<?php echo 'resultado'.$i;?>" style="background-color:red;padding:10px" ></div>
            </div>
        </div>
        <?php
            }
        ?> 
        <!-- /.row -->
        <hr>
        <br>
        <br>
        <br>
        <br>
    </div>
</div>
<hr style="border-color:red;">  
<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12" style="margin-left:20px;">
            <p>Copyright &copy; DetoD0 2015</p>
        </div>
    </div>
</footer>
<!--============================================== |Fin| ======================================================-->


<!-- ====================================| popUpFile |================================================== -->
    	<!--Modal Servicio_7-->
        <div class="modal fade" id="popUpload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Subir Archivo
                </h4>
              </div>
              <div id="nuevaAventura" class="modal-body">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-file-archive-o fa-stack-1x fa-inverse"></i>
                              <!--<i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>-->
                        </span> 
                    </div>
                    <div class="media-body">
                        <div class="row">
						    <div class="col-md-12" style="margin:0 auto;"> 
								<form id="frm" role="form" action="mantFile.php" method="POST" enctype="multipart/form-data">
									<div class="control-group" style="width:350px;">
									<input type="hidden" value="<?php echo $_SESSION['idusuario']?>" name="txtIdUsuario"/>
										<table style="width:500px;height:200px;">
											<tr>
												<td style="padding:20px">
													<label for="txtNombreFile">Nombre</label>
												</td>
												<td>
													<div class="form-group" style="width:350px;"> 
	                                                	<input type="text" class="form-control" id="txtNombreFile" 
	                                                       placeholder="Ingrese Nombre de Archivo" name="txtNombreFile">
	                                                </div> 
												</td>
											</tr>
											<tr>
												<td style="padding:20px"> 
													<label class="control-label" for="txtFile">Tipo Archivo</label>
												</td>
												<td>
													<div class="form-group" style="width:360px;">
														<select class="form-control" id="sel1" name="cboTipoArchivo">
														    <option>Seleccionar</option> 
														    <?php
						    									while($resultCodigo=mysql_fetch_array($codigo)) {
															?>
															    <option value="<?php echo $resultCodigo['idcodigo']; ?>">
															    	<?php echo $resultCodigo['descripcion']; ?>
															    </option>
														    <?php
																}
															?>
														</select>
													</div>
												</td>
											</tr>
											<tr>
												<td style="padding:20px"> 
													<label class="control-label" for="filebutton">Elegir Archivo</label> 
												</td>
												<td style="width:360px">
													<div class="controls">
									    				<input id="file" type="file" class="file" data-preview-file-type="text" name="file">
									  				</div>
												</td>
											</tr>
                                            <tr></tr>
                                            <tr>
                                                <td>
                                                    <label class="control-label"></label>
                                                </td>
                                                <td>
                                                    <div class="form-group" style="width:360px;">
                                                        <textarea name="txtDescFile" rows="4" cols="50"></textarea>
                                                    </div>
                                                </td>
                                            </tr>
										</table>
										<button type="submit" class="btn btn-primary">Subir</button>
									</div>
								</form>
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


<!-- ====================================| popUpPost |================================================== -->
        <!--Modal Servicio_7-->
        <div class="modal fade" id="popPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog" style="width:800px;height:300px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Subir Archivo
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
                            <div class="col-md-12" style="margin:0 auto;"> 
                                <form role="form" action="mantFile.php" method="POST" enctype="multipart/form-data">
                                    <div class="control-group">
                                    <input type="hidden" value="<?php echo $_SESSION['idusuario']?>" name="txtIdUsuario"/>
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="form-group" style="width:200px;"> 
                                                        <label for="txtTituloPost">Nombre</label>
                                                         <input type="text" class="form-control" id="txtTituloPost" 
                                                                placeholder="Ingrese Titulo" name="txtTituloPost">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group" style="width:200px;">
                                                                <label class="control-label" for="txtFile">Tipo Post</label>
                                                                <select class="form-control" id="sel1" name="cboTipoArchivo">
                                                                    <option>Seleccionar</option> 
                                                                        <?php
                                                                            while($resultCodigoPost=mysql_fetch_array($codigoPost)) {
                                                                        ?>
                                                                    <option value="<?php echo $resultCodigo['idcodigo']; ?>">
                                                                        <?php echo $resultCodigoPost['descripcion']; ?>
                                                                    </option>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                </select>    
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group" style="width:650px;"> 
                                                        <label for="txtDesPost">Contenido</label>
                                                        <textarea id="descripcion" class="descripcion" name="descripcion" rows="400" cols="400" ></textarea>
                                                        <script type="text/javascript">
                                                            CKEDITOR.replace( 'descripcion' );
                                                        </script>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <button type="submit" class="btn btn-primary">Subir</button>
                                    </div>
                                </form>
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


<!-- ====================================| popUpPost |================================================== -->
        <!--Modal Servicio_7-->
        <div class="modal fade" id="popUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
          <div class="modal-dialog" style="width:800px;height:300px;">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Contactos
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

    <div id="popUpConfiguracion" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="margin:0 auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                        <h4 class="modal-title" id="myModalLabel">
                            Configuracion
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
                        <div class="media-body" style="width:700px;" > 
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <?php $resConfiguracion = mysql_fetch_array($resultConfUsu)?>
                                            <form role="form" >
                                                <fieldset class="scheduler-border">
                                                <legend class="scheduler-border">Datos Generales</legend>
                                                    <div class="form-group" > 
                                                        <label>Nombre</label>
                                                        <input id="txtNomConf" type="text" class="form-control" value="<?php echo $resConfiguracion['nombre']; ?>" />
                                                        <input id="txtIdUserConf" type="hidden" class="form-control" value="<?php echo $resConfiguracion['idusuario']; ?>" />                                        
                                                    </div>
                                                    <div class="form-group" >
                                                        <label>Apellido Paterno</label>
                                                        <input id="txtApePatConf" type="text" class="form-control" value="<?php echo $resConfiguracion['apepat']; ?>" />
                                                    </div>
                                                    <div class="form-group" >
                                                        <label>Apellido Materno</label>
                                                        <input id="txtApeMatConf" type="text" class="form-control" value="<?php echo $resConfiguracion['apemat']; ?>" />
                                                    </div>
                                                </fieldset>
                                            </form>
                                        <?php  ?> 
                                    </div>
                                    <div class="col-md-6">
                                        <form role="form" >
                                            <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Datos de la Cuenta</legend>
                                                <div class="form-group" > 
                                                    <label>Usuario</label>
                                                    <input id="txtUserConf" type="text" class="form-control" value="<?php echo $resConfiguracion['nickname']; ?>" />                                        
                                                </div>
                                                <div class="form-group" >
                                                    <label>Contraseña</label>
                                                    <input id="txtPassConf" type="text" class="form-control" value="<?php echo $resConfiguracion['contrasenia']; ?>" />
                                                    <input id="txtMailConf" type="hidden" class="form-control" value="<?php echo $resConfiguracion['mail']; ?>" />
                                                </div>
                                                <button type="button" onclick="mofificarUsuario()" class="btn btn-primary">Modificar</button>
                                            </fieldset>
                                        </form>
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
        </div>
    </div>
<div id="response" ></div>
<!-- ====================================================================================== -->
<script type="text/javascript">  
            function mofificarUsuario(){
                var txtNomConf = $("#txtNomConf").val();
                var txtApePatConf = $("#txtApePatConf").val();
                var txtApeMatConf = $("#txtApeMatConf").val();
                var txtUserConf = $("#txtUserConf").val();
                var txtPassConf = $("#txtPassConf").val();
                var txtIdUserConf = $("#txtIdUserConf").val();
                var txtMailConf = $("#txtMailConf").val();
                $.post(
                        "modificarUsuario.php",
                        {
                            txtIdUserConf:txtIdUserConf,
                            txtNomConf:txtNomConf,
                            txtApePatConf:txtApePatConf,
                            txtApeMatConf:txtApeMatConf,
                            txtUserConf:txtUserConf,
                            txtPassConf:txtPassConf,
                            txtMailConf:txtMailConf
                        },
                        function(data){
                            $("#response").html(data);
                            location.reload(true);
                            console.log(data);
                        }
                    ); 
            } 
</script>


<script type="text/javascript">
            /*$(document).on("ready", function(){             
                $.ajax({"cache":false});
                setInterval("loadOldMessages()",500);
            });

            var loadOldMessages = function(){
                $.ajax({
                    type: "POST",
                    url: "viewFile.php",
                }).done(function(info){
                    console.log(info);
                    $('#cargaImagen').html(info);
                });
            }*/
</script>


<!-- ====================================| JQUERY |================================================== -->
 	<!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="kartik/js/fileinput.min.js" type="text/javascript"></script>
    <script src="kartik/js/fileinput_locale_es<lang>.js"></script> 
    <!--<script>
	    $('.carousel').carousel({
	        interval: 5000 //changes the speed
	    })
    </script>
    -->
<!-- ====================================================================================== -->

</body>
</html>
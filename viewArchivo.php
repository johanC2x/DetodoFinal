<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    $txtIdUsuario = $_SESSION['idusuario'];
	$idarchivo = $_GET["idarchivo"];
	$sql = "SELECT idarchivo,usuario_idusuario,codigo_idcodigo,nombre,descripcion from archivo WHERE idarchivo = '$idarchivo'";
	$rsCodigo ="SELECT idcodigo,codigo,descripcion,creaFecha FROM codigo 
                WHERE codigo = 'tipoArchivo'";
    echo $txtIdUsuario;
    $result = mysql_query($sql);
    $codigo = mysql_query($rsCodigo);
	$resultFile = mysql_fetch_array($result);
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
    <script src="js/funciones.js"></script>
    <script type="text/javascript">
        obtenerSol();
    </script>
</head>
<body>
<!--=================================================================-->
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
                <a class="navbar-brand" href="index.html"><span style="color:red">..::</span> DetoDo <span style="color:red">::..</span></a>
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
                        <a id="linkSubir" href="#" data-toggle="modal" data-target="#popUpload" >Subir</a>
                    </li>
                    <li>
                        <a id="linkPapelera" href="#">Papelera</a> 
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Entradas<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="linkArchivo" href="#">Archivos</a>
                            </li>
                            <li>
                                <a id="linkBlog" href="#">Blog</a>
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
                                <a href="index.php">Salir</a>
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

<!--=================================================================-->
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
	   <div class="row" style="">
            <div class="col-md-1 text-center">
                <p><i class="fa fa-camera fa-4x"></i>
                </p>
                <p>June 17, 2014</p>
            </div>
            <div class="col-md-5" id="cargaImagen">
                <img class="img-responsive img-hover" width="300" height="300" src="<?php echo $resultFile['descripcion']?>"/>
            </div>
            <div class="col-md-6">
                <h3>
                    <a href="blog-post.html"><?php echo $resultFile['nombre']?></a>
                </h3>
                <p>by <a href="#">Start Bootstrap</a>
                </p>
                <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <!--<a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>-->
            </div>
        </div>
    <hr>
        <div class="row" >
            <section>            
                <div class="row">
                    <form id="formChat" role="form">
                        <div class="form-group" >
                            <input type="hidden" value="<?php echo $idarchivo ?>" id="archivo" name="archivo" >
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="user" name="user" placeholder="<?php echo $txtIdUsuario ?>" readonly = "true">
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
                        <button id="send" class="btn btn-primary" >Comentar</button>                      
                    </form>
                </div>
            </section>  
        </div> 
    </div>
    <script>
            $(document).on("ready", function(){             
                registerMessages();
                $.ajax({"cache":false});
                setInterval("loadOldMessages()",500);
            });
            var registerMessages = function(){
                $("#send").on("click",function(e){
                    e.preventDefault();
                    var frm = $("#formChat").serialize();
                    console.log(frm);
                    $.ajax({
                        type: "POST",
                        url: "register.php",
                        data: frm
                    }).done(function(info){
                        $("#message").val("");
                        $("#user").val("");
                        var altura = $("#conversation").prop("scrollHeight");
                        $("#conversation").scrollTop(altura);
                        console.log(info);
                    });
                });
            }
            var loadOldMessages = function(){
                var frm = $("#formChat").serialize();
                console.log(frm);
                $.ajax({
                    type: "POST",
                    url: "conversation.php",
                    data: frm
                }).done(function(info){
                    $("#conversation").html(info);
                    $("#conversation p:last-child").css({"background-color":"red","padding":"5px"});
                    var altura = $("#conversation").prop("scrollHeight");
                    $("#conversation").scrollTop(altura);
                });
            }
            
        </script>


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
                                        <table style="width:500px">
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
                                                        <textarea name="txtDescFile" rows="4" cols="40"></textarea>
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


    <script src="kartik/js/fileinput.min.js" type="text/javascript"></script>
    <script src="kartik/js/fileinput_locale_es<lang>.js"></script> 

</body>
</html>
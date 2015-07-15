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
    <!--script type="text/javascript" src="js/jquery.js" ></script-->
    
    <style type="text/css">
      body{
          background-image: url('img/bs_2.jpg');
          background-size: 100% 100%;
      }
    </style>
</head>
<body>
    <center>
        <h1>Bienvenido a DETODO</h1>
    </center>
    <hr/>
    <div class="row"> 
    <div class="col-md-3">   
    </div>
        <div class="col-md-3">
            <div style="width:300px;margin:0 auto;padding-left:20px;">
                <form role="form" action="validar.php" method="POST">
                <fieldset>
                    <legend>Iniciar Sesion</legend>
                      <div class="form-group"> 
                        <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;color:" >Usuario</label>-->
                        <input type="text" class="form-control" id="txtUsuario"
                               placeholder="Introduce tu Usuario" name="txtUsuario">
                      </div>
                      <div class="form-group">
                        <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;" >Contraseña</label>-->
                        <input type="password" class="form-control" id="txtClave"
                               placeholder="Introduce tu Clave" name="txtClave">
                      </div>
                      <button type="submit" class="btn btn-primary">Ingresar</button>
                  </fieldset>
                </form>
                <p>Si no tiene cuenta hacer click <a href="#" data-toggle="modal" data-target="#popServicio7" style="color:red;" >aqui</a></p>
                <p>Olvidaste tu contraseña click <a href="#" data-toggle="modal" data-target="#popServicio8" style="color:red;" >aqui</a></p>
            </div>
        </div>  
        <div class="col-md-3">
            <div style="margin:0 auto">
                <img src="img/bs_1.jpeg" alt="bs1" class="img-thumbnail">
            </div>    
        </div>
        <div class="col-md-3"> 
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr style="border-color:#EAE9E9;" />

    <!--Modal Servicio_7-->
        <div class="modal fade" id="popServicio7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    Crear Cuenta
                </h4>
              </div>
              <div id="nuevaAventura" class="modal-body">
                <div class="media">
                    <div class="pull-left">
                        <span class="fa-stack fa-2x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                        </span> 
                    </div>
                    <div class="media-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" action="registroUsuario.php" method="POST">
                                        <fieldset>
                                            <legend>Registrar Cuenta</legend>
                                              <div class="form-group" style="width:350px;" >
                                                <input type="text" class="form-control" id="txtUser"
                                                           placeholder="Introduce tu Usuario" name="txtUser">
                                              </div>
                                              <div class="form-group" style="width:350px;"> 
                                                <input type="password" class="form-control" id="txtPass"  
                                                            placeholder="Introduce tu clave" name="txtPass">
                                              </div>
                                              <div class="form-group" style="width:350px;"> 
                                                <input type="text" class="form-control" id="txtMail"  
                                                            placeholder="Introduce tu correo" name="txtMail">
                                              </div>
                                              <div class="form-group" style="width:350px;">
                                                <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;color:" >Usuario</label>-->
                                                <input type="text" class="form-control" id="txtNombre" 
                                                       placeholder="Introduce tu Nombre" name="txtNombre">
                                              </div> 
                                              <div class="form-group" style="width:350px;">
                                                <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;color:" >Usuario</label>-->
                                                <input type="text" class="form-control" id="txtApePat"
                                                       placeholder="Introduce tu Apellido Paterno" name="txtApePat">
                                              </div>
                                              <div class="form-group" style="width:350px;">
                                                <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;color:" >Usuario</label>-->
                                                <input type="text" class="form-control" id="txtApeMat"
                                                       placeholder="Introduce tu Apellido Materno" name="txtApeMat">
                                              </div>
                                              <div class="form-group" style="width:350px;">
                                                <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;color:" >Usuario</label>-->
                                                <input type="text" class="form-control" id="txtEdad" 
                                                       placeholder="Introduce tu Edad" name="txtEdad">
                                              </div> 
                                              <div class="form-group" style="width:350px;"> 
                                                <!--<label for="ejemplo_email_1" style="font-family:Open Sans,lucida grande,Segoe UI,arial,verdana,lucida sans unicode,tahoma,sans-serif;color:" >Usuario</label>-->
                                                <input type="text" class="form-control" id="txtDireccion" 
                                                       placeholder="Introduce tu Direccion" name="txtDireccion">
                                              </div>
                                              <button type="submit" class="btn btn-primary">Ingresar</button>
                                        </fieldset>
                                     </form>
                                </div>
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
        
<!--===================================================PopUp8============================================== -->
        
<div class="modal fade" id="popServicio8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">
            
        </h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
        <div class="media" >
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                       <i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>
                </span> 
            </div>
            <div class="media-body">
                <div class="container">
                     <div class="row">
                        <div class="col-md-12"> 
                            <form role="form">
                              <fieldset>
                                <legend>Recupera Cuenta</legend> 
                                  <table>
                                    <tr>
                                      <td></td>
                                      <td>
                                        <p>Correo electrónico o nombre completo</p>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <span class="fa-stack fa-2x">
                                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                              <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </td>
                                      <td>
                                        <input id="txtRecUsu" type="text" class="form-control" />
                                      </td>
                                    </tr>
                                  </table>
                              </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnRecUsu" onclick="modificarCuenta()" >Buscar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>       
      </div>
    </div>
  </div>
</div> 
<!-- ================================================================================================ -->

<!-- ===========================================PopUp9===================================================== -->
<div class="modal fade" id="popServicio9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">
            
        </h4>
      </div>
      <div id="nuevaAventura" class="modal-body">
        <div class="media" >
            <div class="pull-left">
                <span class="fa-stack fa-2x">
                      <i class="fa fa-circle fa-stack-2x text-primary"></i>
                       <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                </span> 
            </div>
            <div class="media-body">
                <div class="container">
                     <div class="row">
                        <div class="col-md-12"> 
                            <div id="response" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnRecUsu" onclick="modificarContraseña()" >Modificar</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>       
      </div>
    </div>
  </div>
</div>
<!-- ================================================================================================ -->  

<!-- ====================================| JQUERY |================================================== -->
 	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js" ></script>
<!-- ====================================================================================== -->
</body>
</html>
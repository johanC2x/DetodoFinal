<?php
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    $rsCodigoPost = "SELECT idcodigo,codigo,descripcion,creaFecha FROM codigo 
                     WHERE codigo = 'tipoPost'";
    $codigoPost = mysql_query($rsCodigoPost);
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
</head>
<body>
 	<!--<script type="text/javascript" src="js/link2.js"></script>-->
	<div class="container">
		<div style="margin:0 auto" >
		<div class="col-md-3">
		  <ul class="nav nav-pills nav-stacked">
		    <li class="active"><a id="linkObEntrada" href="#">Entradas</a></li>
		    <li><a id="linkNewEntrada" href="#">Nueva Entrada</a></li>
		  </ul>
		</div>
			<div class="col-md-9">
				<div class="contenido2" style="display:block;">
					<h1>Nueva Entrada</h1>
					<center>
						<form role="form" action="validarPost.php" method="POST" >
							<table>
								<tr>
									<div class="form-group" style="width:600px;"> 
										<td style="width:100px;padding:10px"><label for="txtTituloPost">Nombre</label></td>
										<td style="width:200px">
											<input type="text" class="form-control" id="txtTituloPost" 
					                        placeholder="Ingrese Titulo" name="txtTituloPost">
					               		</td>
					               		<td style="width:100px;padding:10px">
											<label class="control-label" for="txtFile">Tipo Post</label>
										</td>
										<td style="width:200px">
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
										</td>
					                </div>
								</tr>
								<br>
							</table>
							<br>
							<table>
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
						</form>
					</center>
				</div>
				<!--<div class="contenido3" style="display:block;">
						hola
				</div>-->
			</div>
		</div>
	</div>
</body>
</html>





<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
	$txtIdUsuario = $_SESSION['idusuario']; 
	$txtNomBloggeroFiltro = $_POST["txtNomBloggeroFiltro"];

	$sql = "SELECT idusuario,nombre,apepat,apemat,edad,nickname,contrasenia, 
			flgstatus,direccion,flgActivo,mail,
			concat(nombre,' ',apepat,' ',apemat) as nombreCompleto
			FROM usuario
			WHERE upper(concat(nombre,' ',apepat,' ',apemat)) like concat('%','$txtNomBloggeroFiltro','%')
			and idusuario not like '$txtIdUsuario'";
	$result = mysql_query($sql);
 ?>  
 <script src="js/funciones.js"></script>
 	<?php while($resultUsuarioFiltro = mysql_fetch_array($result)){ ?>
 		<?php if(sizeof($resultUsuarioFiltro)>0){ ?>
 			<div class="container">
 				<div class="row" style="margin: 0 auto;">
 					<div class="panel panel-primary">
                        <div class="panel-heading" style="height:50px;">
                            <span class="fa-stack fa-2x">
                                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                  <i class="fa fa-comment fa-stack-1x fa-inverse"></i>
                                  <!--<i class="fa fa-paper-plane fa-stack-1x fa-inverse"></i>-->
                            </span>
                        </div>
                        <div class="panel-body">
	                        <div class="row">
	                        	<div class="col-md-12">
	                        		<div class="col-md-4">
	                        			<form role="form" >
				                        	<fieldset>
			                        			<legend>Usuario</legend>
				                        			<div class="form-group">
				                        				<label><?php echo $resultUsuarioFiltro["nombreCompleto"]; ?></label>
				                        			</div>
				                        			<div class="form-group">
				                        				<label><?php echo $resultUsuarioFiltro["nickname"]; ?></label>
				                        			</div>
			                        			<button class="btn btn-primary" onclick="obtenerSolicitud(<?php echo $resultUsuarioFiltro['idusuario']; ?>)" type="button">Notificar</button>
			                        			<button class="btn btn-primary" onclick="obtenerGaleriaUsuario(<?php echo $resultUsuarioFiltro['idusuario']; ?>)" type="button">Ver Galeria</button>
			                        		</fieldset>
				                        </form> 
	                        		</div>
	                        		<div class="col-md-6">
	                        			<form role="form">
	                        				<div class="form-group">
	                        					<label>Descripcion</label>
		                        				<p style="text-align:justify;">
		                        					Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
		                        					sed do eiusmod tempor incididunt ut labore et dolore magna 
		                        					aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
		                        					ullamco laboris nisi ut aliquip ex ea commodo consequat.  
		                        				</p> 
		                        			</div>
	                        			</form>
	                        		</div>
	                        	</div>
	                        </div> 
                        </div>
                        <div class="panel-footer">
                            <p style="color:red">...:::<i class="fa fa-list "></i>:::...<p>
                        </div>
                    </div>
 				</div>
 			</div>
 		<?php }else{
 			echo "<script>alert('No existe Usuario');</script>";
 			} ?>
 	<?php } ?> 
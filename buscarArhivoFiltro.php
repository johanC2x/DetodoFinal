<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario']; 
    $txtNomArchivoFiltro = $_POST["txtNomArchivoFiltro"];
    $sql = "SELECT a.idarchivo,a.usuario_idusuario,a.codigo_idcodigo,a.nombre,a.descripcion,a.creaFecha,a.posteo,usu.nickname
            FROM archivo a
            LEFT JOIN usuario usu ON a.usuario_idusuario = usu.idusuario 
			WHERE upper(a.nombre) like concat('%','$txtNomArchivoFiltro','%')";
	$result = mysql_query($sql);
 ?>
	<?php 
		while($resultArchivoFiltro=mysql_fetch_array($result)) {
	?>
		<?php 
			if($resultArchivoFiltro){
		?>
		<div class="container">
			<div class="row" style="margin: 0 auto;">
			        <div class="col-md-1 text-center">
			            <p><i class="fa fa-camera fa-4x"></i>
			            </p>
			            <!--<p>June 17, 2014</p>-->
			            <p><?php echo $resultArchivoFiltro['creaFecha']?></p> 
			        </div>
			        <div class="col-md-5" id="cargaImagen">
			            <input type="hidden" id="txtIdArchivo" name="txtIdArchivo" value="<?php echo $resultArchivoFiltro['idarchivo']?>">
			            <img class="img-responsive img-hover" width="300px" height="300px" src="<?php echo $resultArchivoFiltro['descripcion']?>"/>
			        </div>
			        <div class="col-md-6">
			            <h3>
			                <a href="blog-post.html"><?php echo $resultArchivoFiltro['nombre']?></a>
			            </h3>
			            <p>by <a href="#"><?php echo $resultArchivoFiltro['nickname'] ?></a>
			            </p>
			            <p style="text-align:justify">
			                <?php echo $resultArchivoFiltro['posteo'];?> 
			            </p>
			            <!--<a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>-->
			            <a class="btn btn-primary" href="viewArchivo.php?idarchivo=<?php echo $resultArchivoFiltro['idarchivo']?>">Ver Mas<i class="fa fa-angle-right"></i></a>
			            <a style="color:red" id="btnLike" onclick="registroLike()" />Liker</a>
			            <div id="resultado" style="background-color:red;padding:10px" ></div>
			        </div>
		     </div>
	     </div>
	    <?php 
			}else{
				echo "<script>alert('No hay datos');</script>";
			}
		?>
	<?php 
		}
	?> 
<!-- /.row -->
        <hr>
        <br>
        <br>
        <br>
        <br>
<hr style="border-color:red;">
<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12" style="margin-left:20px;">
            <p>Copyright &copy; DetoD0 2015</p>
        </div>
    </div>
</footer>
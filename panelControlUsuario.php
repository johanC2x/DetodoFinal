<?php 
	include("conectar.php");
	session_start();
	$cn = Conectarse();
    /*echo $_SESSION['idusuario'];*/
    $txtIdUsuario = $_SESSION['idusuario']; 
    $idusuario = $_POST["idusuario"];
	$file = "SELECT a.idarchivo,a.usuario_idusuario,a.codigo_idcodigo,a.nombre,a.descripcion,a.creaFecha,a.posteo,usu.nickname
             from archivo a
             left join usuario usu on a.usuario_idusuario = usu.idusuario
             where a.usuario_idusuario = '$idusuario'";
    $resultFile = mysql_query($file);
 ?> 
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
            while($resultCodigoPost=mysql_fetch_array($resultFile)) {
        ?>
        <div class="row">
            <div class="col-md-1 text-center">
                <p><i class="fa fa-camera fa-4x"></i>
                </p>
                <!--<p>June 17, 2014</p>-->
                <p><?php echo $resultCodigoPost['creaFecha']?></p> 
            </div>
            <div class="col-md-5" id="cargaImagen">
                <input type="hidden" id="txtIdArchivo" name="txtIdArchivo" value="<?php echo $resultCodigoPost['idarchivo']?>">
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
                    <!--
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur.
                    -->
                </p>
                <!--<a class="btn btn-primary" href="blog-post.html">Read More <i class="fa fa-angle-right"></i></a>-->
                <a class="btn btn-primary" href="viewArchivo.php?idarchivo=<?php echo $resultCodigoPost['idarchivo']?>">Ver Mas<i class="fa fa-angle-right"></i></a>
                <a style="color:red" id="btnLike" onclick="registroLike()" />Liker</a>
                <div id="resultado" style="background-color:red;padding:10px" ></div>
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
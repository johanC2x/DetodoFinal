		$(document).ready(function() {
		/*Enlace al mantenimiento de los Post*/
		$('#linkPost').click(function(){            
                $.ajax({
		        type: "GET", /*Se pone la ruta mediante el metodo get*/
		        url: "mantPost.php", /*<=== Se le dice al navegador el archivo a mostrar*/
		        success: function(a) {
		        //$('#central').slideDown('slow', function() {
		         $('#contenido').html(a);
                        }
                    });
                });
 		/*Enlace al mantenimiento de la Papelera*/
		$('#linkPapelera').click(function(){
		$.ajax({
	            type: "GET", /*Se pone la ruta mediante el metodo get*/
	            url: "mantPapelera.php", /*<=== Se le dice al navegador el archivo a mostrar*/
	       		success: function(a) {
	       			$('#contenido').html(a);
	          	}
			});
		});
 	    /*Enlace al mantenimiento de los Archivos*/
        $('#linkArchivo').click(function(){
		$.ajax({
	            type: "GET", /*Se pone la ruta mediante el metodo get*/
	            url: "mantArchivo.html", /*<=== Se le dice al navegador el archivo a mostrar*/
	       		success: function(a) {
	       			$('#contenido').html(a);
	          	}
			});
		});                         
       	/*Enlace al mantenimiento del Blog*/
		$('#linkBlog').click(function(){
		$.ajax({
	            type: "GET", /*Se pone la ruta mediante el metodo get*/
	            url: "mantBlog.html", /*<=== Se le dice al navegador el archivo a mostrar*/
	       		success: function(a) {
	       			$('#contenido').html(a);
	          	}
			});
		});
		/*Enlace al mantenimiento de la configuración del Usuario*/
		$('#linkConfiguracion').click(function(){
		$.ajax({
	            type: "GET", /*Se pone la ruta mediante el metodo get*/
	            url: "mantConfUsuario.html", /*<=== Se le dice al navegador el archivo a mostrar*/
	       		success: function(a) {
	       			$('#contenido').html(a);
	          	}
			});
		});
	});
 	
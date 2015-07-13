$(document).on("ready", function(){   
    $.ajax({"cache":false});
});
function registroLike(i){ 
        var txtIdArchivo = $("#txtIdArchivo"+i).val();
        $.post(
            "mantLike.php",
            {txtIdArchivo:txtIdArchivo},
            function(data){
                $("#resultado"+i).html(data); 
                $("#resultado"+i).delay(300);
                console.log(data);
            }
        );
     }  

function obtenerArchivoFiltro(){
	var txtNomArchivoFiltro = $("#txtNomArchivoFiltro").val();
	$.post(
			"buscarArhivoFiltro.php",
			{
				txtNomArchivoFiltro:txtNomArchivoFiltro
			},
			function(data){
				$("#responseArchivo").html(data);
				$("#txtNomArchivoFiltro").val("");
				console.log(data);
			}
		);
}

function obtenerBloggeroFiltro(){
	var txtNomBloggeroFiltro = $("#txtNomBloggeroFiltro").val(); 
	$.post(
			"buscarBloggeroFiltro.php",
			{txtNomBloggeroFiltro:txtNomBloggeroFiltro},
			function(data){
				$("#responseBloggero").html(data);
				$("#txtNomBloggeroFiltro").val("");
				console.log(data);
			}
		);
}

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

function obtenerGaleriaUsuario(idusuario){ 
	$.post(
			"panelControlUsuario.php",
			{idusuario:idusuario},
			function(data){
				$("#contentBloggero").html("");
				$("#contentBloggero").removeClass("be-color");
				$("#responseBloggero").html(data);
				console.log(data);
			}
		);
}

function obtenerSolicitud(idusuario){
	$.post(
			"usuarioSolicitud.php",
			{idusuario:idusuario},
			function(data){
			var msg = getArray(data);
				if(msg.length>0){
	                if(msg[0].cRespuesta=="ok"){ 
	                    alert("Notificacion Enviada");
	                }
	            }
				console.log(data);
			}
		);
}

function obtenerSol(){
	var html="";
	$.ajax({
		type:"POST",
		data:{},
		url:"obtenerSolicitud.php",
		success: function(msg){    
			var soli = $.parseJSON(msg);  
			if(soli.length>0){
				for(var i=0;i<soli.length;i++){
					html += "<li>";   
					    html += "<a href='#' onclick='modificarSolicitud("+soli[i].usuarioemi+","+soli[i].usuario_idusuario+","+soli[i].idsolicitudes+")'>";
						    html += "<div>";
							    html += "<i class='fa fa-bell fa-fw'></i> Responder Notificacion";
							    html += "<span class='pull-right text-muted small'>Enviada por:"+soli[i].nickname+"</span>";
						    html +=	"</div>";
					    html += "</a>";
					html += "</li>"; 
				}
				$("#ulSol").html(html);
			} 
		}
	})
}

 function modificarSolicitud(usuarioemi,usuario_idusuario,idsolicitudes){ 
        $.post(
            "modificarSolicitud.php",
        {
            usuarioemi:usuarioemi,
            usuario_idusuario:usuario_idusuario,
            idsolicitudes:idsolicitudes
        },
        function(data){
            console.log(data);
            obtenerSol();
        }
    ); 
}
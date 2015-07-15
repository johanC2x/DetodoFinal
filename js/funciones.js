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

function modificarCuenta(){
	$("#popServicio8").modal("hide");
	var txtRecUsu = $("#txtRecUsu").val();
	var correo = "";
	var nombreFull = "";
	var html = "";
	if(txtRecUsu.indexOf('@')!=-1){
		correo = $("#txtRecUsu").val();
	}else{
		if(txtRecUsu.split(" ")){ 
			nombreFull = $("#txtRecUsu").val();
		}
	}
	$.ajax({
		type:"POST",
		data:{correo:correo,nombreFull:nombreFull},
		url:"recuperarUsuario.php",
		success: function(msg){ 
			var usu = $.parseJSON(msg);
			if(usu.length>0){ 
				for(var i=0;i<usu.length;i++){
<<<<<<< HEAD
					console.log(usu[i].mail);  
=======
					console.log(usu[i].mail);
					if(usu[i].mail!=""){
>>>>>>> 9b7ffcba8d9d49ba275b4890518fb88a28eb0e1d
						html += "<form role='form'>";
							html += "<fieldset>";
								html += "<legend>Datos de Usuario</legend>";
								html += "<table>";
									html += "<tr>";
										html += "<td style='padding:5px;'><label>Nombre de Usuario: </label></td>";
										html += "<td><input id='txtUser' type='text' class='form-control' value='"+usu[i].nombre+" "+usu[i].apepat+" "+usu[i].apemat+"' readonly='true'></td>";
										html += "<td><input id='txtIdUser' type='hidden' class='form-control' value='"+usu[i].idusuario+"'></td>";
<<<<<<< HEAD
									html += "</tr>";  
=======
									html += "</tr>"; 
									html += "<tr>";
										html += "<td style='padding:5px;'><label>Correo de USuario: </label></td>";
										html += "<td><input id='txtNick' type='text' class='form-control' value='"+usu[i].mail+"' readonly='true'></td>";
									html += "</tr>";
>>>>>>> 9b7ffcba8d9d49ba275b4890518fb88a28eb0e1d
									html += "<tr>";
										html += "<td style='padding:5px;'><label>Nick de USuario: </label></td>";
										html += "<td><input id='txtNick' type='text' class='form-control' value='"+usu[i].nickname+"' readonly='true'></td>";
									html += "</tr>";
									html += "<tr>";
										html += "<td style='padding:5px;'><label>Ingresar Contraseña: </label></td>";
<<<<<<< HEAD
										html += "<td><input id='txtPassw' type='text' class='form-control' onkeyup='validarPass()'></td>";
									html += "</tr>";
									html += "<tr>";
										html += "<td style='padding:5px;'><label>Confirmar Contraseña: </label></td>";
										html += "<td><input id='txtPasss' type='text' class='form-control' onkeyup='validarPasss()'><span id='resPass' style='color:red;'></span></td>";
=======
										html += "<td><input id='txtPass' type='text' class='form-control'></td>";
									html += "</tr>";
									html += "<tr>";
										html += "<td style='padding:5px;'><label>Confirmar Contraseña: </label></td>";
										html += "<td><input id='txtPasss' type='text' class='form-control'></td>";
>>>>>>> 9b7ffcba8d9d49ba275b4890518fb88a28eb0e1d
									html += "</tr>"; 
								html += "</table>"; 
							html += "</fieldset>";
							html += "<table>";
								html += "<tr>";
									html += "<td style='padding:5px;'>";
										html += "<label>Enviar Confirmacion: </label>";
									html += "</td>";								
									html += "<td>";
<<<<<<< HEAD
										html += "<label class='checkbox-inline'><input id='ck1' type='checkbox' value='1' onclick='validarCk1()'>Correo</label>";
										html += "<label class='checkbox-inline'><input id='ck2' type='checkbox' value='2' onclick='validarCk2()'>Celular</label>";
									html += "</td>";
								html += "</tr>";
							html += "</table>"; 
				        html += "</form>";  
=======
										html += "<label class='checkbox-inline'><input type='checkbox' value=''>Correo</label>";
										html += "<label class='checkbox-inline'><input type='checkbox' value=''>Celular</label>";
									html += "</td>";
								html += "</tr>";
							html += "</table>"; 
				        html += "</form>"; 
					}else{
						if(usu[i].mail==""){
							html += "<form role='form'>";
								html += "<fieldset>";
									html += "<legend>Datos de Usuario</legend>";
									html += "<table>";
										html += "<tr>";
											html += "<td style='padding:5px;'><label>Nombre de Usuario: </label></td>";
											html += "<td><input id='txtUser' type='text' class='form-control' value='"+usu[i].nombre+" "+usu[i].apepat+" "+usu[i].apemat+"' readonly='true'></td>";
											html += "<td><input id='txtIdUser' type='hidden' class='form-control' value='"+usu[i].idusuario+"'></td>";
										html += "</tr>"; 
										html += "<tr>";
											html += "<td style='padding:5px;'><label>Nick de USuario: </label></td>";
											html += "<td><input id='txtNick' type='text' class='form-control' value='"+usu[i].nickname+"' readonly='true'></td>";
										html += "</tr>";
										html += "<tr>";
											html += "<td style='padding:5px;'><label>Ingresar Contraseña: </label></td>";
											html += "<td><input id='txtPass' type='text' class='form-control'></td>";
										html += "</tr>";
										html += "<tr>";
											html += "<td style='padding:5px;'><label>Confirmar Contraseña: </label></td>";
											html += "<td><input id='txtPasss' type='text' class='form-control'></td>";
										html += "</tr>"; 
									html += "</table>"; 
								html += "</fieldset>";
								html += "<table>";
									html += "<tr>";
										html += "<td style='padding:5px;'>";
											html += "<label>Enviar Confirmacion: </label>";
										html += "</td>";								
										html += "<td>";
											html += "<label class='checkbox-inline'><input type='checkbox' value=''>Correo</label>";
											html += "<label class='checkbox-inline'><input type='checkbox' value=''>Celular</label>";
										html += "</td>";
									html += "</tr>";
								html += "</table>"; 
					        html += "</form>"; 
						} 
					}  
>>>>>>> 9b7ffcba8d9d49ba275b4890518fb88a28eb0e1d
				} 
				$("#response").html(html);  
                $("#popServicio9").modal("show");
			}
			console.log(msg);
		}
<<<<<<< HEAD
	}); 
}

var pass = "";
var passs = "";
var flgEnvio = 0;
var ck1 = "";
var ck2 = "";

function validarPass(){
	pass = $("#txtPassw").val();
	console.log($("#txtPassw").val());
} 
function validarPasss(){
	ck1 = $('#ck1').val();
	ck2 = $('#ck2').val();
	passs = $("#txtPasss").val();
	console.log($("#txtPasss").val());
	validarCorreo(); 
}

function modificarContra(){
	var txtIdUser = $("#txtIdUser").val();
	if(flgEnvio==1){
		alert(ck1);
		alert(ck2);
		alert("enviando 1"); 
		if(pass == passs){
			$.ajax({
				type:"POST",
				data:{ck1:ck1,ck2:ck2,pass:pass,txtIdUser:txtIdUser},
				url:"modificarPassw.php",
				success:function(msg){
					console.log("mostrar");
					console.log(msg);
				}
			});
		}else{
			alert("Error de Validacion");
		} 
	}else{
		console.log("No enviar");
	}
}

function validarCorreo(){    
	if(pass == passs){
		$("#resPass").html("contraseñas iguales");
		console.log("contraseñas iguales");
		flgEnvio = 1;
	}else{
		if(pass != passs){
			$("#resPass").html("contraseñas desiguales");
			console.log("contraseñas desiguales");
			flgEnvio = 0;
		}	
	} 
}

function validarCk1(){
	if($('#ck1').is(':checked')==true){
		$('#ck2').attr('checked', false);
		ck2 = 0; 
		ck1 = $('#ck1').val();
		console.log($('#ck1').val());
	} 
}

function validarCk2(){
	if($('#ck2').is(':checked')==true){
		$('#ck1').attr('checked', false); 
		ck1 = 0;
		ck2 = $('#ck2').val();
		console.log($('#ck2').val());
	} 
=======
	});
	/*
	$.post(
			"recuperarUsuario.php",
			{correo:correo,nombreFull:nombreFull},
			function(data){
				var usu = $.parseJSON(data);
				if(usu.length>0){ 
					html += "<div class='panel panel-default'>";
						html += "<div class='panel-heading'>";
							html += "Recuperar Cuenta";
						html += "<div>";
						html += "<div class='panel-body'>";
							for(var i=0;i<usu.length;i++){
								html += "<form role='form'>"; 
									html += "<label>"+usu[i].nombre+"</label>";
			                    html += "</form>";
							} 
						html += "<div>"; 
                    html += "</div>";
                    $("#response").html(html);
                    $("#popServicio9").modal("show");
				}
				console.log(data);
			}
		);  
	*/
>>>>>>> 9b7ffcba8d9d49ba275b4890518fb88a28eb0e1d
}
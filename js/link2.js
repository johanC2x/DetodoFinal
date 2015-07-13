		$(document).ready(function() {
			$('#linkObEntrada').click(function(){            
		      	$('#contenido3').hide();  
        	});
        	$('#linkNewEntrada').click(function(){            
		      	$('#contenido2').css('display','block',function(){
		      		$('#contenido3').css('display','none');
		      	});  
        	});
		});
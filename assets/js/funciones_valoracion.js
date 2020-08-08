var TxbUrl='http://localhost/scripts/';//esta variable lleva la ip del servidor, pero tu puedes in¿gnorararla y donde se mande llamar, pones la url de la funcion del controlador
//esto es obligatorio
$(document).ready(function(e){
	
});
//funcion que trae las recomendaciones segun el id del niño
function Recomendaciones(id_expediente){
	    //debugger;
		//se recibe el id en id_usuario_unic
		
		$("#recomendaciones_grl").css('display','block');//se cambia el estilo del panel para que aparezca en la vista
		$("#hidden_usr").empty();//se vacia el div correspondiente al id hidden_usr
		$("#hidden_usr").append('<input type="hidden" id="usr_id" name="usr_id" value="'+id_expediente+'">');//se genera el input de tipo hidden con el id_del usuario
		$("#hidden_usr").trigger('create');//Se crea
		//se comienza a usar ajax 
		$.ajax({
			type       : "POST",//forma de envio de datos
			url        :  TxbUrl+'traer_recomendaciones.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
			data:({usuario_php:id_expediente}),//aquí se insertan los datos al controlador
	        cache:false,//este es para que no jale datos de la caché
	        dataType:"json", //el tipo de dato que devolverá puede ser tex o json
	        success:mostrarDatos,//funcion a donde se resiviran los datos
			error      : function() {//funció de error
				alert('Error: vale madre ');
			}
		});
		//función que recibe los datos
		function mostrarDatos(data){
			$("#recomendaciones_usuario").html('');
	        $("#recomendaciones_usuario").empty();//se limpia el div con id recomendaciones_usuario
	        $("#recomendaciones_usuario").append('<ul>');//se crea la lista
	        //para poder obtener los datos de un json se usa el each
			$(data).each(function(index,data){
	            if (data.estado==="success"){//el succes es para ver si vienen datos en cada row
	            	//se genera la lista de las recomendaciones ya guardadas 
	            	$("#recomendaciones_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartar('+data.v1+')">Descartar</a></div></div><br>');
				}                
	        });
	        $("#recomendaciones_usuario").append('</ul><br>');//cierre de lista
	        $("#recomendaciones_usuario").trigger('create');//creacion
		}				
	}
	//click para guardar recomendación
	$(document).on('click','#guardar_recomendacion', function(){
		var recomendacion=$.trim($("#recomendacion_tx").val());//recibe lo que se puso en el text area con id recomendacion_tx
		var id_usuario_re=$.trim($("#usr_id").val());//recibe el id de el input tipo hidden previamente generado
		$.ajax({
			type       : "POST",
			url        : TxbUrl+'inserta_recomendacion.php', //script que insertará los datos en el servidor, en tu casp url del controller				
			data:({usuario_php:id_usuario_re,recomendacion_tx:recomendacion}),//datso que se envian
	        cache:false,
	        dataType:"text",//tipo de dato que devolverá en este caso es un text
	        success:OnSucces,//
			error      : function() {
				alert('Error: vale madre ');
			}
		});
		//función que recibe el dato
		function OnSucces(data){
			var arr=data.split('|');//Separa la estring que regresa el ajax
			//alert(data);
			var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
			if (arr[0]==="OK") {
				alert('Recomendación insertada');//alerta de inserción
				$("#recomendacion_tx").val('');// se limpia el text area
				//se vuelve a hacer el ajax que trae las recomendaciones ya guaradadas
				$.ajax({
					type       : "POST",
					url        : TxbUrl+'traer_recomendaciones.php', //script que insertará los datos en el servidor				
					data:({usuario_php:id_usuario_res}),
			        cache:false,
			        dataType:"json",
			        success:mostrarDatos,
					error      : function() {
						alert('Error: vale madre ');
					}
				});
				function mostrarDatos(data){
					$("#recomendaciones_usuario").html('');
			        $("#recomendaciones_usuario").empty();
			        $("#recomendaciones_usuario").append('<ul>');
					$(data).each(function(index,data){
			            if (data.estado==="success"){ 
			            	$("#recomendaciones_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartar('+data.v1+')">Descartar</a></div></div><br>');
						}                
			        });
			        $("#recomendaciones_usuario").append('</ul><br>');
			        $("#recomendaciones_usuario").trigger('create');
				}
			}else{
				alert('Error de inserción'); 
			}
		}

		
	});

	function descartar(id_recomendacion){
		//alert(id_recomendacion);
		$.ajax({
			type       : "POST",
			url        : TxbUrl+'descarta_recomendacion.php', //script que insertará los datos en el servidor, en tu casp url del controller				
			data:({id_recomendacion_unic:id_recomendacion}),//datso que se envian
	        cache:false,
	        dataType:"text",//tipo de dato que devolverá en este caso es un text
	        success:OnSuccesDescartar,//
			error      : function() {
				alert('Error: vale madre ');
			}
		});
		function OnSuccesDescartar(data){
			var arr=data.split('|');//Separa la estring que regresa el ajax
			//alert(data);
			var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
			if (arr[0]==="OK") {
				alert('Recomendación descartada');//alerta de inserción
				$("#recomendacion_tx").val('');// se limpia el text area
				//se vuelve a hacer el ajax que trae las recomendaciones ya guaradadas
				$.ajax({
					type       : "POST",
					url        : TxbUrl+'traer_recomendaciones.php', //script que insertará los datos en el servidor				
					data:({usuario_php:id_usuario_res}),
			        cache:false,
			        dataType:"json",
			        success:mostrarDatos,
					error      : function() {
						alert('Error: vale madre ');
					}
				});
				function mostrarDatos(data){
					$("#recomendaciones_usuario").html('');
			        $("#recomendaciones_usuario").empty();
			        $("#recomendaciones_usuario").append('<ul>');
					$(data).each(function(index,data){
			            if (data.estado==="success"){ 
			            	$("#recomendaciones_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartar('+data.v1+')">Descartar</a></div></div><br>');
						}                
			        });
			        $("#recomendaciones_usuario").append('</ul><br>');
			        $("#recomendaciones_usuario").trigger('create');
				}
			}else{
				alert('Error de inserción'); 
			}
		}
	}

	

	//funcion que trae el plan de restitucion segun el id del niño
function Plan(id_expediente){
	//debugger;
	//se recibe el id en id_usuario_unic
	
	$("#plan_grl").css('display','block');//se cambia el estilo del panel para que aparezca en la vista
	$("#hidden_usr").empty();//se vacia el div correspondiente al id hidden_usr
	$("#hidden_usr").append('<input type="hidden" id="usr_id" name="usr_id" value="'+id_expediente+'">');//se genera el input de tipo hidden con el id_del usuario
	$("#hidden_usr").trigger('create');//Se crea
	//se comienza a usar ajax 
	$.ajax({
		type       : "POST",//forma de envio de datos
		url        :  TxbUrl+'traer_plan.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
		data:({usuario_php:id_expediente}),//aquí se insertan los datos al controlador
		cache:false,//este es para que no jale datos de la caché
		dataType:"json", //el tipo de dato que devolverá puede ser tex o json
		success:mostrarDatos,//funcion a donde se resiviran los datos
		error      : function() {//funció de error
			alert('Error: vale madre ');
		}
	});
	//función que recibe los datos
	function mostrarDatos(data){
		$("#plan_usuario").html('');
		$("#plan_usuario").empty();//se limpia el div con id plan_usuario
		$("#plan_usuario").append('<ul>');//se crea la lista
		//para poder obtener los datos de un json se usa el each
		$(data).each(function(index,data){
			if (data.estado==="success"){//el succes es para ver si vienen datos en cada row
				//se genera la lista de las recomendaciones ya guardadas 
				$("#plan_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartarp('+data.v1+')">Descartar</a></div></div><br>');
			}                
		});
		$("#plan_usuario").append('</ul><br>');//cierre de lista
		$("#plan_usuario").trigger('create');//creacion
	}				
}
//click para guardar plan
$(document).on('click','#guardar_plan', function(){
	var plan=$.trim($("#plan_tx").val());//recibe lo que se puso en el text area con id plan_tx
	var id_usuario_re=$.trim($("#usr_id").val());//recibe el id de el input tipo hidden previamente generado
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'inserta_plan.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({usuario_php:id_usuario_re,plan_tx:plan}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSucces2,//
		error      : function() {
			alert('Error: vale madre ');
		}
	});
	//función que recibe el dato
	function OnSucces2(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Plan insertadado');//alerta de inserción
			$("#plan_tx").val('');// se limpia el text area
			//se vuelve a hacer el ajax que trae los planes ya guardados
			$.ajax({
				type       : "POST",
				url        : TxbUrl+'traer_plan.php', //script que insertará los datos en el servidor				
				data:({usuario_php:id_usuario_res}),
				cache:false,
				dataType:"json",
				success:mostrarDatos,
				error      : function() {
					alert('Error: vale madre ');
				}
			});
			function mostrarDatos(data){
				$("#plan_usuario").html('');
				$("#plan_usuario").empty();
				$("#plan_usuario").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#plan_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartarp('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#plan_usuario").append('</ul><br>');
				$("#plan_usuario").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}

	
});

function descartarp(id_plan){
	//alert(id_plan);
	//debugger;
	//alert(id_recomendacion);
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'descarta_plan.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({id_plan_unic:id_plan}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSuccesDescartarp,//
		error      : function() {
			alert('Error: vale madre ');
		}
	});
	function OnSuccesDescartarp(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Plan descartado');//alerta de inserción
			$("#plan_tx").val('');// se limpia el text area
			//se vuelve a hacer el ajax que trae los planes ya guardados
			$.ajax({
				type       : "POST",
				url        : TxbUrl+'traer_plan.php', //script que insertará los datos en el servidor				
				data:({usuario_php:id_usuario_res}),
				cache:false,
				dataType:"json",
				success:mostrarDatos,
				error      : function() {
					alert('Error: vale madre ');
				}
			});
			function mostrarDatos(data){
				$("#plan_usuario").html('');
				$("#plan_usuario").empty();
				$("#plan_usuario").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#plan_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartarp('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#plan_usuario").append('</ul><br>');
				$("#plan_usuario").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}
}

	

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
		var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
		$.ajax({
			type       : "POST",
			url        : TxbUrl+'inserta_recomendacion.php', //script que insertará los datos en el servidor, en tu casp url del controller				
			data:({usuario_php:id_usuario_re,recomendacion_tx:recomendacion,fecha_tx:fecha}),//datso que se envian
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
				alert('Acuerdo insertado');//alerta de inserción
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
	var fecha=$.trim($("#fecha_gral").val()); //Trae la fecha qeu se guarda en el post date
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'inserta_plan.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({usuario_php:id_usuario_re,plan_tx:plan,fecha_tx:fecha}),//datso que se envian
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

	

	
//funcion que trae el plan de restitucion segun el id del niño
function Autoriza(id_expediente){
	//debugger;
	//se recibe el id en id_usuario_unic
	
	$("#autoriza_grl").css('display','block');//se cambia el estilo del panel para que aparezca en la vista
	$("#hidden_usr").empty();//se vacia el div correspondiente al id hidden_usr
	$("#hidden_usr").append('<input type="hidden" id="usr_id" name="usr_id" value="'+id_expediente+'">');//se genera el input de tipo hidden con el id_del usuario
	$("#hidden_usr").trigger('create');//Se crea
	//se comienza a usar ajax 
	$.ajax({
		type       : "POST",//forma de envio de datos
		url        :  TxbUrl+'traer_autoriza.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
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
		$("#autoriza_usuario").html('');
		$("#autoriza_usuario").empty();//se limpia el div con id autoriza_usuario
		$("#autoriza_usuario").append('<ul>');//se crea la lista
		//para poder obtener los datos de un json se usa el each
		$(data).each(function(index,data){
			if (data.estado==="success"){//el succes es para ver si vienen datos en cada row
				//se genera la lista de las recomendaciones ya guardadas 
				$("#autoriza_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartara('+data.v1+')">Descartar</a></div></div><br>');
			}                
		});
		$("#autoriza_usuario").append('</ul><br>');//cierre de lista
		$("#autoriza_usuario").trigger('create');//creacion
	}				
}
//click para guardar plan
$(document).on('click','#guardar_autoriza', function(){
	var plan=$.trim($("#autoriza_tx").val());//recibe lo que se puso en el text area con id plan_tx
	var id_usuario_re=$.trim($("#usr_id").val());//recibe el id de el input tipo hidden previamente generado
	var fecha=$.trim($("#fecha_gral").val());
	//alert(fecha);
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'inserta_autoriza.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({usuario_php:id_usuario_re,autoriza_tx:plan,fecha_tx:fecha}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSucces3,//
		error      : function() {
			alert('Error: vale madre ');
		}
	});
	//función que recibe el dato
	function OnSucces3(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Persona insertada');//alerta de inserción
			$("#autoriza_tx").val('');// se limpia el text area
			//se vuelve a hacer el ajax que trae los planes ya guardados
			$.ajax({
				type       : "POST",
				url        : TxbUrl+'traer_autoriza.php', //script que insertará los datos en el servidor				
				data:({usuario_php:id_usuario_res}),
				cache:false,
				dataType:"json",
				success:mostrarDatos,
				error      : function() {
					alert('Error: vale madre ');
				}
			});
			function mostrarDatos(data){
				$("#autoriza_usuario").html('');
				$("#autoriza_usuario").empty();
				$("#autoriza_usuario").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#autoriza_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartara('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#autoriza_usuario").append('</ul><br>');
				$("#autoriza_usuario").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}

	
});

function descartara(id_plan){
	//alert(id_plan);
	//debugger;
	//alert(id_recomendacion);
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'descarta_autoriza.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({id_plan_unic:id_plan}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSuccesDescartara,//
		error      : function() {
			alert('Error: vale madre ');
		}
	});
	function OnSuccesDescartara(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Persona descartada');//alerta de inserción
			$("#autoriza_tx").val('');// se limpia el text area
			//se vuelve a hacer el ajax que trae los planes ya guardados
			$.ajax({
				type       : "POST",
				url        : TxbUrl+'traer_autoriza.php', //script que insertará los datos en el servidor				
				data:({usuario_php:id_usuario_res}),
				cache:false,
				dataType:"json",
				success:mostrarDatos,
				error      : function() {
					alert('Error: vale madre ');
				}
			});
			function mostrarDatos(data){
				$("#autoriza_usuario").html('');
				$("#autoriza_usuario").empty();
				$("#autoriza_usuario").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#autoriza_usuario").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartara('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#autoriza_usuario").append('</ul><br>');
				$("#autoriza_usuario").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}
}



//Funciones para nuevas recomendaciones y planes

function NuevaRecomendacion(id_expediente){
	debugger;
	$("#recomendaciones_grln").css('display','block');//se cambia el estilo del panel para que aparezca en la vista
	$("#hidden_usrn").empty();//se vacia el div correspondiente al id hidden_usr
	$("#hidden_usrn").append('<input type="hidden" id="usr_id" name="usr_id" value="'+id_expediente+'">');//se genera el input de tipo hidden con el id_del usuario
	$("#hidden_usrn").trigger('create');//Se crea
	var fecha=$.trim($("#fecha_gral").val());
	var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
	//se comienza a usar ajax 
	//alert(id_expediente + id_usuario_res);
	$.ajax({
		type       : "POST",//forma de envio de datos
		url        :  TxbUrl+'traer_recomendacionesnew.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
		data:({usuario_php:id_usuario_res,fecha_tx:fecha}),//aquí se insertan los datos al controlador
		cache:false,//este es para que no jale datos de la caché
		dataType:"json", //el tipo de dato que devolverá puede ser tex o json
		success:mostrarDatosRec,//funcion a donde se resiviran los datos
		error      : function() {//funció de error
			alert('Error: No puedo mostar recomendaciones');
		}
	});

//función que recibe los datos
function mostrarDatosRec(data){
	$("#recomendaciones_usuarion").html('');
	$("#recomendaciones_usuarion").empty();//se limpia el div con id recomendaciones_usuario
	$("#recomendaciones_usuarion").append('<ul>');//se crea la lista
	//para poder obtener los datos de un json se usa el each
	$(data).each(function(index,data){
		if (data.estado==="success"){//el succes es para ver si vienen datos en cada row
			//se genera la lista de las recomendaciones ya guardadas 
			$("#recomendaciones_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartar('+data.v1+')">Descartar</a></div></div><br>');
		}                
	});
	$("#recomendaciones_usuarion").append('</ul><br>');//cierre de lista
	$("#recomendaciones_usuarion").trigger('create');//creacion
}				
}
//click para guardar recomendación
$(document).on('click','#guardar_recomendacionn', function(){
    debugger;
	var recomendacion=$.trim($("#recomendacion_txn").val());//recibe lo que se puso en el text area con id recomendacion_tx
	var id_usuario_re=$.trim($("#usr_id").val());//recibe el id de el input tipo hidden previamente generado
	var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'inserta_recomendacion.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({usuario_php:id_usuario_re,recomendacion_tx:recomendacion,fecha_tx:fecha}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSuccesRec,//
		error      : function() {
			alert('Error: error al guardar ');
		}
	});
	//función que recibe el dato
	function OnSuccesRec(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Acuerdo insertado');//alerta de inserción
			$("#recomendacion_txn").val('');// se limpia el text area
			//se vuelve a hacer el ajax que trae las recomendaciones ya guaradadas
			$.ajax({
				type       : "POST",
				url        : TxbUrl+'traer_recomendacionesnew.php', //script que insertará los datos en el servidor				
				data:({usuario_php:id_usuario_res,fecha_tx:fecha}),
				cache:false,
				dataType:"json",
				success:mostrarDatosRec,
				error      : function() {
					alert('Error: vale madre ');
				}
			});
			function mostrarDatosRec(data){
				$("#recomendaciones_usuarion").html('');
				$("#recomendaciones_usuarion").empty();
				$("#recomendaciones_usuarion").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#recomendaciones_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartar('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#recomendaciones_usuarion").append('</ul><br>');
				$("#recomendaciones_usuarion").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}

	
});

//Inserta nuevo plan 
	//funcion que trae el plan de restitucion segun el id del niño
	
function NuevoPlan(id_expediente){
	//debugger;
	//se recibe el id en id_usuario_unic
	
	$("#plan_grln").css('display','block');//se cambia el estilo del panel para que aparezca en la vista
	$("#hidden_usrn").empty();//se vacia el div correspondiente al id hidden_usr
	$("#hidden_usrn").append('<input type="hidden" id="usr_id" name="usr_id" value="'+id_expediente+'">');//se genera el input de tipo hidden con el id_del usuario
	$("#hidden_usrn").trigger('create');//Se crea
	var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
			$.ajax({
				type       : "POST",
				url        : TxbUrl+'traer_plannew.php', //script que insertará los datos en el servidor				
				data:({usuario_php:id_expediente,fecha_tx:fecha}),
				cache:false,
				dataType:"json",
				success:mostrarDatosPlan,
				error      : function() {
					alert('Error: error al tarer los planes ');
				}
			});
			function mostrarDatosPlan(data){
				$("#plan_usuarion").html('');
				$("#plan_usuarion").empty();
				$("#plan_usuarion").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#plan_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartarp('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#plan_usuarion").append('</ul><br>');
				$("#plan_usuarion").trigger('create');
			}			
}
	//click para guardar plan
	$(document).on('click','#guardar_plann', function(){
		var plan=$.trim($("#plan_txn").val());//recibe lo que se puso en el text area con id plan_tx
		var id_usuario_re=$.trim($("#usr_id").val());//recibe el id de el input tipo hidden previamente generado
		var fecha=$.trim($("#fecha_gral").val()); //Trae la fecha qeu se guarda en el post date
		$.ajax({
			type       : "POST",
			url        : TxbUrl+'inserta_plan.php', //script que insertará los datos en el servidor, en tu casp url del controller				
			data:({usuario_php:id_usuario_re,plan_tx:plan,fecha_tx:fecha}),//datso que se envian
			cache:false,
			dataType:"text",//tipo de dato que devolverá en este caso es un text
			success:OnSuccesPlan,//
			error      : function() {
				alert('Error:error al guardar plan ');
			}
		});
		//función que recibe el dato
		function OnSuccesPlan(data){
			var arr=data.split('|');//Separa la estring que regresa el ajax
			//alert(data);
			var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
			if (arr[0]==="OK") {
				alert('Plan insertadado');//alerta de inserción
				$("#plan_txn").val('');// se limpia el text area
				//se vuelve a hacer el ajax que trae los planes ya guardados
				var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
				$.ajax({
					type       : "POST",
					url        : TxbUrl+'traer_plannew.php', //script que insertará los datos en el servidor				
					data:({usuario_php:id_usuario_res,fecha_tx:fecha}),
					cache:false,
					dataType:"json",
					success:mostrarDatosPlan,
					error      : function() {
						alert('Error: vale madre ');
					}
				});
				function mostrarDatosPlan(data){
					$("#plan_usuarion").html('');
					$("#plan_usuarion").empty();
					$("#plan_usuarion").append('<ul>');
					$(data).each(function(index,data){
						if (data.estado==="success"){ 
							$("#plan_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartarp('+data.v1+')">Descartar</a></div></div><br>');
						}                
					});
					$("#plan_usuarion").append('</ul><br>');
					$("#plan_usuarion").trigger('create');
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
			success:OnSuccesDescartarPlan,//
			error      : function() {
				alert('Error: vale madre ');
			}
		});
		function OnSuccesDescartarPlan(data){
			var arr=data.split('|');//Separa la estring que regresa el ajax
			//alert(data);
			var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
			if (arr[0]==="OK") {
				alert('Plan descartado');//alerta de inserción
				$("#plan_txn").val('');// se limpia el text area
				//se vuelve a hacer el ajax que trae los planes ya guardados
				var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
				$.ajax({
					type       : "POST",
					url        : TxbUrl+'traer_plannew.php', //script que insertará los datos en el servidor				
					data:({usuario_php:id_usuario_res, fecha_tx:fecha}),
					cache:false,
					dataType:"json",
					success:mostrarDatosPlan,
					error      : function() {
						alert('Error: ERROR AL TARER DATOS ');
					}
				});
				function mostrarDatosPlan(data){
					$("#plan_usuarion").html('');
					$("#plan_usuarion").empty();
					$("#plan_usuarion").append('<ul>');
					$(data).each(function(index,data){
						if (data.estado==="success"){ 
							$("#plan_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartarp('+data.v1+')">Descartar</a></div></div><br>');
						}                
					});
					$("#plan_usuarion").append('</ul><br>');
					$("#plan_usuarion").trigger('create');
				}
			}else{
				alert('Error de inserción'); 
			}
		}
	}
	
		//funcion que trae el plan de restitucion segun el id del niño
		function AutorizaNew(id_expediente){
			debugger;
			//se recibe el id en id_usuario_unic
			
			$("#autoriza_grln").css('display','block');//se cambia el estilo del panel para que aparezca en la vista
			$("#hidden_usrn").empty();//se vacia el div correspondiente al id hidden_usr
			$("#hidden_usrn").append('<input type="hidden" id="usr_id" name="usr_id" value="'+id_expediente+'">');//se genera el input de tipo hidden con el id_del usuario
			$("#hidden_usrn").trigger('create');//Se crea
			//se comienza a usar ajax 
			var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
			$.ajax({
				type       : "POST",//forma de envio de datos
				url        :  TxbUrl+'traer_autorizanew.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
				data:({usuario_php:id_expediente,fecha_tx:fecha}),//aquí se insertan los datos al controlador
				cache:false,//este es para que no jale datos de la caché
				dataType:"json", //el tipo de dato que devolverá puede ser tex o json
				success:mostrar,//funcion a donde se resiviran los datos
				error      : function() {//funció de error
					alert('Error: error al traer autorizanew');
				}
			});
			//función que recibe los datos
			function mostrar(data){
				$("#autoriza_usuarion").html('');
				$("#autoriza_usuarion").empty();//se limpia el div con id autoriza_usuario
				$("#autoriza_usuarion").append('<ul>');//se crea la lista
				//para poder obtener los datos de un json se usa el each
				$(data).each(function(index,data){
					if (data.estado==="success"){//el succes es para ver si vienen datos en cada row
						//se genera la lista de las recomendaciones ya guardadas 
						$("#autoriza_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartara('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#autoriza_usuarion").append('</ul><br>');//cierre de lista
				$("#autoriza_usuarion").trigger('create');//creacion
			}	
		}

			

		//click para guardar plan
$(document).on('click','#guardarAut', function(){
	var plan=$.trim($("#autoriza_txn").val());//recibe lo que se puso en el text area con id plan_tx
	var id_usuario_re=$.trim($("#usr_id").val());//recibe el id de el input tipo hidden previamente generado
	var fecha=$.trim($("#fecha_gral").val());
	//alert(fecha+plan+id_usuario_re);
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'inserta_autoriza.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({usuario_php:id_usuario_re,autoriza_tx:plan,fecha_tx:fecha}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSuccesA,//
		error      : function() {
			alert('Error: Error 1 ');
		}
	});
	//función que recibe el dato
	function OnSuccesA(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Persona insertada');//alerta de inserción
			$("#autoriza_txn").val('');// se limpia el text area
			//se vuelve a hacer el ajax que trae los planes ya guardados
		//se comienza a usar ajax 
    var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
			$.ajax({
				type       : "POST",//forma de envio de datos
				url        :  TxbUrl+'traer_autorizanew.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
				data:({usuario_php:id_usuario_res,fecha_tx:fecha}),//aquí se insertan los datos al controlador
				cache:false,//este es para que no jale datos de la caché
				dataType:"json", //el tipo de dato que devolverá puede ser tex o json
				success:mostrarDatosN,//funcion a donde se resiviran los datos
				error      : function() {//funció de error
					alert('Error: error al traer autorizanew');
				}
			});
			function mostrarDatosN(data){
				$("#autoriza_usuarion").html('');
				$("#autoriza_usuarion").empty();
				$("#autoriza_usuarion").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#autoriza_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartara('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#autoriza_usuarion").append('</ul><br>');
				$("#autoriza_usuarion").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}

	
});

function descartara(id_plan){
	//alert(id_plan);
	//debugger;
	//alert(id_recomendacion);
	$.ajax({
		type       : "POST",
		url        : TxbUrl+'descarta_autoriza.php', //script que insertará los datos en el servidor, en tu casp url del controller				
		data:({id_plan_unic:id_plan}),//datso que se envian
		cache:false,
		dataType:"text",//tipo de dato que devolverá en este caso es un text
		success:OnSuccesDescartara,//
		error      : function() {
			alert('Error: vale madre ');
		}
	});
	function OnSuccesDescartara(data){
		var arr=data.split('|');//Separa la estring que regresa el ajax
		//alert(data);
		var id_usuario_res=$.trim($("#usr_id").val());//trae el id del input tipo hidden
		if (arr[0]==="OK") {
			alert('Persona descartada');//alerta de inserción
			$("#autoriza_txn").val('');// se limpia el text area
      var fecha=$.trim($("#fecha_gral").val());//recibe l afecha que trae el post en date
			$.ajax({
				type       : "POST",//forma de envio de datos
				url        :  TxbUrl+'traer_autorizanew.php', //script que insertará los datos en el servidor, en tu caso aqui pones la url de la función en el controlador				
				data:({usuario_php:id_usuario_res,fecha_tx:fecha}),//aquí se insertan los datos al controlador
				cache:false,//este es para que no jale datos de la caché
				dataType:"json", //el tipo de dato que devolverá puede ser tex o json
				success:mostrarDatosN,//funcion a donde se resiviran los datos
				error      : function() {//funció de error
					alert('Error: error al traer autorizanew');
				}
			});
			function mostrarDatosN(data){
				$("#autoriza_usuarion").html('');
				$("#autoriza_usuarion").empty();
				$("#autoriza_usuarion").append('<ul>');
				$(data).each(function(index,data){
					if (data.estado==="success"){ 
						$("#autoriza_usuarion").append('<div class="row"><div class="col-md-10"><li>'+data.v2+' <input type="hidden" id="'+data.v1+'" value="'+data.v1+'"></li></div><div class="col-md-2"><a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="descartara('+data.v1+')">Descartar</a></div></div><br>');
					}                
				});
				$("#autoriza_usuarion").append('</ul><br>');
				$("#autoriza_usuarion").trigger('create');
			}
		}else{
			alert('Error de inserción'); 
		}
	}
}




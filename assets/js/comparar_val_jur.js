
//Comparación 1
 function obtener_informacion_mes(selectobject){
     var mes = selectobject.value;
    //alert ('estoy en info mes ');
    var id_expediente= $.trim($('#id_exp').val());
    var anio = $.trim($("#year").val());
    if(anio.length == ""){
        alert ('por favor elije un año y después el mes.');

    }else{
         //alert (mes + id_expediente);
         //alert ('Ha elegido un año');
        traer_planes(mes,id_expediente);
        traer_acuerdos(mes,id_expediente);
        traer_personas(mes,id_expediente);
    }
    
 }
 function traer_planes(mes,id_expediente){
    //alert(mes+id_expediente);
    //alert('estoy trayendo planes');
    var anio = $.trim($("#year").val());
    //alert(anio);
    $.ajax({
        type:"POST",
        url  : base_url+'Proyecto/traerplanes',
        data:({mes_tx:mes,id:id_expediente,anio:anio}),
        cache:false,
        dataType:"json",
        success:mostrarPlanes,
        error:function(){
            alert('No puedo traer datos');
        }
    });
    function mostrarPlanes(data){
        //alert('estoy eN funcion mostar planes');
        $("#plan").empty();
        $("#plan").append('<ul >');
        $(data).each(function(index,data){
            if(data.estado=="success"){
                $("#plan").append('<li class="list-group-item">'+data.v2+'</li>');
            }
        });
        $("#plan").append('</ul>');
        $("#plan").trigger('create');
        
    }
 }//Fin de función traer planes 

 function traer_acuerdos(mes,id_expediente){
    var anio = $.trim($("#year").val());
    //alert('estoy en acuerdos'+mes+id_expediente);
    $.ajax({
        type:"POST",
        url  : base_url+'Proyecto/traeracuerdos',
        data:({mes_tx:mes,id_tx:id_expediente,anio:anio}),
        cache:false,
        dataType:"json",
        success:mostrarAcuerdos,
        error:function(){
            alert('No se pudieron traer los datos');
        }
    });

    function mostrarAcuerdos(data){
        //alert('estoy e funcion mostar acuerdos');
        $("#acuerdo").empty();
        $("#acuerdo").append('<ul>');
        $(data).each(function(index,data){
            if(data.estado=="success"){
                $("#acuerdo").append('<li class="list-group-item">'+data.v2+'</li>');

            }
        });
        $("#acuerdo").append('</ul>');
        $("#acuerdo").trigger('create');
        
    }
    
 }//Fin de función traer acuerdos.

 function traer_personas(mes,id_expediente){
    var anio = $.trim($("#year").val());
    //alert('estoy en acuerdos'+mes+id_expediente);
    $.ajax({
        type:"POST",
        url  : base_url+'Proyecto/traerpersonas',
        data:({mes_tx:mes,id_tx:id_expediente,anio:anio}),
        cache:false,
        dataType:"json",
        success:mostrarPersonas,
        error:function(){
            alert('No se pudieron traer los datos');
        }
    });

    function mostrarPersonas(data){
        //alert('estoy e funcion mostar acuerdos');
        $("#persona").empty();
        $("#persona").append('<ul>');
        $(data).each(function(index,data){
            if(data.estado=="success"){
                $("#persona").append('<li class="list-group-item">'+data.v2+'</li>');

            }
        });
        $("#persona").append('</ul>');
        $("#persona").trigger('create');
        
    }
    
 }//Fin de función traer personas. 

 //Carga de datos 2
 //Comparación 1
 function obtener_informacion_mes2(selectobject){
     var mes = selectobject.value;
     var anio = $.trim($("#year").val());
    //alert (mes);
    var id_expediente= $.trim($('#id_exp').val());
    //alert (mes + id_expediente);
        if(anio.length == ""){
            alert ('por favor elije un año y después el mes.');

        }else{
            //alert ('Si traigo año .');
        traer_planes2(mes,id_expediente);
        traer_acuerdos2(mes,id_expediente);
        traer_personas2(mes,id_expediente);
        }
 }
 function traer_planes2(mes,id_expediente){
    var anio = $.trim($("#year").val());
    //alert(mes+id_expediente);
    //alert(anio);
    $.ajax({
        type:"POST",
        url  : base_url+'Proyecto/traerplanes',
        data:({mes_tx:mes,id:id_expediente,anio:anio}),
        cache:false,
        dataType:"json",
        success:mostrarPlanes2,
        error:function(){
            alert('Vale madre hubo un error');
        }
    });
    function mostrarPlanes2(data){
        //alert('estoy e funcion mostar planes 2');
        $("#plan2").empty();
        $("#plan2").append('<ul>');
        $(data).each(function(index,data){
            if(data.estado=="success"){
                $("#plan2").append('<li class="list-group-item">'+data.v2+'</li>');

            }
        });
        $("#plan2").append('</ul>');
        $("#plan2").trigger('create');
        
    }
 }//Fin de función traer planes 

 function traer_acuerdos2(mes,id_expediente){
    var anio = $.trim($("#year").val());
    //alert('estoy en acuerdos'+mes+id_expediente);
    $.ajax({
        type:"POST",
        url  : base_url+'Proyecto/traeracuerdos',
        data:({mes_tx:mes,id_tx:id_expediente,anio:anio}),
        cache:false,
        dataType:"json",
        success:mostrarAcuerdos2,
        error:function(){
            alert('Vale madre hubo un error');
        }
    });

    function mostrarAcuerdos2(data){
        //alert('estoy e funcion mostar acuerdos');
        $("#acuerdo2").empty();
        $("#acuerdo2").append('<ul>');
        $(data).each(function(index,data){
            if(data.estado=="success"){
                $("#acuerdo2").append('<li class="list-group-item">'+data.v2+'</li>');

            }
        });
        $("#acuerdo2").append('</ul>');
        $("#acuerdo2").trigger('create');
        
    }
    
 }//Fin de función traer acuerdos.

 function traer_personas2(mes,id_expediente){
    var anio = $.trim($("#year").val());
    //alert('estoy en acuerdos'+mes+id_expediente);
    $.ajax({
        type:"POST",
        url  : base_url+'Proyecto/traerpersonas',
        data:({mes_tx:mes,id_tx:id_expediente,anio:anio}),
        cache:false,
        dataType:"json",
        success:mostrarPersonas2,
        error:function(){
            alert('Vale madre hubo un error');
        }
    });

    function mostrarPersonas2(data){
        //alert('estoy e funcion mostar acuerdos');
        $("#persona2").empty();
        $("#persona2").append('<ul>');
        $(data).each(function(index,data){
            if(data.estado=="success"){
                $("#persona2").append('<li class="list-group-item">'+data.v2+'</li>');

            }
        });
        $("#persona2").append('</ul>');
        $("#persona2").trigger('create');
        
    }
    
 }//Fin de función traer personas. 
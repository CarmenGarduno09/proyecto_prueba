<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Registro de fugas</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">"FUGAS"</h1></center>
<br>

          <style>

        .round {
 background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 15px auto;
 padding: 5px;
 border: 1px solid #ccc;


 -moz-border-radius: 11px;
 -webkit-border-radius: 11px;
 border-radius: 11px;
 behavior: url(border-radius.htc);
    }
</style>

<html>

<head>
<TITLE>objetos redondeados</TITLE>

    <style>

        .round {
          background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 18px auto;
 padding: 7px;
 border: 2px solid #ccc;

 -moz-border-radius: 15px;
 -webkit-border-radius: 15px;
 border-radius: 15px;


 behavior: url(border-radius.htc);

    }


    .ph-center {
  height: 100px;
}
.ph-center::-webkit-input-placeholder {
  text-align: center;
}

    </style>

</head>

<body>

 <div id="formulario" >

    <table style="background-color:#F5F6CE;">

        <tr>
           
<div class="col-lg-6">
    <div class="input-group">
 </div>
</div>

        </tr>

<br>  


    </table>

 </div>

</body>

</html>

          <table class="table table-bordered" id="dataTables-example">
            
            <thead>
              <tr bgcolor="#FEF5E7" align="center">
                  <center>
                <th> <center>No. Expediente</th>
                <th> <center>No. Carpeta</th>
                <th> <center>Estado procesal</th>
                <th> <center>Nombre del niño</th>
                <!--<th> <center>Fecha nacimiento</th>-->
                <th> <center>Edad</th>
                <!--<th> <center>Género</th>-->
                <th> <center>Centro asistencial</th>
                <th> <center>Fecha de ingreso</th>
                <th> <center>Motivos de ingreso</th>
                <th> <center>Motivos de ingreso</th>
                <th> <center>Fecha de fuga</th>
                <th> <center>Motivos de fuga</th>
                <th> <center>¿Fué localizado?</th>
                <th> <center>Estancia</center></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php
              //die(var_dump($expedientes)); 
              foreach ($fugas as $e){
              ?>
              <tr>
            <td><?php echo $e->no_expediente;?></td>
              <td><?php echo $e->no_carpeta;?></td>
                <td><?php echo $e->nombre_estado;?></td>
                <!--<td class="<?php echo $etiqueta;?>"><?php echo $this->Modelo_proyecto->ver_centro($e->id_centro);?></td>-->
                <td><?php echo $e->nombres_nino;?> <?php echo $e->apellido_pnino;?> <?php echo $e->apellido_mnino;?></td>
                <!--<td><?php echo $e->fecha_nnino;?></td>-->
                <td>
                <?php 
                $fecha_naci = $this->Modelo_proyecto->ver_edad($e->id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo "0"; 
                else echo $edad;
                ?>
                </td>
                <!--<td><?php echo $e->genero_nino;?></td>-->
                <td><?php echo $e->nombre_centro;?></td>
                <td><?php echo $e->fecha_ingreso;?></td>
                <td><?php echo $e->motivos_ingreso;?></td>
                <td><?php echo $e->delito;?></td>
                <td><?php echo $e->fecha_fuga;?></td>
                <td><?php echo $e->motivos_fuga;?></td>
                <td><?php echo $e->localizado;?></td>
                <td><?php echo $e->estancia_nino;?></td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>


   

    <script>

jQuery(document).ready(function ($) {

/*----------------------FUNCIONES GENERALES--------------------*/

function alinearCeldasTrabajadores() {
    var celdas_right = ["2", "4"];
    var i;
    var celdas_left = ["1"];
    var j;
    for (i = 0; i < celdas_right.length; i++) {
        $("#tabla_trabajadores tbody tr td:nth-child(" + celdas_right[i] + ")").css('text-align', 'right');
    }
    for (j = 0; j < celdas_left.length; j++) {
        $("#tabla_trabajadores tbody tr td:nth-child(" + celdas_left[j] + ")").css('text-align', 'left');
    }

}

function limpiarTabla(table) {
    var table = $(table).DataTable();
    table.clear().draw();
}

function dataTable(table) {
    //alinearCeldasTrabajadores();

    table = $(table).DataTable({
        "scrollY": 300,
        "scrollX": false,
        "scrollCollapse": true,
        "paging": false,
        "searching": false,
        "retrieve": true,
        "fixedColumns": true,
        "language": {
            "decimal": "",
            "emptyTable": "No hay información para mostrar",
            "info": "",
            "infoEmpty": "",
            "infoFiltered": "",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
        },
    });

}

function limpiars() {
    $("input[name='desde']").val('');
    $("input[name='hasta']").val('');
    
}

function limpiar() {
    limpiars();
    limpiarTabla("#fugas_tabla");
}

function creaTablafugas(data_json){
    limpiarTabla("#fugas_tabla");
    var data = JSON.stringify(data_json);
    data = '{"renglones":'+ data + '}';
    var json = JSON.parse(data);

    var table = $('#fugas_tabla').DataTable();
    var nombre = "";

    var fechaActual = new Date()

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);


    for(var i = 0; i< json.renglones.length; i++)
    {
        var fechaNace = new Date(json.renglones[i].fecha_nnino);
nombre = json.renglones[i].nombres_nino+" "+json.renglones[i].apellido_pnino+" "+json.renglones[i].apellido_mnino;
edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
if(isNaN(edad) == true){edad = 0;}
           table.row.add( [
            json.renglones[i].no_expediente,
                  json.renglones[i].no_carpeta,
                  json.renglones[i].nombre_estado,
                  nombre,
                  edad,
                  json.renglones[i].nombre_centro,
                  json.renglones[i].fecha_ingreso,
                  json.renglones[i].motivos_ingreso,
                  json.renglones[i].fecha_fuga,
                  json.renglones[i].motivos_fuga,
                  json.renglones[i].localizado,
                  json.renglones[i].estancia_nino
                  
          ] ).draw( false );
    }
            
    
 }

function llamartabla(){
    var fecha_inicio = $("input[name='desde_e']").val();
    var fecha_final = $("input[name='hasta_e']").val();

    $.ajax({
        url: base_url + "Proyecto/fugas_filtrados",
        type: "POST",
        dataType: "json",
        data: {fecha_inicial:fecha_inicio, fecha_final:fecha_final},
        success: function (json) {
            if (json.status == "200") {
                creaTablafugas(json.datos);
            } else if (json.status == "500") {
                limpiarTabla("#fugas_tabla");
            } else if (json.status == "300") {
                 limpiarTabla("#fugas_tabla");
            }
        },
        error: function (xhre) {
            console.log(xhre);
        }
    });
}



/*----------------------CIERRE DE CREAR TABLAS--------------------*/
dataTable("#fugas_tabla");    

$(document).on("click", '#buscar_egreso', function (event) {
    event.preventDefault();
    limpiarTabla("#fugas_tabla");
    llamartabla();
});

llamartabla();

   

});

  </script>

   
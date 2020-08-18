<style>
    #modal_trabajadores .dataTables_scrollBody {
        height: auto;
        max-height: 162px !important;
    }
    
    #modal_nominas .dataTables_scrollBody {
        height: auto;
        max-height: 162px !important;
    }

    #tabla_personal tbody tr td {
        border: 1px solid lightgray !important;
        font-size: 10px !important
    }
</style>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li class="active">Egresos</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">FILTRADO DE  DE LOS MENORES</h1></center>
<br>
<table border="0">
<tr>
<td>Desde&nbsp;</td>
<td><input type="date" name="desde_e" id="db_desde_e"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>Hasta&nbsp;</td>
<td><input type="date" name="hasta_e" id="db_hasta_e"></td>
<td>&nbsp;&nbsp;&nbsp;</td>
<td><input type="submit" id="buscar_fugas" name="buscar" value="Buscar"></td> 
</tr>
</table>
<br><br>

<table class="table table-bordered" id="fugas_tabla" cellspacing="0" style="width:90%;">
            
            
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
                <th> <center>Fecha de fuga</th>
                <th> <center>Motivos de fuga</th>
                <th> <center>¿Fué localizado?</th>
                <th> <center>Estancia</center></th>
                </center>
              </tr>
            </thead>
            <tbody>

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

function creaTablaegresos(data_json){
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
    var fecha_inicio = $("input[name='desde']").val();
    var fecha_final = $("input[name='hasta']").val();

    $.ajax({
        url: base_url + "Proyecto/fugas_filtrados",
        type: "POST",
        dataType: "json",
        data: {fecha_inicial:fecha_inicio, fecha_final:fecha_final},
        success: function (json) {
            if (json.status == "200") {
                creaTablaegresos(json.datos);
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

   
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li class="active">Expedientes NNA</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">EXPEDIENTES DE LOS NNA CON VALORACIÓN TRABAJO SOCIAL</h1></center>
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

</body>

</html>

          <table class="table table-bordered" id="dataTables-example">
            
            <thead>
              <tr bgcolor="#FEF5E7" align="center">
                  <center>
                <th> <center>No. Expediente</th>
                <th> <center>No. Carpeta</th>
                <th> <center>Centro asistencial</th>
                <th> <center>Nombre del NNA</th>
                <th> <center>Fecha nacimiento</th>
                <th> <center>Edad</th>
                <th> <center>Género</th>
                <th> <center>Fecha de ingreso</th>
                <th> <center>Delito</th>
                <th> <center>Motivos de ingreso</th>
                <th> <center>Ver Valoración</th>
                <th> <center>Editar</th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php
              //die(var_dump($expedientes)); 
              foreach ($expedientes_trabajo_soc as $e){
              ?>
              <tr>
            <td ><?php echo $e->no_expediente;?></td>
              <td><?php echo $e->no_carpeta;?></td>
              <td><?php echo $e->nombre_centro;?></td>
                <!--<td class="<?php echo $etiqueta;?>"><?php echo $this->Modelo_proyecto->ver_centro($e->id_centro);?></td>-->
                <td><?php echo $e->nombres_nino;?> <?php echo $e->apellido_pnino;?> <?php echo $e->apellido_mnino;?></td>
                <td><?php echo $e->fecha_nnino;?></td>
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
                <td><?php echo $e->genero_nino;?></td>
                <td><?php echo $e->fecha_ingreso;?></td>
                <td><?php echo $e->delito;?></td>
                <td><?php echo $e->motivos_ingreso;?></td>
                <td><center><a class="btn btn-success" href="<?php echo base_url('index.php/proyecto/ver_tra_soc');?>/<?php echo $e->id_expediente;?>/<?php echo $e->id_ingreso;?>" role="button"><span class="glyphicon glyphicon-eye-open"></span></span></a></td>
                <td><center><a class="btn btn-warning" href="<?php echo base_url('index.php/proyecto/editar_tra_soc');?>/<?php echo $e->id_expediente;?>/<?php echo $e->id_ingreso;?>" role="button"><span class="glyphicon glyphicon-pencil"></span></span></a></td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>


   
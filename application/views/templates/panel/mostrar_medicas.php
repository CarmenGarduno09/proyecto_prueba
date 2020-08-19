<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li class="active">Valoraciones Medicas</li>
  </ol>
  <center><h1 style="background-color: white" border="2" class="page-header">VALORACIONES MEDICAS</h1></center>
<br>
<div class="col-md-4">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='165' height='180'></center></td>
              <!--<td><img src="<?=base_url();?>/uploadt/<?=$dif->foto_nino;?>" width='60' height='60'></td>-->
              </div>
            </div>
</div>
<div class="col-md-8">
    <div class="well well-sm">
        <h1 align="center" ><p>Nombre del NNA: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
        <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
        <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
    </div>
</div>

<!--==========TABALA DE VALORACIONES MEDICAS==========-->
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading" align="center">VALORACIONES MEDICAS</div>
<table class="table table-bordered" >     
    <thead>
      <tr bgcolor=" #f8f9f9" align="center">
          <center>
        <th> <center>Fecha del Valoración</th>
        <th> <center>Descripción Inicial</th>
        <th> <center>Ver</th>
        <th> <center>Editar</th>
        </center>
      </tr>
    </thead>
    <tbody>
    <?php 
      foreach ($valora_medica as $f){ 
      ?>
       <tr> 
       <td><center><?php $medicas=$f->fecha_valmed;
         //var_dump($medicas);
         $dia = substr($medicas,8,2);
         $mes = substr($medicas,5,2); 
         $anio = substr($medicas,0,4);
         $fecha_med = $dia."/".$mes."/".$anio;
         echo $fecha_med;
         //var_dump($fecha_med); 
         ?></center></td>
       <td><center><?php echo $f->des_ini;?> </center></td>
       <td><center><a class="btn btn-success" href="<?php echo base_url('index.php/proyecto/ver_evaluacion_medico');?>/<?php echo $f->fk_expediente;?>/<?php echo $f->id_valmedica;?>" role="button"><span class="glyphicon glyphicon-eye-open"></span></span></a></center></td>
        <td><center><a class="btn btn-warning" href="<?php echo base_url('index.php/proyecto/editar_evaluacion_medico');?>/<?php echo $f->fk_expediente;?>/<?php echo $f->id_valmedica;?>" role="button"><span class="glyphicon glyphicon-pencil"></span></span></a></center></td>
       </tr>
     <?php
      }
      ?>
    </tbody>
</table>
</div>
</div>
<hr>
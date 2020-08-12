<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li class="active">Valoraciones Psicológicas</li>
  </ol>
  <center><h1 style="background-color: white" border="2" class="page-header">VALORACIONES PSICOLÓGICAS</h1></center>
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
        <h1 align="center" ><p>Nombre del Menor: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
        <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
        <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
    </div>
</div>
<!--==========TABALA DE VALORACIÓN DE INGRESO==========-->
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading" align="center">VALORACIONES DEL INGRESO DEL MENOR</div>
<table class="table table-bordered" >     
    <thead>
      <tr bgcolor=" #f8f9f9" align="center">
          <center>
        <th> <center>Fecha de Valoración</th>
        <th> <center>Nombre del Visitante</th>
        <th> <center>Parentesco</th>
        <th> <center>Ver</th>
        <th> <center>Editar</th>
        </center>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($valora_psico as $f){
      ?>
       <tr> 
       <td><center><?php echo $f->fecha_valpsi;?> </center></td>
       <td><center><?php echo $f->nombre_visitante;?> </center></td>
       <td><center><?php echo $f->parentesco;?> </center></td>
       <td><center><a class="btn btn-success"  href="<?php echo base_url('index.php/proyecto/imprimir_compa');?>/<?php echo $f->id_valpsicologia;?>/<?php echo $f->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-eye-open"></span></span></a></center></td>
       <td><center><a class="btn btn-warning"  href="<?php echo base_url('index.php/proyecto/editar_val_psi');?>/<?php echo $f->id_valpsicologia;?>/<?php echo $f->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-pencil"></span></span></a></center></td> 
      </tr>
     <?php
      }
      ?>
    </tbody>
</table>
</div>
</div>
<hr>
<!--==========TABALA DE VALORACIONES PSICOLÓGICAS(INFORME)==========-->
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading" align="center">VALORACIONES PSICOLÓGICAS</div>
<table class="table table-bordered" >     
    <thead>
      <tr bgcolor=" #f8f9f9" align="center">
          <center>
        <th> <center>Fecha del Informe</th>
        <th> <center>Resultado de la Valoración</th>
        <th> <center>Ver</th>
        <th> <center>Editar</th>
        </center>
      </tr>
    </thead>
    <tbody>
    <?php 
      foreach ($valora_informe as $i){
      ?>
      <tr>
      <td><center><?php echo $i->fecha_im;?> </center></td>
      <td><center><?php echo $i->resul;?> </center></td>
      <td><center><a class="btn btn-success"  href="<?php echo base_url('index.php/proyecto/imprimir_compa1');?>/<?php echo $i->id_menor;?>/<?php echo $i->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-eye-open"></span></span></a></center></td>
      <td><center><a class="btn btn-warning"  href="<?php echo base_url('index.php/proyecto/editar_informe');?>/<?php echo $i->id_menor;?>/<?php echo $i->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-pencil"></span></span></a></center></td> 
    </tr>
      <?php
      }
      ?>
    </tbody>
</table>
</div>
</div>
<hr>
<!--==========TABALA DE NOTAS PSICOLÓGICAS==========-->
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading" align="center">NOTAS PSICOLÓGICAS</div>
<table class="table table-bordered" >     
    <thead>
      <tr bgcolor=" #f8f9f9" align="center">
          <center>
        <th> <center>Fecha de la Nota</th>
        <th> <center>Actividad</th>
        <th> <center>Ver</th>
        <th> <center>Editar</th>
        </center>
      </tr>
    </thead>
    <tbody>
    <?php 
      foreach ($valora_nota as $n){
      ?>
      <tr>
      <td><center><?php echo $n->fecha_n;?> </center></td>
      <td><center><?php echo $n->actividad;?> </center></td>
      <td><center><a class="btn btn-success"  href="<?php echo base_url('index.php/proyecto/imprimir_compa2');?>/<?php echo $n->id_nota;?>/<?php echo $n->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-eye-open"></span></span></a></center></td>
      <td><center><a class="btn btn-warning"  href="<?php echo base_url('index.php/proyecto/editar_nota');?>/<?php echo $n->id_nota;?>/<?php echo $n->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-pencil"></span></span></a></center></td> 
    </tr>
      <?php
      }
      ?>
    </tbody>
</table>
</div>
</div>
<hr>
<!--==========VALORACIONES PSICOLÓGICAS DE LOS FAMILIARES==========-->
<div class="col-md-12">
<div class="panel panel-default">
  <div class="panel-heading" align="center">VALORACIONES PSICOLÓGICAS DE LOS FAMILIARES</div>
<table class="table table-bordered" >     
    <thead>
      <tr bgcolor=" #f8f9f9" align="center">
          <center>
        <th> <center>Fecha del Estudio</th>
        <th> <center>Nombre del Entrevistado</th>
        <th> <center>Parentesco</th>
        <th> <center>Ver</th>
        <th> <center>Editar</th>
        </center>
      </tr>
    </thead>
    <tbody>
    <?php 
      foreach ($valora_in_familiar as $r){
      ?>
      <tr>
      <td><center><?php echo $r->fechae;?> </center></td>
      <td><center><?php echo $r->nombre_cp;?> </center></td>
      <td><center><?php echo $r->parent_m;?> </center></td>
      <td><center><a class="btn btn-success"  href="<?php echo base_url('index.php/proyecto/imprimir_compa3');?>/<?php echo $r->id_infamiliar;?>/<?php echo $r->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-eye-open"></span></span></a></center></td>
      <td><center><a class="btn btn-warning"  href="<?php echo base_url('index.php/proyecto/editar_val_fam');?>/<?php echo $r->id_infamiliar;?>/<?php echo $r->fk_expediente;?>" role="button"><span  class="glyphicon glyphicon-pencil"></span></span></a></center></td>   
    </tr>
      <?php
      }
      ?>
    </tbody>
</table>
</div>
</div>
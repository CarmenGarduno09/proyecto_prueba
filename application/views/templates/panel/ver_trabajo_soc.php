<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<center><h3 style="background-color: white" border="2" class="page-header">VALORACIÓN DE TRABAJO SOCIAL</h3></center>
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

<div class="col-md-12">
<div class="well well-sm">
<label>VALORACIÓN DE TRABAJO SOCIAL </label><br/>
                  <label>Visita domiciliaria</label>
                  <p>
                  Fecha de Valoración: <?php $f_soc=$valoracion_social['fecha_e'];
                  //var_dump($f_soc);
                  $dia = substr($f_soc,8,2);
                  $mes = substr($f_soc,5,2);
                  $anio = substr($f_soc,0,4);
                  $fecha_tra = $dia."/".$mes."/".$anio;
                  echo $fecha_tra;
                  //var_dump($fecha_tra);
                  ?><br>
                  Nombre: <?php echo $valoracion_social['nombre_r']?><br>
                  Nombre: <?php echo $valoracion_social['nombre_e']?><br>
                  Pariente: <?php echo $valoracion_social['pariente']?><br>
                  Edad: <?php echo $valoracion_social['edad']?><br>
                  Domicilio: <?php echo $valoracion_social['domicilio']?><br>
                  Antecedentes del caso: <?php echo $valoracion_social['antec_caso']?><br>
                  Escolaridad: <?php echo $valoracion_social['escol']?><br>
                  Ocupación: <?php echo $valoracion_social['ocupacion']?><br>
                  Enfermedades: <?php echo $valoracion_social['p_enfer']?><br>
                  Antecedentes penales: <?php echo $valoracion_social['antec_penal']?><br>
                  Adicciones: <?php echo $valoracion_social['adiccion']?><br>
                  Materiales: <?php echo $valoracion_social['materiales']?><br>
                  Diágnostico: <?php echo $valoracion_social['diagnostico']?>
                  </p>
                  <label>Estudio socieconómico</label>
                  <p>
                  Situación económica: <?php echo $valoracion_social['situacion_e']?><br>
                  Gastos en agua: $<?php echo $valoracion_social['agua']?><br>
                  Gastos en luz: $<?php echo $valoracion_social['luz']?><br>
                  Gastos en alimentos: $<?php echo $valoracion_social['alimentos']?><br>
                  Gastos en transporte: $<?php echo $valoracion_social['transporte']?><br>
                  Gastos en telefono: $<?php echo $valoracion_social['tel']?><br>
                  Gastos médicos: $<?php echo $valoracion_social['g_medicos']?><br>
                  Total ingreso: $<?php echo $valoracion_social['tot_i']?><br>  
                  Total egreso: $<?php echo $valoracion_social['tot_e']?><br>
                  Bienes: <?php echo $valoracion_social['bienes_i']?><br>
                  Nivel: <?php echo $valoracion_social['nivel_s']?><br>  
                  Clase: <?php echo $valoracion_social['clase']?><br>                  
                  </p>
                  <label>Observación General de la Visita</label> 
                  <p>
                  <?php echo $valoracion_social['observacion_ge']?><br>
                  </p>
</div>
<center>
  <div class="noImprimir">
      <button  type="button" class="btn btn-success"  onclick="window.print()"><span  class="glyphicon glyphicon-print"></span> Imprimir</button>
  </div>

<!-- Div vacio para cragra la firma en css -->
<div>
   <br>
   <span  class="firma"> </span>
</div>
</center>
</div>
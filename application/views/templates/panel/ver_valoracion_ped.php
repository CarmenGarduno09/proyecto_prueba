<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<center><h3 style="background-color: white" border="2" class="page-header">VALORACIÓN PEDAGÓGICA</h3></center>

<div class="col-md-12">
    <div class="well well-sm">
        <h1 align="center" ><p>Nombre del NNA: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
        <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
        <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
    </div>
</div>

<div class="col-md-12">
<div class="well well-sm">
<label>VALORACIÓN ESCOLAR </label><br/>
                  <p>Fecha de Valoración: <?php echo $valoracion_ped['fecha_valped']?><br>
                  Escolaridad: <?php echo $valoracion_ped['nivel_estudios']?><br>
                  Lectura: <?php echo $valoracion_ped['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_ped['obs_lectoras']?><br>
                  Comprensión lectora: <?php echo $valoracion_ped['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_ped['obs_comp_lectora']?><br>
                  Transcripción: <?php echo $valoracion_ped['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_ped['obs_transcripcion']?><br>
                  Matemáticas: <?php echo $valoracion_ped['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_ped['obs_matematicas']?><br>
                  Español: <?php echo $valoracion_ped['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_ped['obs_espanol']?><br>
                  Escritura: <?php echo $valoracion_ped['nombre']?> <br>
                  Observaciones: <?php echo $valoracion_ped['obs_escritura']?><br>  
                  Canaliza de nivel: <?php echo $valoracion_ped['nombre_educacion']?></p>
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
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<center><h3 style="background-color: white" border="2" class="page-header">VALORACIÓN PSICOLÓGICA DE INGRESO</h3></center>

<div class="col-md-12">
    <div class="well well-sm">
        <h1 align="center" ><p>Nombre del NNA: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
        <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
        <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
    </div>
</div>

<div class="col-md-12">
<div class="well well-sm">
<label>Valoración del ingreso del NNA</label>
    <p>
    Fecha de Valoración: <?php echo $valoracion_psico['fecha_valpsi']?><br>    
    Motivos de ingreso: <?php echo $valoracion_psico['motivos_ing']?><br>
    Nombre del visitante: <?php echo $valoracion_psico['nombre_visitante']?><br>
    Parentesco: <?php echo $valoracion_psico['parentesco']?><br>
    Antecedentes: <?php echo $valoracion_psico['antecedentes']?><br>
    Actitud del niño: <?php echo $valoracion_psico['actitud_nino']?><br>
    Dinamica de convivencias: <?php echo $valoracion_psico['dinamica_convivencias']?><br>
    Recomendaciones: <?php echo $valoracion_psico['recomendaciones']?>
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
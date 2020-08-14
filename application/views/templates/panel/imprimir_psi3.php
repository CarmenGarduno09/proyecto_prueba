<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<center><h3 style="background-color: white" border="2" class="page-header">NOTA PSICOLÓGICA DEL MENOR</h3></center>

<div class="col-md-12">
    <div class="well well-sm">
        <h1 align="center" ><p>Nombre del Menor: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
        <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
        <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
    </div>
</div>

<div class="col-md-12">
<div class="well well-sm">
<label>Notas psicológicas</label>
    <p>
    Fecha de Creación: <?php echo $notas['fecha_n']?><br>
    Comentarios: <?php echo $notas['coment']?><br>
    Actividad: <?php echo $notas['actividad']?>
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
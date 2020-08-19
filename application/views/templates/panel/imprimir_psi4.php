<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<center><h3 style="background-color: white" border="2" class="page-header">VALORACIÓN PSICOLÓGICA DE UN FAMILIAR</h3></center>
<div class="col-md-12">
    <div class="well well-sm">
        <h1 align="center" ><p>Nombre del NNA: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
        <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
        <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
    </div>
</div>

<div class="col-md-12">
<div class="well well-sm">
<label>Valoración psicológica del familiar</label>
    <p>
    Fecha de la valoración: <?php $fecha_e=$familiar['fechae'];
      //var_dump($fecha_e);
      $dia = substr($fecha_e,8,2);
      $mes = substr($fecha_e,5,2);
      $anio = substr($fecha_e,0,4);
      $fe_e = $dia."/".$mes."/".$anio;
      echo $fe_e;
      //var_dump($fe_e);
    ?><br>
    Nombre del familiar: <?php echo $familiar['nombre_cp']?><br>
    Parentesco: <?php echo $familiar['parent_m']?><br>
    Escolaridad: <?php echo $familiar['escolaridad']?><br>
    Estado civil: <?php echo $familiar['ecivil']?><br>
    No. Hijos: <?php echo $familiar['n_hijos']?><br>
    Ocupación: <?php echo $familiar['ocupacione']?><br>
    Dirección: <?php echo $familiar['direccione']?><br>
    Antecedentes: <?php echo $familiar['ant']?><br>
    Conclusiones: <?php echo $familiar['conclu']?><br>
    Recomendaciones: <?php echo $familiar['rec']?>
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
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li class="active">Comparación de Valoraciones Psicológicas</li>
  </ol>
  <center><h1 style="background-color: white" border="2" class="page-header">COMPARACIÓN DE VALORACIONES</h1></center>
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
<?php 
    if($expediente['id_expediente']==$valoracion_psico['fk_expediente']){ 
      ?>
        <div class='col-md-12'><!--DIV INICIAL-->
          <div class='col-md-6'>     
            <BR>
          <CENTER>
              <Form method='POST' action='<?php echo base_url()?>index.php/proyecto/mostrar_compa/<?php echo $expediente['id_expediente'];?>' class='form-inline' >
              <label for='Nombres'><span class='glyphicon glyphicon-calendar'></span>Fecha de la Valoración</label><br>
                    <select name='1' class='form-control'>
                      <option  value=''>Seleccione una Fecha</option>
                    <?php
                       foreach ($valora_psico as $vp) {
                    ?>
                        <option value="<?=$vp->fecha_valpsi;?>"
                        <?php
                          if(isset($eleccion)&&($eleccion==$vp->fecha_valpsi)){
                            echo "selected";
                          }
                        ?>
                        >
                        <?=$vp->fecha_valpsi;?></option>
                    <?php
                       }
                    ?> 
                    </select>
                    &nbsp;<input type='submit' value='Ver' class='btn btn-primary'>
                </Form> 
                      </CENTER>
                <?php
                  if($eleccion){
                ?>
                <BR>
            <div class="well well-sm">
              <div class="panel-body" >
                  <label>VALORACIÓN PSICOLÓGICA </label><br/>
                  <lable>Fecha: <?php echo $eleccion?></label>
                  <p>
                  Nombre del visitante: <?php echo $de_valoracion_psico['nombre_visitante']?><br>
                  Parentesco: <?php echo $de_valoracion_psico['parentesco']?><br>
                  Antecedentes: <?php echo $de_valoracion_psico['antecedentes']?><br>
                  Actitud del niño: <?php echo $de_valoracion_psico['actitud_nino']?><br>
                  Dinámica de convivencias: <?php echo $de_valoracion_psico['dinamica_convivencias']?><br>
                  Recomendaciones: <?php echo $de_valoracion_psico['recomendaciones']?>
                  </p>
                  </div>
                  </div>
                  
                <?php  
                  }
                ?>
          </div>
          <!--=================================SIGUIENTE OPCIÓN=====================================-->
        </div><!--DIV INICIAL-->
    <?php
      }else{
        ?>
        <div class='col-md-12'><!--DIV INICIAL-->
          <div class='alert alert-success' role='alert'>
            <center>
            ¡El menor no cuenta con una valoración psicológica aún!
            </center>
          </div>
        </div><!--DIV INICIAL-->
        <td><center><a class="btn btn-success" href="<?php echo base_url()?>index.php/proyecto/valoracion_psicologica/<?php echo $expediente['id_expediente'];?>" role="button"><span class="glyphicon glyphicon-pencil"></span></span> Realizar Valoración Psicológica</a></center></td>

  <?php      
  }
  ?>
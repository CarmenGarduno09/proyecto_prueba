 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/compa_valoracion">NNA con Valoraciones Psicológicas</a></li>
      <li class="active">Edición de Valoración</li>
    </ol>

       <center> <h1 class="page-header">EDICIÓN DE VALORACIÓN PSICOLÓGICA DEL NNA</h1> </center>


<div class="panel panel-primary">
    <center> <div class="panel-heading"> 1. IDENTIFICACIÓN</div></center> 
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/visita_domiciliaria/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='200' height='215'></center></td>
                <!--<?php echo $expediente['foto_nino']?>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>Nombre del NNA: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
                  <label>Género: </label>  <?php echo $expediente['genero_nino']?><br/>
                 <label>Fecha de nacimiento: </label>  <?php $fecha_n=$expediente['fecha_nnino'];
                //var_dump($fecha_n);
                $dia = substr($fecha_n,8,2);
                $mes = substr($fecha_n,5,2);
                $anio = substr($fecha_n,0,4);
                $fecha_en = $dia."/".$mes."/".$anio;
                echo $fecha_en;
                //var_dump($fecha_n);
                ?><br/>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br/>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
                <label>Fecha de ingreso: </label>  <?php $f_expe = $expediente['fecha_ingreso'];
                //var_dump($f_expe);
                $dia = substr($f_expe,8,2);
                $mes = substr($f_expe,5,2);
                $anio = substr($f_expe,0,4);
                $fecha_e = $dia."/".$mes."/".$anio;
                echo $fecha_e;
                //var_dump($fecha);
                ?> <br/>
                  <label>Hora de ingreso: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>Motivos de ingreso: </label> <?php echo $expediente['motivos_ingreso']?><br/>
                  
              </div>
            </div>
          </div>
      </form>
       </div> 
        </div>



     <?php
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/editar_informe/'.$i_menor['id_menor'],$atributos);
       ?>
    <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>

      <input type="hidden" name="id_menor" value="<?php echo $i_menor['id_menor']; ?>">
      <?php echo form_error('id_menor');?>


      <div class="panel panel-primary">
    <center> <div class="panel-heading">2. FAMILIOGRAMA</div></center> 
    <div class="panel-body">
 <label for="familiograma"></label>
        <input  type="text" name="familiograma" value="<?php if(set_value('familiograma')) echo (set_value('familiograma'));else if(form_error('familiograma')){echo " ";}else{ echo $i_menor['familiograma'];};?>" id="familiograma" class="form-control" placeholder="Descripción de su familia">
        <?php echo form_error('familiograma');?>
        <br>  
</div>
</div>

      <div class="panel panel-primary">
    <center> <div class="panel-heading">3. ANTECEDENTES</div></center> 
    <div class="panel-body">
 <label for="antec_m"></label>
        <input  type="text" name="antec_m" value="<?php if(set_value('antec_m')) echo (set_value('antec_m'));else if(form_error('antec_m')){echo " ";}else{ echo $i_menor['antec_m'];};?>" id="antec_m" class="form-control" placeholder="Descripción de sus antecedentes ">
        <?php echo form_error('antec_m');?>
        <br>  
</div>
</div>
              <div class="panel panel-primary">
    <center> <div class="panel-heading">4. INSTRUMENTOS CLINICOS UTILIZADOS PARA LA VALORACIÓN</div></center> 
    <div class="panel-body">
 <label for="instrumentos"></label>
        <input  type="text" name="instrumentos" value="<?php if(set_value('instrumentos')) echo (set_value('instrumentos'));else if(form_error('instrumentos')){echo " ";}else{ echo $i_menor['instrumentos'];};?>" id="instrumentos" class="form-control" placeholder="instrumentos utlilizados ">
        <?php echo form_error('instrumentos');?>
        <br>  
</div>
</div> 
      <div class="panel panel-primary">
    <center> <div class="panel-heading">5. RESULTADOS DE LA VALORACIÓN</div></center> 
    <div class="panel-body">
 <label for="resul"></label>
        <input  type="text" name="resul" value="<?php if(set_value('resul')) echo (set_value('resul'));else if(form_error('resul')){echo " ";}else{ echo $i_menor['resul'];};?>" id="resul" class="form-control" placeholder="Descripción de resultados ">
        <?php echo form_error('resul');?>
        <br>  
</div>
</div>
      <div class="panel panel-primary">
    <center> <div class="panel-heading">6. IMPRESIÓN DIAGNOSTICA </div></center> 
    <div class="panel-body">
 <label for="impresion"></label>
        <input  type="text" name="impresion" value="<?php if(set_value('impresion')) echo (set_value('impresion'));else if(form_error('impresion')){echo " ";}else{ echo $i_menor['impresion'];};?>" id="impresion" class="form-control" placeholder="Descripción de impresión ">
        <?php echo form_error('impresion');?>
        <br>  
</div>
</div>
      <div class="panel panel-primary">
    <center> <div class="panel-heading">7. RECOMENDACIONES </div></center> 
    <div class="panel-body">
 <label for="recomen"></label>
        <input  type="text" name="recomen" value="<?php if(set_value('recomen')) echo (set_value('recomen'));else if(form_error('recomen')){echo " ";}else{ echo $i_menor['recomen'];};?>" id="recomen" class="form-control" placeholder="Descripción de recomendaciones ">
        <?php echo form_error('recomen');?>
        <br>  
</div>
</div>
<br>

<div class="panel panel-primary">
    <center> <div class="panel-heading">8. FECHA DEL INFORME </div></center> 
    <center>
    <div class="panel-body">
    <label for="fecha"></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_im" value="<?php if(set_value('fecha_im')) echo (set_value('fecha_im'));else if(form_error('fecha_im')){echo " ";}else{ echo $i_menor['fecha_im'];};?>" id="fecha_im" class="form-control" placeholder="Fecha del informe"       
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
     <?php echo form_error('fecha_im');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>
        </div>
    </center>
</div>

<center>
<button type="submit" class="btn btn-success" name="formulario">Guardar</button>
</center>
  </div>
  </div>
</div>
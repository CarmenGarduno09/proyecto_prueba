<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_ninos">Expedientes niños</a></li>
      <li class="active">Valoración Psicológica</li>
    </ol>

       <center> <h1 class="page-header">VALORACIÓN PSICOLÓGICA DE FAMILIARES</h1> </center>

<div class="panel panel-primary">
      <div class="panel-heading">Datos del niño ingresado</div>
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
                <label>Nombre del menor: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
                <label>Género: </label>  <?php echo $expediente['genero_nino']?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
             
                <label>Fecha de ingreso: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
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
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/editar_val_fam/'.$familia['id_infamiliar'],$atributos);
        //var_dump($privilegio);
       ?>
        <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
         <?php echo form_error('id_expediente');?>

         <input type="hidden" name="id_infamiliar" value="<?php echo $familia['id_infamiliar']; ?>">
         <?php echo form_error('id_infamiliar');?>


      <div class="panel panel-primary"><!--CUADRO 1-->
      <div class="panel-heading">
        <div class="row">
        <div class="col-md-11">
                Identificación
            </div>
            <div class="col-md-1" id="botonA" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntasA()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>
                
            </div>
        </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntasA">
 <label for="nombre_cp">Nombre de la persona entrevistada:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombre_cp" value="<?php if(set_value('nombre_cp')) echo (set_value('nombre_cp'));else if(form_error('nombre_cp')){echo " ";}else{ echo $familia['nombre_cp'];};?>" id="nombre_cp" class="form-control" placeholder="Nombre Completo ">
        <?php echo form_error('nombre_cp');?>
        <br>

        <label for="edad_e">Edad:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="edad_e" value="<?php if(set_value('edad_e')) echo (set_value('edad_e'));else if(form_error('edad_e')){echo " ";}else{ echo $familia['edad_e'];};?>" id="edad_e" class="form-control" placeholder="Edad del entrevistado ">
        <?php echo form_error('edad_e');?>
        <br>
        <label for="sexo">Género:<span class="asterisco">*</span></label>
          <div class="radio">
            <label><input type="radio" name="sexo" value="M" <?php if($familia['sexo']=='M') echo "checked";?> id="sexo">Masculino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="sexo" value="F" <?php if($familia['sexo']=='F') echo "checked";?> id="sexo">Femenino</label>
        </div>
      <?php echo form_error('sexo'); ?>
        <br>

        <label for="Parentesco">Parentesco con el niño(a):<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="parent_m" value="Padre/Madre" <?php if($familia['parent_m']=='Padre/Madre') echo "checked"; ?> id="parent_m"> Padre/Madre</label>
       </div>
       <div class="radio"><label><input type="radio" name="parent_m" value="Hermano/Hermana" <?php if($familia['parent_m']=='Hermano/Hermana') echo "checked"; ?> id="parent_m"> Hermano/Hermana</label>
       </div>
       <div class="radio"><label><input type="radio" name="parent_m" value="Padrino/Madrina" <?php if($familia['parent_m']=='Padrino/Madrina') echo "checked"; ?> id="parent_m"> Padrino/Madrina</label>
       </div>
        <div class="radio"><label><input type="radio" name="parent_m" value="Tio(a)" <?php if($familia['parent_m']=='Tio(a)') echo "checked"; ?> id="parent_m">Tio(a)</label>
       </div>
        <div class="radio"><label><input type="radio" name="parent_m" value="Primo(a)" <?php if($familia['parent_m']=='Primo(a)') echo "checked"; ?> id="parent_m">Primo(a) </label>
       </div>
        <div class="radio"><label><input type="radio" name="parent_m" value="Otro" <?php if($familia['parent_m']=='Otro') echo "checked"; ?> id="parent_m"> Otro</label>
       </div>
       <br>

         <label for="Escolaridad">Escolaridad:<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="escolaridad" value="Ninguno" <?php if($familia['escolaridad']=='Ninguno') echo "checked"; ?> id="escolaridad"> Ninguno</label>
       </div>
       <div class="radio"><label><input type="radio" name="escolaridad" value="Primaria" <?php if($familia['escolaridad']=='Primeria') echo "checked"; ?> id="escolaridad"> Primaria</label>
       </div>
        <div class="radio"><label><input type="radio" name="escolaridad" value="Secundaria" <?php if($familia['escolaridad']=='Secundaria') echo "checked"; ?> id="escolaridad">Secundaría</label>
       </div>
        <div class="radio"><label><input type="radio" name="escolaridad" value="Preparatoria" <?php if($familia['escolaridad']=='Preparatoria') echo "checked"; ?> id="escolaridad">Preparatoría </label>
       </div>
        <div class="radio"><label><input type="radio" name="escolaridad" value="Universidad" <?php if($familia['escolaridad']=='Universidad') echo "checked"; ?> id="escolaridad"> Universidad</label>
       </div>
       <br>

        <label for="Estadoc">Estado civil:<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="ecivil" value="Soltero" <?php if($familia['ecivil']=='Soltero') echo "checked"; ?> id="ecivil"> Soltero</label>
       </div>
       <div class="radio"><label><input type="radio" name="ecivil" value="Casado" <?php if($familia['ecivil']=='Casado') echo "checked"; ?> id="ecivil"> Casado</label>
       </div>
        <div class="radio"><label><input type="radio" name="ecivil" value="Union" <?php if($familia['ecivil']=='Union') echo "checked"; ?> id="ecivil">Unión libre</label>
       </div>
        <div class="radio"><label><input type="radio" name="ecivil" value="Divorciado" <?php if($familia['ecivil']=='Divorciado') echo "checked"; ?> id="ecivil">Divorciado </label>
       </div>
        <div class="radio"><label><input type="radio" name="ecivil" value="Otro" <?php if($familia['ecivil']=='Otro') echo "checked"; ?> id="ecivil"> Otro</label>
       </div>      
       <br>
        <label for="n_hijos">No. Hijos:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="n_hijos" value="<?php if(set_value('n_hijos')) echo (set_value('n_hijos'));else if(form_error('n_hijos')){echo " ";}else{ echo $familia['n_hijos'];};?>" id="n_hijos" class="form-control" placeholder="cuantos hijos tiene">
        <?php echo form_error('n_hijos');?>
        <br>
         <label for="ocupacione">Ocupación:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ocupacione" value="<?php if(set_value('ocupacione')) echo (set_value('ocupacione'));else if(form_error('ocupacione')){echo " ";}else{ echo $familia['ocupacione'];};?>" id="ocupacione" class="form-control" placeholder="Ocupación del entrevistado ">
        <?php echo form_error('ocupacione');?>
        <br>
<label>Fecha del estudio: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fechae" value="<?php if(set_value('fechae')) echo (set_value('fechae'));else if(form_error('fechae')){echo " ";}else{ echo $familia['fechae'];};?>" id="fechae"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fechae');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>

    <label for="direccione">Dirección:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="direccione" value="<?php if(set_value('direccione'))  echo (set_value('direccione'));else if(form_error('direccione')){echo " ";}else{ echo $familia['direccione'];};?>" id="direccione" class="form-control" placeholder="Dirección del entrevistado ">
        <?php echo form_error('direccione');?>
        <br>
<label for="tele">Teléfono:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tele" value="<?php if(set_value('tele'))  echo (set_value('tele'));else if(form_error('tele')){echo " ";}else{ echo $familia['tele'];};?>" id="tele" class="form-control" placeholder="Teléfono del entrevistado ">
        <?php echo form_error('tele');?>
        <br>
</div>
</div><!--CIERRA 1-->

         <div class="panel panel-primary"><!--CUADRO 2-->
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-11">      
            Antecedentes
            </div>
            <div class="col-md-1" id="botonB" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntasB()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>
                
            </div>
        </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntasB">
<label for="ant">Antecedentes:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ant" value="<?php if(set_value('ant')) echo (set_value('ant'));else if(form_error('ant')){echo " ";}else{ echo $familia['ant'];};?>" id="ant" class="form-control" placeholder="Antecedentes del entrevistado ">
        <?php echo form_error('ant');?>
        <br>
        </div>
        </div><!--CUADRO 2-->

         <div class="panel panel-primary"><!--CUADRO 3-->
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-11">      
        Instrumentos clinicos utilizados para la valoración
            </div>
            <div class="col-md-1" id="botonC" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntasC()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>
                
            </div>
        </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntasC">
<label for="insc">Instrumentos clinicos:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="insc" value="<?php if(set_value('insc'))echo (set_value('insc'));else if(form_error('insc')){echo " ";}else{ echo $familia['insc'];} ;?>" id="insc" class="form-control" placeholder="Descripción ">
        <?php echo form_error('insc');?>
        <br>
        </div>
        </div><!--CUADRO 3-->
 <div class="panel panel-primary"><!--CUADRO 4-->
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-11">      
        Conclusiones
            </div>
            <div class="col-md-1" id="botonD" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntasD()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>
                
            </div>
        </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntasD">
<label for="conclu">Conlusiones:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="conclu" value="<?php if(set_value('conclu'))echo (set_value('conclu'));else if(form_error('conclu')){echo " ";}else{ echo $familia['conclu'];}  ;?>" id="conclu" class="form-control" placeholder="Descripción ">
        <?php echo form_error('conclu');?>
        <br>
        </div>
        </div><!--CUADRO 4-->
         <div class="panel panel-primary"><!--CUADRO 5-->
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-11">      
        Recomendaciones
            </div>
            <div class="col-md-1" id="botonE" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntasE()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>
                
            </div>
        </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntasE"> 
        <label for="rec">Recomendaciones:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="rec" value="<?php if(set_value('rec'))echo (set_value('rec'));else if(form_error('rec')){echo " ";}else{ echo $familia['rec'];} ;?>" id="rec" class="form-control" placeholder="Descripción ">
        <?php echo form_error('rec');?>
        <br>


        </div> 
        </div><!--CUADRO 5-->
<br>
<center>
<button type="submit" class="btn btn-success" name="formulario">Guardar</button>
</center>
  </div>
  </div>
</div>
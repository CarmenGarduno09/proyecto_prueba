 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/compa_valoracion">NNA con Valoraciones Psicológicas</a></li>
      <li class="active">Valoración Psicológica de Familiares</li>
    </ol>

       <center> <h1 class="page-header">VALORACIÓN PSICOLÓGICA DE FAMILIARES</h1> </center>

<div class="panel panel-primary">
      <div class="panel-heading">Datos del NNA ingresado</div>
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
                <label>Género: </label>  <?php echo $expediente['genero_nino']?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
             
                <label>Fecha de ingreso: </label> <?php $f_expe = $expediente['fecha_ingreso'];
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
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/informe_familiar/'.$expediente['id_expediente'],$atributos);
        //var_dump($privilegio);
       ?>
 <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>


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
        <input  type="text" name="nombre_cp" value="<?php echo set_value('nombre_cp');?>" id="nombre_cp" class="form-control" placeholder="Nombre Completo ">
        <?php echo form_error('nombre_cp');?>
        <br>

        <label for="edad_e">Edad:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="edad_e" value="<?php echo set_value('edad_e');?>" id="edad_e" class="form-control" placeholder="Edad del entrevistado ">
        <?php echo form_error('edad_e');?>
        <br>
        <label for="sexo">Género:<span class="asterisco">*</span></label>
          <div class="radio">
            <label><input type="radio" name="sexo" value="M" <?php if(set_value('sexo')=='m') echo "checked";?>>Masculino</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="sexo" value="F" <?php if(set_value('sexo')=='f') echo "checked";?>>Femenino</label>
        </div>
      <?php echo form_error('sexo'); ?>
        <br>

        <label for="Parentesco">Parentesco con el NNA:<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="parent_m" value="Padre/Madre" <?php if(set_value('parent_m')=='Padre/Madre') echo "checked"; ?> id="parent_m"> Padre/Madre</label>
       </div>
       <div class="radio"><label><input type="radio" name="parent_m" value="Hermano/Hermana" <?php if(set_value('parent_m')=='Hermano/Hermana') echo "checked"; ?> id="parent_m"> Hermano/Hermana</label>
       </div>
       <div class="radio"><label><input type="radio" name="parent_m" value="Padrino/Madrina" <?php if(set_value('parent_m')=='Padrino/Madrina') echo "checked"; ?> id="parent_m"> Padrino/Madrina</label>
       </div>
        <div class="radio"><label><input type="radio" name="parent_m" value="Tio(a)" <?php if(set_value('parent_m')=='Tio(a)') echo "checked"; ?> id="parent_m">Tio(a)</label>
       </div>
        <div class="radio"><label><input type="radio" name="parent_m" value="Primo(a)" <?php if(set_value('parent_m')=='Primo(a)') echo "checked"; ?> id="parent_m">Primo(a) </label>
       </div>
        <div class="radio"><label><input type="radio" name="parent_m" value="Otro" <?php if(set_value('parent_m')=='Otro') echo "checked"; ?> id="parent_m"> Otro</label>
       </div>
       <br>

         <label for="Escolaridad">Escolaridad:<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="escolaridad" value="Ninguno" <?php if(set_value('escolaridad')=='Ninguno') echo "checked"; ?> id="escolaridad"> Ninguno</label>
       </div>
       <div class="radio"><label><input type="radio" name="escolaridad" value="Primaria" <?php if(set_value('escolaridad')=='Primeria') echo "checked"; ?> id="escolaridad"> Primaria</label>
       </div>
        <div class="radio"><label><input type="radio" name="escolaridad" value="Secundaria" <?php if(set_value('escolaridad')=='Secundaria') echo "checked"; ?> id="escolaridad">Secundaría</label>
       </div>
        <div class="radio"><label><input type="radio" name="escolaridad" value="Preparatoria" <?php if(set_value('escolaridad')=='Preparatoria') echo "checked"; ?> id="escolaridad">Preparatoría </label>
       </div>
        <div class="radio"><label><input type="radio" name="escolaridad" value="Universidad" <?php if(set_value('escolaridad')=='Universidad') echo "checked"; ?> id="escolaridad"> Universidad</label>
       </div>
       <br>

        <label for="Estadoc">Estado civil:<span style="color: red" class="asterisco">*</span></label>
        <br>
        <div class="radio">
         <label><input type="radio" name="ecivil" value="Soltero" <?php if(set_value('ecivil')=='Soltero') echo "checked"; ?> id="ecivil"> Soltero</label>
       </div>
       <div class="radio"><label><input type="radio" name="ecivil" value="Casado" <?php if(set_value('ecivil')=='Casado') echo "checked"; ?> id="ecivil"> Casado</label>
       </div>
        <div class="radio"><label><input type="radio" name="ecivil" value="Union" <?php if(set_value('ecivil')=='Union') echo "checked"; ?> id="ecivil">Unión libre</label>
       </div>
        <div class="radio"><label><input type="radio" name="ecivil" value="Divorciado" <?php if(set_value('ecivil')=='Divorciado') echo "checked"; ?> id="ecivil">Divorciado </label>
       </div>
        <div class="radio"><label><input type="radio" name="ecivil" value="Otro" <?php if(set_value('ecivil')=='Otro') echo "checked"; ?> id="ecivil"> Otro</label>
       </div>      
       <br>
        <label for="n_hijos">No. Hijos:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="n_hijos" value="<?php echo set_value('n_hijos');?>" id="n_hijos" class="form-control" placeholder="cuantos hijos tiene">
        <?php echo form_error('n_hijos');?>
        <br>
         <label for="ocupacione">Ocupación:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ocupacione" value="<?php echo set_value('ocupacione');?>" id="ocupacione" class="form-control" placeholder="Ocupación del entrevistado ">
        <?php echo form_error('ocupacione');?>
        <br>
<label>Fecha del estudio: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fechae"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fechae');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
        <br>

    <label for="direccione">Dirección:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="direccione" value="<?php echo set_value('direccione');?>" id="direccione" class="form-control" placeholder="Dirección del entrevistado ">
        <?php echo form_error('direccione');?>
        <br>
<label for="tele">Teléfono:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tele" value="<?php echo set_value('tele');?>" id="tele" class="form-control" placeholder="Teléfono del entrevistado ">
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
        <input  type="text" name="ant" value="<?php echo set_value('ant');?>" id="ant" class="form-control" placeholder="Antecedentes del entrevistado ">
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
        <input  type="text" name="insc" value="<?php echo set_value('insc');?>" id="insc" class="form-control" placeholder="Descripción ">
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
        <input  type="text" name="conclu" value="<?php echo set_value('conclu');?>" id="conclu" class="form-control" placeholder="Descripción ">
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
        <input  type="text" name="rec" value="<?php echo set_value('rec');?>" id="rec" class="form-control" placeholder="Descripción ">
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
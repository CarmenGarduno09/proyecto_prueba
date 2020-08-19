<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/ninos_tra_soc">NNA Con Valoraciones</a></li>
      <li class="active">Edición de la Visita domiciliaria</li>
    </ol>

       <center> <h1 class="page-header">EDICIÓN DE REPORTE DE ESTUDIO SOCIOECONÓMICO Y VISITA DOMICILIARÍA</h1> </center>

<div class="panel panel-primary">
      <div class="panel-heading">Datos del niño ingresado</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/visita_domiciliaria/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='300' height='315'></center></td>
              <!--<td><img src="<?=base_url();?>/uploadt/<?=$dif->foto_nino;?>" width='60' height='60'></td>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>Nombre del niño: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
              <label>Fecha de nacimiento: </label> <?php $fecha_n=$expediente['fecha_nnino'];
                //var_dump($fecha_n);
                $dia = substr($fecha_n,8,2);
                $mes = substr($fecha_n,5,2);
                $anio = substr($fecha_n,0,4);
                $fecha_en = $dia."/".$mes."/".$anio;
                echo $fecha_en;
                //var_dump($fecha_n);
                ?><br/>
                <label>Edad: </label> 
				<?php 
                 $nace =  $expediente['fecha_nnino'];
                 $fecha_actual = date("Y/m/d");
                 $edad =  $fecha_actual - $nace;
                 if($edad > 100) echo "0"; 
                 else echo $edad;
                ?>
				<br/>
                <label>Género: </label>  
                 <?php if(($expediente['genero_nino'])=="F"){
                  ?>
                  <span>Femenino</span>
                <?php
                }
                else{
                  ?>
                  <span>Masculino</span>
                  <?php 
                }?> <br/>
                <label>Lugar de nacimiento: </label>  <?php echo $expediente['lugar_nnino']?> <br>
                <label>Municipio de origen:  </label>  <?php echo $expediente['municipio_origen']?><br>
                <label>Fecha de ingreso: </label>  <?php $f_expe = $expediente['fecha_ingreso'];
                //var_dump($f_expe);
                $dia = substr($f_expe,8,2);
                $mes = substr($f_expe,5,2);
                $anio = substr($f_expe,0,4);
                $fecha_e = $dia."/".$mes."/".$anio;
                echo $fecha_e;
                //var_dump($fecha);
                ?>  <br/>
                  <label>Hora de ingreso: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>Motivos de ingreso: </label> <?php echo $expediente['motivos_ingreso']?><br/>
                  <label>Observaciones del ingreso </label> <?php echo $expediente['observaciones_ingreso']?>
              </div>
            </div>
          </div>
      </form>
       </div> 
        </div>



     <?php
        //echo validation_errors();
        $atributos = array('class'=>'form-horizontal');
        echo form_open('proyecto/editar_tra_soc/'.$valoracion_social['id_visitad'],$atributos);
        //var_dump($privilegio);
       ?>
    <input type="hidden" name="expediente" value="<?php echo $expediente['id_expediente']; ?>">
      <?php echo form_error('id_expediente');?>

      <input type="hidden" name="id_visitad" value="<?php echo $valoracion_social['id_visitad']; ?>">
      <?php echo form_error('id_visitad');?>

      <div class="panel panel-primary"><!--Cuadro 1-->
      <div class="panel-heading">
      <div class="row">
        <div class="col-md-11">
                Información de la Entrevista
            </div>
            <div class="col-md-1" id="boton1" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntas1()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>
                
            </div>
        </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas1">

<label>Fecha de entrevista: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_e" value="<?php if(set_value('fecha_e')) echo (set_value('fecha_e'));else if(form_error('fecha_e')){echo " ";}else{ echo $valoracion_social['fecha_e'];};?>" id="fecha_e"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fecha_e');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>
<br>
    <label for="nombre_r">Realizado por:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombre_r" value="<?php if(set_value('nombre_r')) echo (set_value('nombre_r'));else if(form_error('nombre_r')){echo " ";}else{ echo $valoracion_social['nombre_r'];};?>" id="nombre_r" class="form-control" placeholder="Nombre Completo ">
        <?php echo form_error('nombre_r');?>
        </div> 
        </div><!--Cuadro 1-->

<div class="panel panel-primary"><!--Cuadro 2-->
        <div class="panel-heading">
              <div class="row">
                  <div class="col-md-11">
                  Antesedentes
                  </div>
                  <div class="col-md-1" id="boton2" style="padding-top:0px;">
                      <center>
                          <a href="javascript:void(0)" onclick="preguntas2()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                      </center>
                      
                  </div>
              </div>
            </div>
    <div class="panel-body" style="display:none;" id="preguntas2">
        <label for="antec_caso">Antecedentes del caso <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="antec_caso" value="<?php if(set_value('antec_caso')) echo (set_value('antec_caso'));else if(form_error('antec_caso')){echo " ";}else{ echo $valoracion_social['antec_caso'];};?>" id="antec_caso" class="form-control" placeholder="Descripción">
        <?php echo form_error('antec_caso');?>
<br>
</div> 
</div><!--Cierra 2-->

<div class="panel panel-primary"><!--Cuadro 3-->
      <div class="panel-heading">
      <div class="row">
          <div class="col-md-11">
          Metodología
          </div>
          <div class="col-md-1" id="boton3" style="padding-top: 0px;">
              <center>
                  <a href="javascript:void(0)" onclick="preguntas3()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                  
              </center>
              
          </div>
      </div>
    </div>
    <div class="panel-body" style="display:none;" id="preguntas3">
    <label for="metod">Metodología: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="metod" value="<?php if(set_value('metod')) echo (set_value('metod'));else if(form_error('metod')){echo " ";}else{ echo $valoracion_social['metod'];};?>" id="metod" class="form-control" placeholder="Descripción">
        <?php echo form_error('metod');?>
<br>

</div> 
</div><!--Cierra 3-->

<div class="panel panel-primary"><!--Cuadro 4-->
      <div class="panel-heading">
      <div class="row">
          <div class="col-md-11">
          Información del entrevistado
          </div>
          <div class="col-md-1" id="boton4" style="padding-top: 0px;">
              <center>
                  <a href="javascript:void(0)" onclick="preguntas4()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                  
              </center>
              
          </div>
      </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas4">
    <label for="nombre_e">Nombre del entrevistado:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nombre_e" value="<?php if(set_value('nombre_e')) echo (set_value('nombre_e'));else if(form_error('nombre_e')){echo " ";}else{ echo $valoracion_social['nombre_e'];};?>" id="nombre_e" class="form-control" placeholder="Nombre Completo ">
        <?php echo form_error('nombre_e');?>
<br>

    <label for="domicilio">Domicilio <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="domicilio" value="<?php if(set_value('domicilio')) echo (set_value('domicilio'));else if(form_error('domicilio')){echo " ";}else{ echo $valoracion_social['domicilio'];};?>" id="domicilio" class="form-control" placeholder="Domicilio">
        <?php echo form_error('domicilio');?>

    <br>

    <label for="pariente">Parentesco:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="pariente" value="<?php if(set_value('pariente'))  echo (set_value('pariente'));else if(form_error('pariente')){echo " ";}else{ echo $valoracion_social['pariente'];};?>" id="pariente" class="form-control" placeholder="Parentesco">
        <?php echo form_error('pariente');?>
<br>

    <label for="edad">Edad:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="edad" value="<?php if(set_value('edad'))echo (set_value('edad'));else if(form_error('edad')){echo " ";}else{ echo $valoracion_social['edad'];} ;?>" id="edad" class="form-control" placeholder="Edad">
        <?php echo form_error('edad');?>
<br>
    <label>Fecha de nacimiento: <span style="color: red" class="asterisco">*</span></label>
        <div class=input-group>  
        <div class=input-group-addon icon-ca><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
        <input type="date" name="fecha_n" value="<?php if(set_value('fecha_n')) echo (set_value('fecha_n'));else if(form_error('fecha_n')){echo " ";}else{ echo $valoracion_social['fecha_n'];};?>" id="fecha_n"
    step="1"
    min="1900-01-01"      
    max="2100-12-31" class="btn btn-default" style="color: gray;"
    placeholder="año-mes-dia" >
  <?php echo form_error('fecha_n');?>
        <span class="add-on"><i class="icon-calendar" id="cal"></i></span>
        </div>

<br>

   

    <label for="lugar_n">Lugar de nacimiento:<span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="lugar_n" value="<?php if(set_value('lugar_n'))echo (set_value('lugar_n'));else if(form_error('lugar_n')){echo " ";}else{ echo $valoracion_social['lugar_n'];}  ;?>" id="lugar_n" class="form-control" placeholder="lugar de nacimiento">
        <?php echo form_error('lugar_n');?>
<br>
 <label for="estado_c">Estado civíl: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="estado_c" value="<?php if(set_value('estado_c'))echo (set_value('estado_c'));else if(form_error('estado_c')){echo " ";}else{ echo $valoracion_social['estado_c'];}  ;?>" id="estado_c" class="form-control" placeholder="Estado civil">
        <?php echo form_error('estado_c');?>
<br>
 <label for="escol">Escolaridad: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="escol" value="<?php if(set_value('escol'))echo (set_value('escol'));else if(form_error('escol')){echo " ";}else{ echo $valoracion_social['escol'];}  ;?>" id="escol" class="form-control" placeholder="Descripción de escolaridad">
        <?php echo form_error('escol');?>
<br>

 <label for="religion">Religión: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="religion" value="<?php if(set_value('religion'))echo (set_value('religion'));else if(form_error('religion')){echo " ";}else{ echo $valoracion_social['religion'];}  ;?>" id="religion" class="form-control" placeholder="Religión que predica">
        <?php echo form_error('religion');?>
<br>

 <label for="ocupacion">Ocupación: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ocupacion" value="<?php if(set_value('ocupacion'))echo (set_value('ocupacion'));else if(form_error('ocupacion')){echo " ";}else{ echo $valoracion_social['ocupacion'];}  ;?>" id="ocupacion" class="form-control" placeholder="Ocupación">
        <?php echo form_error('ocupacion');?>
<br>

 <label for="p_enfer">Enfermedad: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="p_enfer" value="<?php if(set_value('p_enfer'))echo (set_value('p_enfer'));else if(form_error('p_enfer')){echo " ";}else{ echo $valoracion_social['p_enfer'];}  ;?>" id="p_enfer" class="form-control" placeholder="Padece de alguna enfermedad">
        <?php echo form_error('p_enfer');?>
<br>

 <label for="antec_penal">Antecedentes penales: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="antec_penal" value="<?php if(set_value('antec_penal'))echo (set_value('antec_penal'));else if(form_error('antec_penal')){echo " ";}else{ echo $valoracion_social['antec_penal'];}  ;?>" id="antec_penal" class="form-control" placeholder="Antecedentes">
        <?php echo form_error('antec_penal');?>
<br>

 <label for="adiccion">Adicciones: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="adiccion" value="<?php if(set_value('adiccion'))echo (set_value('adiccion'));else if(form_error('adiccion')){echo " ";}else{ echo $valoracion_social['adiccion'];}  ;?>" id="adiccion" class="form-control" placeholder="Descripción de la adicción">
        <?php echo form_error('adiccion');?>
<br>

        </div> 
        </div><!--Cierra 4-->



    <div class="panel panel-primary"><!--Cuadro 5-->
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-11">
          Desarrollo de la entrevista
          </div>
          <div class="col-md-1" id="boton5" style="padding-top: 0px;">
              <center>
                  <a href="javascript:void(0)" onclick="preguntas5()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                  
              </center>
              
          </div>
      </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas5">
        <label for="hechos">Con relación a los hechos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="hechos" value="<?php if(set_value('hechos'))echo (set_value('hechos'));else if(form_error('hechos')){echo " ";}else{ echo $valoracion_social['hechos'];};?>" id="hechos" class="form-control" placeholder="Descripción">
        <?php echo form_error('hechos');?>

<br>
  <label for="nuc_p">Núcleo primario del entrevistado(a): <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nuc_p" value="<?php if(set_value('nuc_p'))echo (set_value('nuc_p'));else if(form_error('nuc_p')){echo " ";}else{ echo $valoracion_social['nuc_p'];} ;?>" id="nuc_p" class="form-control" placeholder="Descripción">
        <?php echo form_error('nuc_p');?>
<br>
  <label for="dinamica_p">Dinámica familiar del núcleo primario del entrevistado(a): <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="dinamica_p" value="<?php if(set_value('dinamica_p')) echo (set_value('dinamica_p'));else if(form_error('dinamica_p')){echo " ";}else{ echo $valoracion_social['dinamica_p'];};?>" id="dinamica_p" class="form-control" placeholder="Descripción">
        <?php echo form_error('dinamica_p');?>
        <br>
  <label for="nuc_s">Núcleo secundario del entrevistado(a): <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nuc_s" value="<?php if(set_value('nuc_s'))echo (set_value('nuc_s'));else if(form_error('nuc_s')){echo " ";}else{ echo $valoracion_social['nuc_s'];} ;?>" id="nuc_s" class="form-control" placeholder="Descripción">
        <?php echo form_error('nuc_s');?>
        <br>
  <label for="dinamica_s">Dinámica familiar del núcleo secundario del entrevistado(a): <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="dinamica_s" value="<?php if(set_value('dinamica_s')) echo (set_value('dinamica_s'));else if(form_error('dinamica_s')){echo " ";}else{ echo $valoracion_social['dinamica_s'];};?>" id="dinamica_s" class="form-control" placeholder="Descripción">
        <?php echo form_error('dinamica_s');?>
        <br>
</div> 
</div><!--Cierra 5-->


<div class="panel panel-primary"><!--Cuadro 6-->
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-11">
          Situación económica
          </div>
          <div class="col-md-1" id="boton6" style="padding-top: 0px;">
              <center>
                  <a href="javascript:void(0)" onclick="preguntas6()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                  
              </center>
              
          </div>
      </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas6">

        <label for="situacion_e">Situación: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="situacion_e" value="<?php if(set_value('situacion_e')) echo (set_value('situacion_e'));else if(form_error('situacion_e')){echo " ";}else{ echo $valoracion_social['situacion_e'];};?>" id="situacion_e" class="form-control" placeholder="Descripción">
        <?php echo form_error('situacion_e');?>

<br>
 <h4> Datos económicos:</h4>
    <h5> Manifiesta sus egresos de la siguiente manera</h5>
    <br>
  <label for="agua">Gatos en agua: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="agua" value="<?php if(set_value('agua'))echo (set_value('agua'));else if(form_error('agua')){echo " ";}else{ echo $valoracion_social['agua'];} ;?>" id="agua" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('agua');?>
<br>
  <label for="luz">Gastos de luz: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="luz" value="<?php if(set_value('luz'))echo (set_value('luz'));else if(form_error('luz')){echo " ";}else{ echo $valoracion_social['luz'];} ;?>" id="luz" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('luz');?>
        <br>
  <label for="alimentos">Gastos de alimentos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="alimentos" value="<?php if(set_value('alimentos')) echo (set_value('alimentos'));else if(form_error('alimentos')){echo " ";}else{ echo $valoracion_social['alimentos'];};?>" id="alimentos" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('alimentos');?>
        <br>
 <label for="transporte">Gastos de transporte: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="transporte" value="<?php if(set_value('transporte')) echo (set_value('transporte'));else if(form_error('transporte')){echo " ";}else{ echo $valoracion_social['transporte'];};?>" id="transporte" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('transporte');?>
        <br>
        <label for="tel">Gastos de teléfono: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tel" value="<?php if(set_value('tel'))echo (set_value('tel'));else if(form_error('tel')){echo " ";}else{ echo $valoracion_social['tel'];} ;?>" id="tel" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('tel');?>
        <br>
           <label for="g_medicos">Gastos de médicos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="g_medicos" value="<?php if(set_value('g_medicos'))echo (set_value('g_medicos'));else if(form_error('g_medicos')){echo " ";}else{ echo $valoracion_social['g_medicos'];};?>" id="g_medicos" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('g_medicos');?>
        <br>
        <label for="tot_i">Total de ingresos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tot_i" value="<?php if(set_value('tot_i'))echo (set_value('tot_i'));else if(form_error('tot_i')){echo " ";}else{ echo $valoracion_social['tot_i'];} ;?>" id="tot_i" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('tot_i');?>
        <br>
         <label for="tot_e">Total de egresos: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="tot_e" value="<?php if(set_value('tot_e'))echo (set_value('tot_e'));else if(form_error('tot_e')){echo " ";}else{ echo $valoracion_social['tot_e'];} ;?>" id="tot_e" class="form-control" placeholder="Cantidad $">
        <?php echo form_error('tot_e');?>
        <br>
         <label for="bienes_i">Bienes inmuebles: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="bienes_i" value="<?php if(set_value('bienes_i'))echo (set_value('bienes_i'));else if(form_error('bienes_i')){echo " ";}else{ echo $valoracion_social['bienes_i'];} ;?>" id="bienes_i" class="form-control" placeholder="Descripción">
        <?php echo form_error('bienes_i');?>
        <br>
         <label for="nivel_s">Nivel socioeconómico: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="nivel_s" value="<?php if(set_value('nivel_s'))echo (set_value('nivel_s'));else if(form_error('nivel_s')){echo " ";}else{ echo $valoracion_social['nivel_s'];} ;?>" id="nivel_s" class="form-control" placeholder="Descripción">
        <?php echo form_error('nivel_s');?>
        <br>
         <label for="clase">Clase: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="clase" value="<?php if(set_value('clase'))echo (set_value('clase'));else if(form_error('clase')){echo " ";}else{ echo $valoracion_social['clase'];} ;?>" id="clase" class="form-control" placeholder="Descripción">
        <?php echo form_error('clase');?>
        <br>
</div> 
</div><!--Cierra 6--> 


<div class="panel panel-primary"><!--Cuadro 7-->
      <div class="panel-heading">
            <div class="row">
              <div class="col-md-11">
                Condiciones de la vivienda
              </div>
              <div class="col-md-1" id="boton7" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntas7()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>       
               </div>
            </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas7">
     
    <label for="materiales">Materiales de construcción y distribución: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="materiales" value="<?php if(set_value('materiales'))echo (set_value('materiales'));else if(form_error('materiales')){echo " ";}else{ echo $valoracion_social['materiales'];}  ;?>" id="materiales" class="form-control" placeholder="Descripción">
        <?php echo form_error('materiales');?>
<br>
    <label for="ubicacion">Ubicación: <span style="color: red" class="asterisco">*</span></label>
        <input  type="text" name="ubicacion" value="<?php if(set_value('ubicacion'))echo (set_value('ubicacion'));else if(form_error('ubicacion')){echo " ";}else{ echo $valoracion_social['ubicacion'];}  ;?>" id="ubicacion" class="form-control" placeholder="Descripción">
        <?php echo form_error('ubicacion');?>
<br>

</div> 
</div><!--Cierra 7--> 

<div class="panel panel-primary"> <!--Cuadro 8-->
      <div class="panel-heading">
          <div class="row">
              <div class="col-md-11">
              Diagnostico Social
              </div>
              <div class="col-md-1" id="boton8" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntas8()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>       
               </div>
          </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas8">
    <label for="diagnostico">Diagnostico: <span style="color: red" class="asterisco">*</span></label>
        <input type="text" name="diagnostico" value="<?php if(set_value('diagnostico'))echo (set_value('diagnostico'));else if(form_error('diagnostico')){echo " ";}else{ echo $valoracion_social['diagnostico'];}  ;?>" id="diagnostico" class="form-control" placeholder="Descripción">
        <?php echo form_error('diagnostico');?>
<br> 
</div> 
</div> <!--Cierra 8-->

<div class="panel panel-primary"> <!--Cuadro 9-->
      <div class="panel-heading">
          <div class="row">
              <div class="col-md-11">
              Observaciones Generales De la Visita
              </div>
              <div class="col-md-1" id="boton9" style="padding-top: 0px;">
                <center>
                    <a href="javascript:void(0)" onclick="preguntas9()"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                </center>       
               </div>
          </div>
      </div>
    <div class="panel-body" style="display:none;" id="preguntas9">
    <label for="observacion_ge">Observaciones de la Visita: <span style="color: red" class="asterisco">*</span></label>
        <input type="text" name="observacion_ge" value="<?php if(set_value('observacion_ge')) echo (set_value('observacion_ge'));else if(form_error('observacion_ge')){echo " ";}else{ echo $valoracion_social['observacion_ge'];}  ;?>" id="observacion_ge" class="form-control" placeholder="Observaciones Generales de la Visita">
        <?php echo form_error('observacion_ge');?>
<br> 
</div> 
</div> <!--Cierra 9-->

  <center>
  <button type="submit" class="btn btn-success" name="formulario">Guardar</button>
  </center>

  </div>
  </div>
</div>

</body>
</html>
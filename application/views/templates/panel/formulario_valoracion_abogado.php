




    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <br><br>
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
        <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_abogado">Expedientes niños</a></li>
        <li class="active">Valoración</li>
        </ol>

        
<div class="panel panel-primary">
  <div class="panel-heading">Información del niño</div>
    <div class="panel-body">
       <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/valoracion_abogado/<?php echo $expediente['id_expediente'];?>">
      
         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='300' height='315'></center></td>
                <!--<?php echo $expediente['foto_nino']?>-->
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <label>Nombre del niño: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
              <label>No. Expediente: </label>  <?php echo $expediente['no_expediente'] ?> <br>
              <label>No. Carpeta: </label> <?php echo $expediente['no_carpeta']?><br>
              <label>Fecha de nacimiento: </label>  <?php echo $expediente['fecha_nnino']?><br/>
                <label>Edad: </label>  <br/>
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
                <label>Fecha de ingreso: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
                  <label>Hora de ingreso: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>Centro asistencial: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>Motivos de ingreso: </label> <?php echo $expediente['motivos_ingreso']?><br/>
                  <label>Observaciones del ingreso </label> <?php echo $expediente['observaciones_ingreso']?>
              </div>
            </div>
          </div>
    
      </div>
  </div>


        <center> <h2 class="page-header">VALORACIÓN DE INGRESO DEL MENOR</h2> </center>
    <!-- <?php 
        $atributos= array('class'=>'form-horizontal');
       echo form_open('proyecto/valoracion_abogado/'.$expediente['id_expediente'],$atributos);?>-->
       <!--<form method="POST" action="<?php echo base_url()?>index.php/proyecto/valoracion_abogado" name="formulario">-->
       <div class="alert alert-warning" role="alert"><center>Todos los campos con asterisco son obligatorios</center></div>
       <!-- Cuestionario 0 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a la identidad<span style="color: red" class="asterisco"> *</span> </h3> 
                        <?php echo form_error('registro');?><?php echo form_error('acta');?></div>
                    <div class="col-md-1" id="boton" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas">
                
                    <label>Está registrado en el registro Civil<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="registro" value="SI" <?php if(set_value('registro')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="registro" value="NO" <?php if(set_value('registro')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="registro" value="NA" <?php if(set_value('registro')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('registro');?>
                    <label> Cuenta con acta de nacimiento<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="acta" value="SI" <?php if(set_value('acta')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="acta" value="NO" <?php if(set_value('acta')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="acta" value="NA" <?php if(set_value('acta')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('acta');?>
               

            </div>

        </div>
     
        
       
         <!-- Fin de Cuestionario 0 -->

         <!-- Cuestionario 1 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a vivir en familia<span style="color: red" class="asterisco"> *</span> </h3> <?php echo form_error('vive');?><?php echo form_error('convivencia');?><?php echo form_error('opinion');?><?php echo form_error('separado');?>
                        </div>
                       <div class="col-md-1" id="boton1" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas1()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas1">
                
                    <label>La NNA vive con su familia, salvo que la autoridad competente haya determinado lo contrario<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="vive" value="SI" <?php if(set_value('vive')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="vive" value="NO" <?php if(set_value('vive')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="vive" value="NA" <?php if(set_value('vive')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('vive');?>
                    <label>En caso de estar separado de su familia, la NNA ¿tiene permitida la convivencia o mantenimiento de relaciones personales con sus familiares? Salvo que la autoridad competente haya determinado lo contrario<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="convivencia" value="SI" <?php if(set_value('convivencia')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="convivencia" value="NO" <?php if(set_value('convivencia')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="convivencia" value="NA" <?php if(set_value('convivencia')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('convivencia');?>
                    <label>Es considerada la opinión de la NNA en la familia<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="opinion" value="SI" <?php if(set_value('opinion')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="opinion" value="NO" <?php if(set_value('opinion')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="opinion" value="NA" <?php if(set_value('opinion')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('opinion');?>
                    <label>¿La NNA ha sido separado de algún miembro de su familia?<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="separado" value="SI" <?php if(set_value('separado')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="separado" value="NO" <?php if(set_value('separado')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="separado" value="NA" <?php if(set_value('separado')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('separado');?>
                    
             

            </div>

        </div>
        
         <!-- Fin de Cuestionario 1 -->

         <!-- Cuestionario 2 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>A la igualdad sustantiva<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('derechos');?></div>
                    <div class="col-md-1" id="boton2" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas2()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas2">
                
                    <label>Tienen derecho al acceso al mismo trato y oportunidades para el reconocimiento, goce o ejercicio de sus derechos<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="derechos" value="SI" <?php if(set_value('derechos')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="derechos" value="NO" <?php if(set_value('derechos')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="derechos" value="NA" <?php if(set_value('derechos')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('derechos');?>
            </div>
        </div>
        
         <!-- Fin de Cuestionario 2 -->

         
         <!-- Cuestionario 3 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a no ser discriminado<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('discriminacion');?></div>
                    <div class="col-md-1" id="boton3" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas3()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas3">
              
                    <label>No ha sufrido discriminación en razón de su origen étnico, nacional o social, idioma o lengua, edad, género, preferencia sexual, estado civil, religión, opinión, condición económica, circunstancias de nacimiento, discapacidad o estado de salud o cualquiera otra condición atribuible a ellos mismos o a su madre, padre, tutor o persona que los tenga bajo guarda y custodia, o a otros miembros de la familia<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="discriminacion" value="SI" <?php if(set_value('discriminacion')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="discriminacion" value="NO" <?php if(set_value('discriminacion')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="discriminacion" value="NA" <?php if(set_value('discriminacion')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('discriminacion');?>
               
            </div>
        </div>
        
         <!-- Fin de Cuestionario 3 -->

          <!-- Cuestionario 4 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a vivir en condiciones de bienestar y a un sano desarrollo integral<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('vivienda');?> <?php echo form_error('proteccion');?></div>
                    <div class="col-md-1" id="boton4" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas4()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas4">
               
                    <label>La NNA vive en una vivienda adecuada para su desarrollo<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="vivienda" value="SI" <?php if(set_value('vivienda')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="vivienda" value="NO" <?php if(set_value('vivienda')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="vivienda" value="NA" <?php if(set_value('vivienda')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('vivienda');?>
                    <label>La NNA cuenta con la protección y supervisión adecuadas por parte de un adulto responsable de su cuidado<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="proteccion" value="SI"  <?php if(set_value('proteccion')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="proteccion" value="NO" <?php if(set_value('proteccion')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="proteccion" value="NA" <?php if(set_value('proteccion')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('proteccion');?>
           
            </div>
        </div>
         <!-- Fin de Cuestionario 4 -->

         <!-- Cuestionario 5 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a una vida libre de violencia y a la integridad personal<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('violencia');?></div>
                    <div class="col-md-1" id="boton5" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas5()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas5">
            
                    <label>La NNA no ha presenciado o no ha sido víctima de violencia física, verbal o psicológica, abandono, descuido, abuso físico o sexual<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="violencia" value="SI" <?php if(set_value('violencia')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="violencia" value="NO" <?php if(set_value('violencia')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="violencia" value="NA" <?php if(set_value('violencia')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('violencia');?>
    
              
            </div>
        </div>
         <!-- Fin de Cuestionario 5 -->

         <!-- Cuestionario 6 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a la protección de la salud y a la seguridad social<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('servicio_med');?><?php echo form_error('nutricion');?><?php echo form_error('revision');?><?php echo form_error('cartilla');?><?php echo form_error('tratamiento');?></div>
                    <div class="col-md-1" id="boton6" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas6()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a> 
                        </center>   
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas6">
               
                    <label>La NNA cuenta con servicio médico de seguro social o seguro popular<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="servicio_med" value="SI" <?php if(set_value('servicio_med')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="servicio_med" value="NO" <?php if(set_value('servicio_med')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="servicio_med" value="NA" <?php if(set_value('servicio_med')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('servicio_med');?>
                    <label>La NNA muestra una nutrición adecuada (Notoriamente visibles)<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="nutricion" value="SI" <?php if(set_value('nutricion')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="nutricion" value="NO" <?php if(set_value('nutricion')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="nutricion" value="NA" <?php if(set_value('nutricion')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('nutricion');?>
                    <label>La NNA asiste a revisión médica periódica<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="revision" value="SI" <?php if(set_value('revision')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="revision" value="NO" <?php if(set_value('revision')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="revision" value="NA" <?php if(set_value('revision')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('revision');?>
                    <label>La NNA cuenta con cartilla de vacunación<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="cartilla" value="SI" <?php if(set_value('cartilla')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="cartilla" value="NO" <?php if(set_value('cartilla')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="cartilla" value="NA" <?php if(set_value('cartilla')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('cartilla');?>
                    <label>En caso de que se le haya detectado alguna enfermedad a la NNA ¿Se le brinda el tratamiento adecuado?<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="tratamiento" value="SI" <?php if(set_value('tratamiento')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="tratamiento" value="NO" <?php if(set_value('tratamiento')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="tratamiento" value="NA" <?php if(set_value('tratamiento')=='NA') echo "checked";?>> NA <br>
                    <br><?php echo form_error('tratamiento');?>

    
            </div>
        </div>
         <!-- Fin de Cuestionario 6 -->

         <!-- Cuestionario 7 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">  
                    <div class="col-md-11">
                        <h3>Derecho a la inclusión de NNA con discapacidad<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('atencion_dis');?></div>
                    <div class="col-md-1" id="boton7" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas7()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas7">
            
                    <label>En caso de vivir con alguna discapacidad y requerir atención médica y/o aditamento la NNA ¿La recibe?<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="atencion_dis" value="SI" <?php if(set_value('atencion_dis')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="atencion_dis" value="NO" <?php if(set_value('atencion_dis')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="atencion_dis" value="NA" <?php if(set_value('atencion_dis')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('atencion_dis');?>
    
           
            </div>
        </div>
         <!-- Fin de Cuestionario 7 -->

         
         <!-- Cuestionario 8 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">  
                    <div class="col-md-11">
                        <h3>Derecho a la educación<span style="color: red" class="asterisco"> *</span>  </h3>
                        <?php echo form_error('escuela');?>  <?php echo form_error('asiste_reg');?><?php echo form_error('duerme');?> <?php echo form_error('act_espar');?>
                        </div>
                    <div class="col-md-1" id="boton8" style="padding-top: 20px;">
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas8()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas8">
           
                    <label>La NNA se encuentra inscrito en la escuela<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="escuela" value="SI" <?php if(set_value('escuela')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="escuela" value="NO" <?php if(set_value('escuela')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="escuela" value="NA" <?php if(set_value('escuela')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('escuela');?>
                    <label>La NNA asiste regularmente a la escuela<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="asiste_reg" value="SI" <?php if(set_value('asiste_reg')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="asiste_reg" value="NO" <?php if(set_value('asiste_reg')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="asiste_reg" value="NA" <?php if(set_value('asiste_reg')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('asiste_reg');?>
                    <label>La NNA duerme las horas adecuadas a su edad<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="duerme" value="SI" <?php if(set_value('duerme')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="duerme" value="NO" <?php if(set_value('duerme')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="duerme" value="NA" <?php if(set_value('duerme')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('duerme');?>
                    <label>La NNA realiza actividades de esparcimiento como actividades culturales, deportivas o juego regularmente conforme a su edad<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="act_espar" value="SI" <?php if(set_value('act_espar')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="act_espar" value="NO" <?php if(set_value('act_espar')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="act_espar" value="NA" <?php if(set_value('act_espar')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('act_espar');?>
    
            </div>
        </div>
         <!-- Fin de Cuestionario 8 -->

         <!-- Cuestionario 9 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derecho a la intimidad<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('intimidad');?> <?php echo form_error('privacidad');?>
                        </div>
                    <div class="col-md-1" id="boton9" style="padding-top: 20px;">  
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas9()"><button type="button" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div>
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas9">
            
                    <label>La NNA goza de su derecho a la intimidad<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="intimidad" value="SI" <?php if(set_value('intimidad')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="intimidad" value="NO" <?php if(set_value('intimidad')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="intimidad" value="NA"  <?php if(set_value('intimidad')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('intimidad');?>
                    <label>¿El derecho de la NNA a que no se divulguen datos personales sin su consentimiento ha sido salvaguardado?<span style="color: red" class="asterisco"> *</span></label><br>
                    <input type="radio" name="privacidad" value="SI" <?php if(set_value('privacidad')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="privacidad" value="NO" <?php if(set_value('privacidad')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="privacidad" value="NA" <?php if(set_value('privacidad')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('privacidad');?>
    
            </div>
        </div>
         <!-- Fin de Cuestionario 9-->
         
         
         <!-- Cuestionario 10 -->
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-11">
                        <h3>Derechos de niñas, niños y adolescentes migrantes<span style="color: red" class="asterisco"> *</span> </h3>
                        <?php echo form_error('migrante');?>
                        </div>
                    <div class="col-md-1" id="boton10" style="padding-top: 20px;">  
                        <center>
                            <a href="javascript:void(0)" onclick="preguntas10()"><button type="button" class="btn btn-primary btn-xs "><span class="glyphicon glyphicon-chevron-down"></span></button></a>
                            
                        </center>
                        
                    </div> 
                </div>
            </div>
            <div class="panel-body" style="display:none;" id="preguntas10">
              
                    <label>¿La NNA migrante goza de sus derechos vinculados con la migración?
(No está siendo discriminado por su origen, nacionalidad o estatus migratorio, ni está en régimen de privación de libertad por dicho estatus, cuenta con asistencia consular en caso de ser extranjero y goza de los demás derechos) 
<span style="color: red" class="asterisco"> *</span> </label><br>
                    <input type="radio" name="migrante" value="SI" <?php if(set_value('migrante')=='SI') echo "checked";?>> SI <br>
                    <input type="radio" name="migrante" value="NO" <?php if(set_value('migrante')=='NO') echo "checked";?>> NO <br>
                    <input type="radio" name="migrante" value="NA" <?php if(set_value('migrante')=='NA') echo "checked";?>> NA <br>
                    <br> <?php echo form_error('migrante');?>
                   
    
            </div>
        </div>
       
         <!-- Fin de Cuestionario 10-->
         <?php $fecha_time = date("Y/m/d/");?>
         <input type="hidden" name="fecha" value="<?php echo $fecha_time ?>">
         <input type="hidden" name="fk_expediente" value="<?php echo $expediente['id_expediente']?>">
         <center>
         <button class="btn btn-primary" name="formulario" type="submit">Guardar</button>
         </center>
     </form>
        
</div>


</body>
</html>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <br><br>
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
        <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_abogado">Expedientes niños</a></li>
        <li class="active">Valoración</li>
        </ol>
<center><h1>Agregar nuevo plan y acuerdo </h1></center>
        
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


        
         <div>
         <label>Fecha de valoración: </label> <br>
                  <input type="date" name="fecha" value=""  id="fecha_gral" class="form-control" id="fecha_val">
         </div>
         
         <br><br>
  
       
     
         <?php $fecha_time = date("Y/m/d/");?>
         <input type="hidden" name="fk_expediente" value="<?php echo $expediente['id_expediente']?>">
        
         
         <!-- Plan de restituciony recomendaciones-->
         <!--Botón que habilita plan de restitucion -->
         <input type="hidden" id="id_expediente_niñon" name="id_expediente_niño" value="<?php echo $expediente['id_expediente']?>">
         <center>
         <a class='btn btn-info btn-sm' href='javascript:void(0)' onclick="NuevoPlan('<?php echo $expediente['id_expediente']?>')"><i class='fas fa-pencil-alt'></i>Agregar plan de restitución</a>
         <br><br>
         </center>
         
           <!-- Panel plan de restitucion  -->
        <div class="panel panel-default" style="display:none;" id="plan_grln">
            <!-- Default panel contents -->
            <div class="panel-body">
            <div id="plan_usuarion"><!--En este div se insertará la lista de las planes ya guardadas-->
                
                </div>
             
                  <div id="hidden_usrn"><!--En este div va el id_del niño generado en un hidden-->
                    
                  </div>
                 <textarea placeholder="Escriba un campo del plan de restitución, y de clic en guardar."  name="plan_txn" rows="3" cols="70" id="plan_txn" class="form-control" > </textarea><br>
                  <button class="btn btn-primary" type="button" id="guardar_plann">Guardar campo</button>
          
            </div>
        </div>
         
          <!--Botón que habilita Panel  recomendaciones -->
        <center>
        <a class='btn btn-info btn-sm' href='javascript:void(0)' onclick="NuevaRecomendacion('<?php echo $expediente['id_expediente']?>')"><i class='fas fa-pencil-alt'></i>Agregar acuerdo de integrarias</a>
         <br>
         </center>
          <!-- Panel  recomendaciones -->
        <div class="panel panel-default" style="display:none;" id="recomendaciones_grln">
            <!-- Default panel contents -->
            <div class="panel-body">
            <div id="recomendaciones_usuarion"><!--En este div se insertará la lista de las recomendaciones ya guardadas-->
                
                </div>
                
                  <div id="hidden_usrn"><!--En este div va el id_del niño generado en un hidden-->
                    
                  </div>
                  <textarea  placeholder="Escriba la recomendación y de clic en guardar." name="recomendacion_tx" rows="3" cols="70" id="recomendacion_txn" class="form-control" > </textarea><br>
                  <button class="btn btn-primary" type="button" id="guardar_recomendacionn">Guardar acuerdo</button>
             
            </div>
        </div>

        <br>
         <!--Botón que habilita quien autoriza -->
         <center>
        <a class='btn btn-info btn-sm' href='javascript:void(0)' onclick="NuevoAutoriza('<?php echo $expediente['id_expediente']?>')"> <i class='fas fa-pencil-alt'></i>Autorizado por:</a>
         <br>
         </center>
          <!-- Panel  recomendaciones -->
        <div class="panel panel-default" style="display:none;" id="autoriza_grln">
            <!-- Default panel contents -->
            <div class="panel-body">
            <div id="autoriza_usuarion"><!--En este div se insertará la lista de las personas ya guardadas-->
                
                </div>
                
                  <div id="hidden_usrn"><!--En este div va el id_del niño generado en un hidden-->
                    
                  </div>
                  <textarea  placeholder="Escriba el nombre de una persona  y de clic en guardar." name="autoriza_tx" rows="3" cols="70" id="autoriza_txn" class="form-control" > </textarea><br>
                  <br>
                  <button class="btn btn-primary" type="button" id="guardar_autorizan">Guardar persona. </button>
             
            </div>
        </div>
 
         


        
     </form>
        
</div>

</body>
</html>
<script>

</script>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
        <li><a href="<?php echo base_url();?>index.php/proyecto/juridica_valoracion_ver">Expedientes NNA</a></li>
        <li class="active">Valoración</li>
        </ol>
<center><h1>AGREGAR NUEVO PLAN Y ACUERDO </h1></center>
        
<div class="panel panel-primary">
  <div class="panel-heading">Información del NNA</div>
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
                <label>Nombre del NNA: </label> <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?><br>
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
                <label>Fecha de ingreso: </label>   <?php $f_expe = $expediente['fecha_ingreso'];
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
                  <label>Observaciones del ingreso </label> <?php echo $expediente['observaciones_ingreso']?>
              </div>
            </div>
          </div>
    
      </div>
  </div>


        
         <div>
        
                  <input type="hidden" name="fecha" value="<?php echo $fecha_time=date("Y/m/d/");?>"  id="fecha_gral" class="form-control" id="fecha_val">
    
         </div>
         
         <br><br>
  
         <input type="hidden" id="usr_id" name="fk_expediente" value="<?php echo $expediente['id_expediente']?>">
        
         
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
        <a class='btn btn-info btn-sm' href='javascript:void(0)' onclick="AutorizaNew('<?php echo $expediente['id_expediente']?>')"> <i class='fas fa-pencil-alt'></i>Autorizado por:</a>
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
                  <textarea  placeholder="Escriba el nombre de una persona  y de clic en guardar." name="autoriza_txn" rows="3" cols="70" id="autoriza_txn" class="form-control" > </textarea><br>
                  <br>
                  <button class="btn btn-primary" type="button" id="guardarAut">Guardar persona. </button>
             
            </div>
        </div>
 
         


        
     </form>
     <br>
     <td><center><a class="btn btn-primary" href="<?php echo base_url('index.php/proyecto/juridica_valoracion_ver').'/';?>" role="button"><span class="glyphicon glyphicon-log-in"></span>  </span>Regresar. </a></td>
       
</div>

</body>
</html>
<script>

</script>
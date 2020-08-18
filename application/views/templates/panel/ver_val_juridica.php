
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
  <div class="noImprimir">
  <ol class="breadcrumb" >
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/juridica_valoracion_ver">Lista de Expedientes</a></li>
      <li class="active">Expediente particular</li>
    </ol> 
    </div>
 

      <form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/revision_expediente/<?php echo $expediente['id_expediente']; ?>/<?php echo $expediente['id_ingreso']; ?>">
        <div class="col-md-12"  id="seleccion" >
          <div class="well well-sm">
              <h1 align="center" ><?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></h1>
              <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
              <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
          </div>
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
                <label>FECHA DE NACIMIENTO: </label>  <?php echo $expediente['fecha_nnino']?><br/>
                <label>EDAD: </label>  <td>
                <?php 
                $id_ingreso = $this->Modelo_proyecto->devuelve_id_ing($this->uri->segment(4));
                $fecha_naci = $this->Modelo_proyecto->ver_edad($id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo "0"; 
                else echo $edad;
                ?>
                </td><br/>
                <label>GÉNERO: </label> <?php echo $expediente['genero_nino']?> 
                  <br/>
                <label>LUGAR DE NACIMIENTO: </label>  <?php echo $expediente['lugar_nnino']?> <br>
                <label>MUNICIPIO DE ORIGEN:  </label>  <?php echo $expediente['municipio_origen']?><br>
                <label>FECHA DE INGRESO: </label>  <?php echo $expediente['fecha_ingreso']?> <br/>
                  <label>HORA INGRESO: </label>  <?php echo $expediente['hora_ingreso']?> <br/>
                  <label>CENTRO ASISTENCIAL: </label>  <?php echo $expediente['nombre_centro']?> <br/>
                  <label>ESTATUS: </label>  <?php echo $expediente['nombre_incidencia']?> <br/>
                  <label>ESTADO PROCESAL: </label>  <?php echo $expediente['nombre_estado']?> <br/>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            
         
          <div class="col-md-12">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>VALORACIONES</b></h4><br>
                  
                  <label>VALORACIÓN JURÍDICA </label><br/>
                  <p>   
                  <b>Derecho a la identidad</b><br>
                  Está registrado en el registro Civil:  <b><?php echo $valoracion_juridica['registro_civil']?></b> <br>
                  No. de acta:  <b><?php echo $valoracion_juridica['numero_acta']?></b> <br>
                  Lugar de registro:  <b><?php echo $valoracion_juridica['lugar_r']?></b> <br>
                  CURP:  <b><?php echo $valoracion_juridica['curp']?></b> <br><br>

                  <b>Derecho a vivir en familia</b><br>
                  Vive con su familia, salvo que la autoridad competente haya determinado lo contrario: <b><?php echo $valoracion_juridica['vive_familia']?></b><br>
                  En caso de estar separado de su familia,  ¿tiene permitida la convivencia o mantenimiento de relaciones personales con sus familiares? Salvo que la autoridad competente haya determinado lo contrario: <b><?php echo $valoracion_juridica['convivencia_fam'];?></b> <br>
                  Es considerada su opinión en la familia:<b><?php echo $valoracion_juridica['opinion']?></b> <br>
                  ¿Ha sido separado de algún miembro de su familia?: <b><?php echo $valoracion_juridica['separado_miembro']?></b> <br>
                  ¿Tiene familia extensa o ampliada ?: <b><?php echo $valoracion_juridica['fam_extensa']?></b> <br><br>
             

                   <b>Derecho a la igualdad sustantiva</b><br>
                   Tienen derecho al acceso al mismo trato y oportunidades para el reconocimiento, goce o ejercicio de sus derechos: <b><?php echo $valoracion_juridica['derecho']?></b> <br>
                  
                   <br><b>Derecho a no ser discriminado</b><br>
                   No ha sufrido discriminación: <b><?php echo $valoracion_juridica['discriminacion']?></b><br>

                   <b>Derecho a vivir en condiciones de bienestar y a un sano desarrollo integral</b><br>
                   Vive en una vivienda adecuada para su desarrollo: <b><?php echo $valoracion_juridica['vivienda']?></b> <br>
                   Cuenta con la protección y supervisión adecuadas por parte de un adulto responsable de su cuidado: <b><?php echo $valoracion_juridica['proteccion']?></b><br>
                  
                   <br><b>Derecho a una vida libre de violencia y a la integridad personal</b><br>
                   Ha presenciado o ha sido víctima de violencia física, verbal o psicológica: <b><?php echo $valoracion_juridica['violencia']?></b> <br>
                   
                   <br><b> Derecho a la protección de la salud y a la seguridad social: </b><br>
                   Cuenta con servicio médico de seguro social o seguro popular: <b><?php echo $valoracion_juridica['servicio_med']?></b><br>
                   Muestra una nutrición adecuada (Notoriamente visibles): <b><?php echo $valoracion_juridica['nutricion']?></b><br>
                   Asiste a revisión médica periódica:<b><?php echo $valoracion_juridica['revision_med']?></b> <br>
                   Cuenta con cartilla de vacunación: <b><?php echo $valoracion_juridica['cartilla']?></b><br>
                   En caso de que se le haya detectado alguna enfermedad, ¿Se le brinda el tratamiento adecuado?: <b><?php echo $valoracion_juridica['tratamiento_enf']?></b> <br>

                   <br><b> Derecho a la inclusión de NNA con discapacidad </b><br>
                   En caso de vivir con alguna discapacidad y requerir atención médica y/o aditamento la NNA ¿La recibe?: <b><?php echo $valoracion_juridica['atencion_discr']?></b> <br>

                   <br><b> Derecho a la educación  </b><br>
                   Se encuentra inscrito en la escuela: <b><?php echo $valoracion_juridica['inscrito_esc'];?></b><br>
                   Asiste regularmente a la escuela: <b><?php echo $valoracion_juridica['asiste_reg'];?></b><br>
                   Duerme las horas adecuadas a su edad:<b><?php echo $valoracion_juridica['duerme'];?></b> <br>
                   Realiza actividades de esparcimiento:<b><?php echo $valoracion_juridica['act_esparcimiento'];?></b> <br>

                   <br><b> Derecho a la intimidad </b><br>
                   Goza de su derecho a la intimidad: <b><?php echo $valoracion_juridica['intimidad']?></b> <br>
                   ¿El derecho a que no se divulguen datos personales sin su consentimiento ha sido salvaguardado?:<b><?php echo $valoracion_juridica['privacidad']?></b> <br>
        
                   <br><b> Acercamiento con familiares </b><br>
                   ¿Se ha realizado alguna acción? <b><?php echo $valoracion_juridica['accion']?></b> <br>
                   
                   <br><b> Derecho a la participación </b><br>
                   ¿Se ha considerado la opinión del NNA? <b><?php echo $valoracion_juridica['opinion_n']?></b> <br>
                   

                   
                  </p><br>
                  </div>
             </div>
         </div>

         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <h4 align="center"><b>Plan de restitución.</b></h4><br>
              <?php 
              foreach($plan as $p){
                echo "* ".$p->descripcion ; 

              ?>
              <br>
              <?php
              }
              ?>
               <br>
              </div>
             </div>
         </div>

         <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
              <h4 align="center"><b>Recomendaciones para el adulto.</b></h4><br>
              <?php 
              foreach($recomendacion as $r){
                echo "* ".$r->recomendacion ; 
                
              ?>
              <br>
              <?php
              }
              ?>
                  
                 
             <br>
              </div>
             </div>
         </div>
         
      </form>

    <div class="noImprimir" class="col-md-12">
    <center>
        <button  type="button" class="btn btn-primary"  onclick="window.print()">Imprimir expediente del menor</button>
    </center>
    </div>

  <!-- Div vacio para cragra la firma en css -->
  <div class="col-md-12">
    <center>
      <br>
      <br>
      <br>
      <br>
      <br>
      <span  class="firma"> </span>
    </center>
</div>




</div>

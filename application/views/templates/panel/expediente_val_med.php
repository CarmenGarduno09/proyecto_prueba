<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
  <div class="noImprimir">
   <ol class="breadcrumb" >
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li><a href="<?php echo base_url();?>index.php/proyecto/vista_expediente_nino">Lista de Expedientes</a></li>
      <li class="active">Expediente particular</li>
    </ol> 
  </div>
 

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
          <div class="col-md-6" id= "salto">
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
          
          <div class="col-md-12" id="salto">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>VALORACIONES</b></h4><br>
                    <label>VALORACIÓN MEDICA </label><br/>
                  <p>
                  Condición inicial: <?php if($valoracion_medi['condicion']){echo $valoracion_medi['condicion'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción inicial de salud: <?php if($valoracion_medi['des_ini']){echo $valoracion_medi['des_ini'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Peso: <?php if($valoracion_medi['peso']){echo $valoracion_medi['peso'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Talla: <?php if($valoracion_medi['talla']){echo $valoracion_medi['talla'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de cabeza: <?php if($valoracion_medi['cabeza']){echo $valoracion_medi['cabeza'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de ojos: <?php if($valoracion_medi['ojos']){echo $valoracion_medi['ojos'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de nariz: <?php if( $valoracion_medi['nariz']){echo $valoracion_medi['nariz'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de boca: <?php if($valoracion_medi['boca']){echo $valoracion_medi['boca'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de cuello: <?php if($valoracion_medi['cuello']){echo $valoracion_medi['cuello'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de torax: <?php if($valoracion_medi['torax']){echo $valoracion_medi['torax'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de abdomen: <?php if($valoracion_medi['abdomen']){echo $valoracion_medi['abdomen'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de genitales: <?php if($valoracion_medi['genitales']){echo $valoracion_medi['genitales'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de columna: <?php if($valoracion_medi['columna']){echo $valoracion_medi['columna'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de extremidades: <?php if($valoracion_medi['extremidades']){echo $valoracion_medi['extremidades'];}else{echo "La valoración no ha sido realizada";}?><br>
                  Descripción de tés: <?php if($valoracion_medi['tes']){echo $valoracion_medi['tes'];}else{echo "La valoración no ha sido realizada";}?><br>
                  </p>
                  



                 
              </div>
            </div>
         

        
       
      
      <center>
  <div class="noImprimir">
      <button  type="button " class="btn btn-success"  onclick="window.print()">Imprimir expediente del menor <span class="glyphicon glyphicon-print"></span></button>
  </div>

<!-- Div vacio para cragra la firma en css -->
<div>
   <br>
   <br>
   <br>
   <br>
   <br>
   <span  class="firma"> </span>
</div>


</center>
</div>
</div>
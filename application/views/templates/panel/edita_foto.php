<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
  <li><a href="<?php echo base_url();?>index.php/proyecto/expediente_trabajo_social">Expedientes NNA</a></li>
  <li class="active">Edición de fotografía</li>
  </ol>
</div>

<div class="col-md-12">

<div class="col-md-5">

</div>
<div class="col-md-4">

<center><h1 style="background-color: white" border="2" class="page-header">EDICIÓN DE FOTOGRAFÍA DEL NNA</h1></center>
            
            
            <div class="well well-sm">
              <div class="panel-body" >
              <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='165' height='180'></center></td>
              <h1 align="center" ><?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></h1>
              <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
              <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
              
              </div>
            </div>
           <center> <button class="btn btn-success" onclick="seleccionar_archivo()">Cambiar imagen <span class="glyphicon glyphicon-pencil"></span> </button>
           
           <?php
                    $atributos = array('class' => 'form-horizontal','enctype' => 'multipart/form-data','name'=>'form_imagen');
                    echo form_open('proyecto/actualiza_imagen/'.$expediente['id_expediente'].'/'.$expediente['id_ingreso'].'',$atributos);
                    ?>
                    <div id="form_imagen_up" style="display:none;">
                    	<h4 style="color:white;">Cargar selección</h4>
                    	<div class="input-group">
	                         <input type="file" name="imagen">
                            <br>
	                         <input class="btn btn-info" type="submit" value = "Cargar imagen" name="btn_img" class="btn btn-default">
	                         <?php echo form_error('imagen');?>
                    	</div>
                    </div>
                    
                  </form>
                  <br>
                  <br>
                  <br>

</div>

				
</div>



<script>
        function seleccionar_archivo(){
            $("#form_imagen_up").css("display","block");
        }
    </script>
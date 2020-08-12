<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header"><center>EVIDENCIAS DE LA VISITA DOMICILIARIA</h2>
          <br>
<a class="btn btn-info" href="<?php echo base_url();?>index.php/proyecto/ninos_tra_soc" role="button">Omitir Evidencias</a><br><br>
     <div class="panel panel-primary">
        <div class="panel-heading">Agregar Evidencia </div>
            <div class="panel-body">

            <?php
                    $atributos = array('class' => 'form-horizontal','enctype' => 'multipart/form-data','name'=>'form_imagen');
                    echo form_open('Proyecto/subir_foto/'.$informe_visitad['id_visitad'],$atributos);
             ?>

            <label>Imágen del domicilio:</label>
          	<div class="input-group">
	          <span class="input-group-addon">
	        	<i class="glyphicon glyphicon-picture"></i>
	          </span>
              <input type="file" class="form-control" name="nombre_archivo" required title="Imagen del domicilio" placeholder="Imagen del domicilio"/>
            </div>
            <br>
            <center>
            <div class="input-group">
              <button type="submit" class="btn btn-success" name="enviar"><i class="glyphicon glyphicon-plus"></i> Agregar Evidencia</button>
            </div>
            </center>
            </div><!--Cierra Panel - Body-->

    </div><!--Cierra Panel - Primary-->

<br>

<div class="panel panel-primary">
    <div class="panel-heading">Evidencias</div>
    <div class="panel-body">
                <div class="row">
                <!-- APERTURA -->
               
				<?php 
				 if($imagenes_visitad){
					$contador  = 0;
					$cierre = true;
					foreach ($imagenes_visitad as $i){
						if($contador==0){
							echo '<div class="row">';
							$cierre = true;
						}
          ?> 
                   <div class="col-md-4">
                   <div class="thumbnail">
                     <img src="<?php echo $this->Modelo_proyecto->valida_archivo($i->nombre_archivo); ?>" class="img-thumbnail">
                     <div class="caption">
                       <center>
                       <p><a href="<?php echo base_url('index.php/proyecto/elimina_archivo/'.$i->id_archivo.'/'.$informe_visitad['id_visitad']);?>" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span> Eliminar</a></p>
                      </center>
                       </div>
                   </div>
                  </div>    
				<?php 
				$contador ++;
				if($contador == 3){
					echo "</div>";
					$contador = 0;
					$cierre = false;
						}
					}
					if($cierre){
						echo "</div>";
					}
				 }
				?>
      </div>
       
			<!-- CIERRE -->  
    </br>
    <center><a class="btn btn-success" href="<?php echo base_url();?>index.php/proyecto/ninos_tra_soc" role="button"><i class="glyphicon glyphicon-ok"></i> Guardar Evidencias</a></center>  
  </br>
  </div>
 </div>

    </div>
</div>
</div>
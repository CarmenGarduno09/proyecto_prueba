<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
        <li><a href="<?php echo base_url();?>index.php/proyecto/juridica_valoracion_ver">NNA con valoración jurídica </a></li>
        <li class="active">Compara planes y acuerdos</li>
        </ol>

            <center><h1 style="background-color: white" border="2" class="page-header text-success">PLAN DE RESTITUCIÓN Y ACUERDO DE INTEGRARÍAS</h1></center>
            <br>
            <div class="col-md-4">
                        <div class="well well-sm">
                        <div class="panel-body" >
                        <td><center><img src="<?=base_url();?>/uploadt/<?=$expediente['foto_nino'];?>" width='165' height='180'></center></td>
                        <!--<td><img src="<?=base_url();?>/uploadt/<?=$dif->foto_nino;?>" width='60' height='60'></td>-->
                        </div>
                        </div>
            </div>
            <div class="col-md-8">
                <div class="well well-sm">
                    <h1 align="center" ><p>Nombre del NNA: <?php echo $expediente['nombres_nino'] ?> <?php echo $expediente['apellido_pnino'] ?> <?php echo $expediente['apellido_mnino'] ?></p></h1>
                    <h2 align="center" ><p>No. Expediente:  <?php echo $expediente['no_expediente'] ?> </p></h2>
                    <h3 align="center"><p>No. Carpeta:  <?php echo $expediente['no_carpeta']?></p></h3>
                </div>
            </div>

      <div class="col-md-12 well well-sm">
               <center>
                  <div class="col-md-4">
                  </div>
                <div class="col-md-4">
                            <br>
                            <br>
                           <label class="badge"> Seleccione un año para mostrar. </label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Seleccione un año</option>
                                    <?php $year = date("Y");
                                            for ($i=2015; $i<=$year; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                    ?>
                                </select>

                             <br>
                             <br>

                            <label class="badge"> Seleccione un mes para mostrar. </label>
                            <select name="meses" id="meses" onchange="obtener_informacion_mes(this)" class="form-control">
                                <option > Seleccione un mes </option>
                                <option value="1"> Enero </option>
                                <option value="2"> Febrero </option>
                                <option value="3"> Marzo </option>
                                <option value="4"> Abril </option>
                                <option value="5"> Mayo </option>
                                <option value="6"> Junio </option>
                                <option value="7"> Julio </option>
                                <option value="8"> Agosto </option>
                                <option value="9"> Septiembre </option>
                                <option value="10"> Octubre </option>
                                <option value="11"> Noviembre </option>
                                <option value="12"> Diciembre </option>
                            </select>
                        <input type="hidden" id="id_exp" name="id_exp" value="<?php echo $expediente['id_expediente'];?>"> 
                </div>
     </div>
    

     <br> <br><br>
<br> <br><br>
     <br> <br><br>
<br> <br><br>

<div class="col-md-12">
    <div class="col-md-4">
        <div class="well well-sm" > 
                <div class="panel-header"> <p align="center" class=" bg-success text-success">Plan de restitución </p> </div>
                <div class="panel-body" id="plan">
                </div>
            </div>
     </div>

     <div class="col-md-4">
        <div class="well well-sm" > 
                <div class="panel-header"> <p align="center" class=" bg-success text-success"> Acuerdo de integrarias </p> </div>
                <div class="panel-body" id="acuerdo">
                </div>
            </div>
     </div>

     <div class="col-md-4">
        <div class="well well-sm" > 
                <div class="panel-header"> <p align="center" class=" bg-success text-success">Personas que autorizan </p></div>
                <div class="panel-body" id="persona">
                </div>
            </div>
     </div>
 </div>

 <!-- Muestra la segunda comparación-->
 
<div class="col-md-12 well well-sm">
    <div class="col-md-4">
    </div>
    <div class="col-md-4" align="center">
    <label class="badge" >  Seleccione un mes para comparar. </label>
        <select name="meses" id="meses" onchange="obtener_informacion_mes2(this)" class="form-control">
               <option> Seleccione un mes </option>
               <option value="1"> Enero </option>
               <option value="2"> Febrero </option>
               <option value="3"> Marzo </option>
               <option value="4"> Abril </option>
               <option value="5"> Mayo </option>
               <option value="6"> Junio </option>
               <option value="7"> Julio </option>
               <option value="8"> Agosto </option>
               <option value="9"> Septiembre </option>
               <option value="10"> Octubre </option>
            v  <option value="11"> Noviembre </option>
               <option value="12"> Diciembre </option>
         </select>
    </div>
</div>
<br> <br><br>
     <br> <br><br>
<br> <br><br>
<div class="col-md-12">
    <div class="col-md-4">
        <div class="well well-sm" > 
                <div class="panel-header"> <p align="center" class=" bg-success text-success"> Plan de restitución </p> </div>
                <div class="panel-body" id="plan2">
                </div>
            </div>
     </div>

     <div class="col-md-4">
        <div class="well well-sm" > 
                <div class="panel-header"> <p align="center" class=" bg-success text-success"> Acuerdo de integrarias </p> </div>
                <div class="panel-body" id="acuerdo2">
                </div>
            </div>
     </div>

     <div class="col-md-4">
        <div class="well well-sm" > 
                <div class="panel-header"> <p align="center" class=" bg-success text-success"> Personas que autorizan </p></div>
                <div class="panel-body" id="persona2">
                </div>
            </div>
     </div>
 </div>



 <script>
  

     
 </script>
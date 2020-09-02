<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <ol class="breadcrumb">
  <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Registro de ingresos</li>
  </ol>
          <center><h1 style="background-color: white" border="2" class="page-header">"INGRESOS"</h1></center>
<br>

          <style>

        .round {
 background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 15px auto;
 padding: 5px;
 border: 1px solid #ccc;


 -moz-border-radius: 11px;
 -webkit-border-radius: 11px;
 border-radius: 11px;
 behavior: url(border-radius.htc);
    }
</style>

<html>

<head>
<TITLE>objetos redondeados</TITLE>

    <style>

        .round {
          background-color: #fff;
 width: auto;
 height: auto;
 margin: 0 auto 18px auto;
 padding: 7px;
 border: 2px solid #ccc;

 -moz-border-radius: 15px;
 -webkit-border-radius: 15px;
 border-radius: 15px;


 behavior: url(border-radius.htc);

    }


    .ph-center {
  height: 100px;
}
.ph-center::-webkit-input-placeholder {
  text-align: center;
}

    </style>

</head>

<body>

 <div id="formulario" >

    <table style="background-color:#F5F6CE;">

        <tr>
           
<div class="col-lg-6">
    <div class="input-group">
 </div>
</div>

        </tr>

<br>  


    </table>

 </div>

</body>

</html>

          <table class="table table-bordered" id="dataTables-example">
            
            <thead>
              <tr bgcolor="#FEF5E7" align="center">
                  <center>
                <th> <center>No. Expediente</th>
                <th> <center>No. Carpeta</th>
                <th> <center>Estado procesal</th>
                <th> <center>Nombre del niño</th>
                <!--<th> <center>Fecha nacimiento</th>-->
                <th> <center>Edad</th>
                <!--<th> <center>Género</th>-->
                <th> <center>Centro asistencial</th>
                <th> <center>Fecha de ingreso</th>
                <th> <center>Motivos de ingreso</th>
                <th> <center>Motivos de ingreso</th>
                <th> <center>Fecha de ingreso</th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php
              //die(var_dump($expedientes)); 
              foreach ($ingresos as $i){
              ?>
              <tr>
            <td><?php echo $i->no_expediente;?></td>
              <td><?php echo $i->no_carpeta;?></td>
                <td><?php echo $i->nombre_estado;?></td>
                <!--<td class="<?php echo $itiqueta;?>"><?php echo $this->Modelo_proyecto->ver_centro($i->id_centro);?></td>-->
                <td><?php echo $i->nombres_nino;?> <?php echo $i->apellido_pnino;?> <?php echo $i->apellido_mnino;?></td>
                <!--<td><?php echo $i->fecha_nnino;?></td>-->
                <td>
                <?php 
                $fecha_naci = $this->Modelo_proyecto->ver_edad($i->id_ingreso);
                $fecha_nacinino = $fecha_naci;
                $fecha_actual = date("Y/m/d/");
                $edad = $fecha_actual - $fecha_nacinino;
                if($edad > 100) echo $i->edadcal; 
                else echo $edad;
                ?>
                </td>
                <!--<td><?php echo $i->genero_nino;?></td>-->
                <td><?php echo $i->nombre_centro;?></td>
                <td><?php echo $i->fecha_ingreso;?></td>
                <td><?php echo $i->motivos_ingreso;?></td>
                <td><?php echo $i->delito;?></td>
                <td><?php echo $i->fecha_ingreso;?></td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>



   
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <ol class="breadcrumb">
 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Pensiones NNA</li>
  </ol>   
        <center><h1 class="page-header">REGISTRO GENERAL DE LAS PENSIONES</h1></center>
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
<form  class="form" method="post" action=""> 
 <input type="text" class="form-control" placeholder="Buscar beneficiado..." name="busqueda">
  
     <span class="input-group-btn">
       <button class=class="btn btn-ttc-circle" type="button"> <input type="image"  value="Guardar" src="<?php echo base_url();?>assets/imagenes/bucar2.png" height="27" width="27" /></button>
      </span>

 </form>
 </div>
</div>

        </tr>

    </table>

 </div>

</body>

</html>



<br>  
<br>

<br>
<div class="table-responsive"> 

          <table class="table table-bordered">
            
            <thead>
              <tr bgcolor="#F9E79F" align="center">
                  <center>
                <th><center>Cuaderno</center></th>
                <th><center>Beneficiado</center></th>
                <th><center>Nombre del familiar depositante</center></th>
                <th><center>Fecha</center></th>
                <th><center>Cantidad depositada</center></th>
                <th><center>Última cantidad retirada</center></th> 
                <th><center>Retirar</center></th> 
                <th><center>Monto final</center></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($pensiones as $us){
              ?>
              <tr bgcolor="#FEF5E7">
               <td><?php echo $us->cuaderno;?> </td>
               <td><?php echo $us->nombres_nino;?> <?php echo $us->apellido_pnino;?> <?php echo $us->apellido_mnino;?></td>
               <td><?php echo $us->nombre_f;?> <?php echo $us->apellido_pf;?> <?php echo $us->apellido_mf;?></td>
                <td><?php echo $us->fecha_pension;?></td>
                <td><center>$
                <?php 
                $monto = $this->Modelo_proyecto->ver_montop($us->id_pension);
                echo $monto;
                ?>
                </td>
                <td><center>$
                <?php 
                $retiro = $this->Modelo_proyecto->ver_retiro($us->id_pension);
                echo $retiro;
                ?>
                </td>
                <td><a class="btn btn-success" href="<?php echo base_url('index.php/proyecto/retiro_monto');?>/<?php echo $us->id_pension;?>/<?php echo $us->id_expediente;?>/<?php echo $us->id_familiar;?>" role="button"><span class="glyphicon glyphicon-usd"></span></a></td>
                <td><center>
                <?php 
                $montof = $this->Modelo_proyecto->ver_montof($us->id_pension);
                $retiro = $this->Modelo_proyecto->ver_retiro($us->id_pension);
                if($retiro>$montof)
                {
              
                  //$total = "insuficiente";

                  $total=$montof;?>
                  <div class="alert alert-danger" role="alert">
                    No puede retirar más de: <?php echo "$".$montof ?>
                  </div>
                <?php
                }else{

                  $total = $montof - $retiro;
                  

                }
                  $data = array(
                    'monto_final' => $total,
                  );
                   $this->Modelo_proyecto->actualiza_monto_final($data,$us->id_pension);
                   echo "$ ".$total;
                   
                ?>
               
                </td>
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>
</div>

        </div>
      </div>
        </div>
      </div>
      <a class="btn btn" style="background:" href="<?php echo base_url('index.php/proyecto/pagar');?>" role="button"><img width="30" height="30" src="<?php echo base_url();?>assets/imagenes/casa.png"></img></a>

    </div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
 <ol class="breadcrumb">
 <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
    <li class="active">Familiares NNA</li>
  </ol>
           <center><h1 style="background-color: white" border="2" class="page-header"> REGISTRO GENERAL DE FAMILIARES </h1></center>
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

</body>

</html>

          <table class="table table-bordered" id="dataTables-example">
            
            <thead>
              <tr bgcolor="#F9E79F" align="center">
                  <center>
                <th>Nombre del familiar</th>
                <th>Genéro</th>
                <th>Fecha de nacimiento</th>
                <th>Relacion</th>
                <th>Nombre del NNA</th>
                <th><center>Editar</center></th>
                </center>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach ($fam as $dif){
              ?>
              <tr bgcolor="#FEF5E7">
              <td><?php echo $dif->nombre_f;?> <?php echo $dif->apellido_pf;?> <?php echo $dif->apellido_mf;?></td>
                <td><?php echo $dif->genero_f;?></td>
                <td><?php echo $dif->fecha_naf;?></td>
                <td><?php echo $dif->relacion;?></td>
                <td><?php echo $dif->nombres_nino;?> <?php echo $dif->apellido_pnino;?> <?php echo $dif->apellido_mnino;?></td>
        <td><center><a class="btn btn-info"  href="<?php echo base_url('index.php/proyecto/edita_fam');?>/<?php echo $dif->id_familiar;?>" role="button"><span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-user"></span></a></center></td>
            
              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>



        </div>
      </div>
    </div>


   
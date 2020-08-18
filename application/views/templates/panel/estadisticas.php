<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="noImprimir">
  <ol class="breadcrumb" >
      <li><a href="<?php echo base_url();?>index.php/proyecto/panel">Principal</a></li>
      <li class="active">Estadísticas</li>
    </ol>
    </div> 
      <!--<form autocomplete="off" name="formulario" class="form" method="POST" action="<?php echo base_url()?>index.php/proyecto/revision_expediente/<?php echo $expediente['id_expediente']; ?>/<?php echo $expediente['id_ingreso']; ?>">-->
      <center><h1>Estadísticas</h1>
           <div class="col-md-6">
            <div class="well well-sm">

              <div class="panel-body" >
            
                 <h4 align="center"><b>GÉNERO</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>Femenino</th>
                            <th><center>Masculino</th>
                            <th><center>Total</th>
                          </tr>
                        </thead>
                      <tbody>
                  
                        <tr>
                        <td><center><?php $mujeres = $this->Modelo_proyecto->genero_femenino();
                         $mujeres_t=$mujeres['genero'];
                         echo $mujeres_t;?></td>
                        <td><center><?php $hombres = $this->Modelo_proyecto->genero_masculino();
                        $hombres_t=$hombres['genero'];
                        echo $hombres_t;?></td>
                        <td><center><?php $total = $mujeres_t + $hombres_t;
                        echo $total;?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  
                  </head>
                  <body>
                

                  <canvas id="myChart1" width="500" height="150"></canvas> 
                  <br>
                  <center>
                  <div class="noImprimir" id="salto">
                  <input  type="button" class="btn btn-primary" id="Buscar1" value="Graficar">
                  <a  href="<?php echo base_url('index.php/proyecto/grafica2');?>"><input type="button" class="btn btn-primary" value="Ver gráfica de barras" > </a>
                 </div>


                                  
                                  
                  <script>

                  var parammes = [];
                    var paramPor = [];

                  $("#Buscar1").click(function(){

                  //alert("Si entro");


                  $.post("<?php echo base_url();?>index.php/proyecto/get2",

                  function(data){
                    //alert(data);

                    var miObjeto= JSON.parse(data);
                        //alert(miObjeto);
                        var parammes = [];
                          var paramPor = [];

                    $.each(miObjeto, function(i,item){

                        parammes.push(item.genero_nino);
                        paramPor.push(item.id_expediente);

                    });

                    //alert(paramPor);

                  /////////////////////////////////////////////////////////////////////
                  //var paramMeses=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                  //var paramValores=[12, 19, 3, 5, 2, 3, 4, 1, 2, 3, 1, 20];
                  var ctx = $('#myChart1');
                  var densityData ={
           label: "Total de NNA por incidencia",
               // label:parammes,
                  fill: true,
                lineTension: 1000,
                backgroundColor: [
                  'rgba(210, 99, 132, 0.6)',
                  'rgba(0, 99, 132, 0.6)',
                  'rgba(30, 99, 132, 0.6)',
                  'rgba(60, 99, 132, 0.6)',
                  'rgba(90, 99, 132, 0.6)',
                  'rgba(120, 99, 132, 0.6)',
                  'rgba(150, 99, 132, 0.6)',
                  'rgba(180, 99, 132, 0.6)',
                  
                  'rgba(240, 99, 132, 0.6)'
                ],
                borderColor: "rgba(75,192,192,1)",
                    borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                  pointBorderWidth: 5,
                  pointHoverRadius: 2,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 3,
                  pointRadius: 1,
                pointHitRadius: 10,
                data:paramPor,// valores verticales
                  spanGaps: false,
          }

          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels:parammes,//valores horizontales
                datasets: [densityData],


            },
                    options: {
                     
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                   
                                }
                            }]
                        }
                    }
                  });
                  /////////////////////////////////////////////////////////////////////

                  });
                  });

                  /*
                  */
                  </script>

              </div>
            </div>
          </div>
        </div>

           <div class="col-md-6" id="salto">
            <div class="well well-sm">
              <div class="panel-body" >
                 <h4 align="center"><b>ESTADO PROCESAL</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>Estado procesal</th>
                            <th><center>Total</th>
                            
                          </tr>
                        </thead>
                      <tbody>
                      <tr>
                          <td>
                            <center><?php 
                            foreach($total_estadop as $tep){?>
                            <?php echo $tep->nombre_estado;?>
                              <br>
                            <?php
                            }
                            ?>
                            </td>
                            
                            <td><center>
                            <?php
                             $var=0;
                            foreach($total_estadop as $tep){ ?>
                            
                            <?php
                              
                              echo  $tep->id_expediente;
                              $var=$var+$tep->id_expediente;
                              
                              ?>
                              <br>
                            
                            <?php
                            }?>
                          </td>
                        </tr>
                         
                      </tbody>
                      <tr>
                        <th><center>Total acumulado</th>
                        <td> <center><?php  echo $var;?></td>
                      </tr>
                  </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
                  </head>
                  <body>
                  
                  <canvas id="myChart2" width="500" height="150"></canvas>
                  <br>
                  <div class="noImprimir">
                  <center>
                  <input type="button" id="Buscar2" class="btn btn-primary" value="Graficar">  
                  <a  href="<?php echo base_url('index.php/proyecto/grafica3');?>"> <input type="button" class="btn btn-primary" value="Ver gráfica de barras" href=""></a>
                 </center> 
                 </div>
              </div>
            </div>
          </div>
        </div>
         

              <script>

              var parammes = [];
                var paramPor = [];

              $("#Buscar2").click(function(){

              //alert("Si entro");


              $.post("<?php echo base_url();?>index.php/proyecto/get3",

              function(data){
                //alert(data);

                var miObjeto= JSON.parse(data);
                    //alert(miObjeto);
                    var parammes = [];
                      var paramPor = [];

                $.each(miObjeto, function(i,item){

                    parammes.push(item.nombre_estado);
                    paramPor.push(item.id_expediente);

                });

                //alert(paramPor);

              /////////////////////////////////////////////////////////////////////
              //var paramMeses=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
              //var paramValores=[12, 19, 3, 5, 2, 3, 4, 1, 2, 3, 1, 20];
              var ctx = $('#myChart2');
              var densityData ={
                label: "Total de NNA por incidencia",
               // label:parammes,
                  fill: true,
                lineTension: 1000,
                backgroundColor: [
                  'rgba(238, 238, 36, 1)', //amarillo
                  'rgba(249, 139, 91, 1)', //naranja
                  'rgba(35,173, 35, 1)', //verde limon
                  'rgb(255, 43, 21)', //rojo
                  'rgba(127, 63, 191, 1)', //morado
                   'rgb(255, 202, 106)',  //amarillo-naranja
                  'rgba(63, 91, 163, 1)',//Verde bajo
                  'rgba(36, 137, 238, 1)' //azul
                  
                  



                ],
                borderColor: "rgba(75,192,192,1)",
                    borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                  pointBorderWidth: 5,
                  pointHoverRadius: 2,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 3,
                  pointRadius: 1,
                pointHitRadius: 10,
                data:paramPor,// valores verticales
                  spanGaps: false,
          }

          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels:parammes,//valores horizontales
                datasets: [densityData],


            },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
              });
              /////////////////////////////////////////////////////////////////////

              });
              });

              /*
              */
              </script>
        <div>
        <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                 <h4 align="center"><b>ESTADO DEL NNA</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>Ingresos</th>
                            <th><center>Egresos</th>
                            <th><center>Fugas</th>
                            <th><center>Translados</th>
                            <th><center>Total</th>
                          </tr>
                        </thead>
                      <tbody>
                        <tr>
                        <td><center><?php $ingresos = $this->Modelo_proyecto->estadistica_ingresos();
                        $ingresos_t=$ingresos['id_expediente'];
                        //Válida si la variable viene vacia
                        if(empty($ingresos_t)){
                            echo 0;
                        }else{
                        echo $ingresos_t;}?></td>

                        <td><center><?php $egresos = $this->Modelo_proyecto->estadistica_egresos();
                        $egresos_t=$egresos['id_expediente'];
                        //Válida si la variable viene vacia
                        if(empty($egresos_t)){
                          echo 0;
                      }else{
                        echo $egresos_t;}?></td>

                        <td><center><?php $fugas = $this->Modelo_proyecto->estadistica_fugados();
                        $fugas_t=$fugas['id_expediente'];
                        //Válida si la variable viene vacia
                        if(empty($fugas_t)){
                          echo 0;
                      }else{
                        echo $fugas_t;}?></td>

                        <td><center><?php $translado = $this->Modelo_proyecto->estadistica_trasladados();
                        $traslado_t=$translado['id_expediente'];
                        //Válida si la variable viene vacia
                        if(empty($traslado_t)){
                          echo 0;
                      }else{
                        echo $traslado_t;}?></td>
                        <td><center><?php $total_i =$ingresos_t+ $egresos_t + $fugas_t+$traslado_t;
                        echo $total_i;?></td>
                     
                          </tr>
                      </tbody>
                    </table>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
                  </head>
                  <body>
                  
                  <canvas id="myChart3" width="500" height="150"></canvas>  
                  <br>
                  <div  class="noImprimir" >
                  <center>
                  <input type="button" id="Buscar3" class="btn btn-primary" value="Graficar"> 
                  <a  href="<?php echo base_url('index.php/proyecto/grafica');?>"><input type="button" class="btn btn-primary" value="Ver gráfica de barras" > </a>
                 </center> 
                 </div>
                  
                  
              </div>
            </div>
          </div>
        </div>
     
        

        <script>

          var parammes = [];
            var paramPor = [];

          $("#Buscar3").click(function(){

          //alert("Si entro");


          $.post("<?php echo base_url();?>index.php/proyecto/get4",

          function(data){
            //alert(data);

            var miObjeto1 = JSON.parse(data);
                //alert(miObjeto1);
                var parammes = [];
               var paramPor = [];

            $.each(miObjeto1, function(i,item){

                parammes.push(item.nombre_incidencia);
                paramPor.push(item.id_expediente);

            });

           //alert(paramPor);

          /////////////////////////////////////////////////////////////////////
          //var paramMeses=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          //var paramValores=[12, 19, 3, 5, 2, 3, 4, 1, 2, 3, 1, 20];
          var ctx = $('#myChart3');
    
          var densityData ={
           label: "Total de NNA por incidencia",
           
               // label:parammes,
                  fill: true,
                lineTension: 1000,
                backgroundColor: [
                  'rgba(37,180, 8, 1)',
                  'rgba(247, 17, 17, 1)',
                  'rgba(0, 99, 132, 1)',
                  'rgba(237, 163, 78, 1)'
                ],
                borderColor: "rgba(75,192,192,1)",
                    borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                  pointBorderWidth: 5,
                  pointHoverRadius: 2,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 3,
                  pointRadius: 1,
                pointHitRadius: 10,
                data:paramPor,// valores verticales
                  spanGaps: false,
          }

          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels:parammes,//valores horizontales
                datasets: [densityData],


            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                        
                            beginAtZero: true
                        }
                    }]
                }
            }
          });
          /////////////////////////////////////////////////////////////////////

          });
          });

          /*
          */
</script>

<div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                 <h4 align="center"><b>INCIDENCIA POR LUGAR DE ORIGEN</b></h4>
                 <table class="table table-bordered">
                        <thead>
                          <tr> 
                            <th><center>Municipio</th>
                            <th><center>Total</th>
                          </tr>
                        </thead>
                      <tbody>
                        <tr>
                        <td><center><?php 
                        foreach($total_mu as $tm){
                          echo $tm->municipio_origen;?>
                          <br>
                        <?php
                        }
                        ?>
                        </td>
                        
                        <td><center>
                        <?php
                        $var2=0;
                        foreach($total_mu as $tm){ ?>
                         
                         <?php
                          echo  $tm->id_ingreso;
                          $var2=$var2+$tm->id_ingreso;
                          ?>
                          <br>
                         
                        <?php
                        }?>
                        </td>
                     
                          </tr>
                      </tbody>
                      <tr>
                        <th><center>Total acumulado</th>
                        <td> <center><?php  echo $var2;?></td>
                      </tr>
                    </table>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="well well-sm">
              <div class="panel-body" >
                <h4 align="center"><b>GRÁFICA</b></h4><br>
                  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                  <!DOCTYPE html>
                  <html>
                  <head>
                    <title></title>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
                    <script src="<?php echo base_url();?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
                  </head>
                  <body>
                  
                  <canvas id="myChart4" width="500" height="150"></canvas>  
                  <br>
                  <div  class="noImprimir" >
                  <center>
                  <input type="button" id="Buscar4" class="btn btn-primary" value="Graficar">
                  <a  href="<?php echo base_url('index.php/proyecto/grafica_origen');?>"><input type="button" class="btn btn-primary" value="Ver gráfica de barras" > </a>
                 </center> 
                 </div>
                  
                  
              </div>
            </div>
          </div>
        </div>
     
        

        <script>

          var parammes = [];
            var paramPor = [];

          $("#Buscar4").click(function(){

          //alert("Si entro");


          $.post("<?php echo base_url();?>index.php/proyecto/get5",

          function(data){
            //alert(data);

            var miObjeto1 = JSON.parse(data);
                //alert(miObjeto1);
                var parammes = [];
               var paramPor = [];

            $.each(miObjeto1, function(i,item){

                parammes.push(item.municipio_origen);
                paramPor.push(item.id_ingreso);

            });

           //alert(paramPor);

          /////////////////////////////////////////////////////////////////////
          //var paramMeses=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
          //var paramValores=[12, 19, 3, 5, 2, 3, 4, 1, 2, 3, 1, 20];
          var ctx = $('#myChart4');
    
          var densityData ={
           label: "Total de NNA por incidencia",
           
               // label:parammes,
                  fill: true,
                lineTension: 1000,
                backgroundColor: [
                  'rgba(37,180, 8, 1)',
                  'rgba(247, 17, 17, 1)',
                  'rgba(0, 99, 132, 1)',
                  'rgba(237, 163, 78, 1)'
                ],
                borderColor: "rgba(75,192,192,1)",
                    borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                pointBorderColor: "rgba(75,192,192,1)",
                pointBackgroundColor: "#fff",
                  pointBorderWidth: 5,
                  pointHoverRadius: 2,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 3,
                  pointRadius: 1,
                pointHitRadius: 10,
                data:paramPor,// valores verticales
                  spanGaps: false,
          }

          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels:parammes,//valores horizontales
                datasets: [densityData],


            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                        
                            beginAtZero: true
                        }
                    }]
                }
            }
          });
          /////////////////////////////////////////////////////////////////////

          });
          });

          /*
          */
</script>



      
      </form>
     
</div>
  <canvas id="salesChart" style="display:none"></canvas>
  <!-- Main row -->
  <div class="row">
      <div class="col-md-12">
          <!-- Info Boxes Style 2 -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Gráfica de marcas</h3>
                        @php
                         //   echo '<pre>'; print_r($datos['marcas']); '</pre>'; die;
                        @endphp
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                              class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-8">
                          <div class="chart-responsive">
                              <canvas id="Grafica" height="150"></canvas>
                          </div>
                          <!-- ./chart-responsive -->
                      </div>
                      <!-- /.col -->
                      <div class="col-md-4">
                          <ul class="chart-legend clearfix">
                         <?php
                              $arrColores = [
                                  "#ce38d0", "#ee6262", "#90eaba","#ac642b","#a62d4d","#ef6d3a","#2c4447",
                                  "#198600","#fbfb63","#7e7cef","#7ac419","#bf4fc5","#ffae00","#e724a5","#dc966d"
                              ];
                            $color=''; $marks = [];$dataMarks = [];
                            $i=0;
                          foreach($datos['marcas'] as $marca){
                              $i++;
                             array_push($marks, $marca->nombre );
                               array_push($dataMarks, $marca->id );
                           // $marks[] = $marca->nombre;
                          $claves_aleatorias = array_rand($arrColores, 2);
                          $color = $arrColores[$i];
                          ?>
                                 <li><i class="far fa-circle" style="color:{{$color}};"></i> {{$marca->nombre}}</li>
                         <?php
                           }
                         //  echo '<pre>'; print_r($marks); '</pre>';
                          ?>
                          </ul>
                      </div>
                      <!-- /.col -->
                  </div>
                  <!-- /.row -->
              </div>
              <!-- /.card-body -->

          </div>
          <!-- /.card -->



          <!-- /.card-footer -->
      </div>
      <!-- /.card -->
  </div>

  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

  <!-- PAGE SCRIPTS -->
<script>
$(function () {

  'use strict'

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */



  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#Grafica').get(0).getContext('2d');
    var marks = '<?php echo json_encode($marks); ?>';
    var dataMarks = '<?php echo json_encode($dataMarks); ?>';
     var dataMarksColors = '<?php echo json_encode($arrColores); ?>';
    console.log(marks);
    var marks = JSON.parse(marks);
    var dataMarks = JSON.parse(dataMarks);
      var dataMarksColors = JSON.parse(dataMarksColors);
    /* for (let index = 0; index < marks.length; index++) {
        const element = marks[index];
        console.log(element);
    } */
    var pieData        = {
      labels: marks,
      datasets: [
        {
          data: dataMarks,//[700,500,400,600,300,100],
          backgroundColor : dataMarksColors// ['#f56954','#000000', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de','#ffae00'],
        }
      ]
    }
    var pieOptions     = {
      legend: {
        display: false
      }
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'doughnut',
      data: pieData,
      options: pieOptions
    })

  //-----------------
  //- END PIE CHART -
  //-----------------




})

</script>

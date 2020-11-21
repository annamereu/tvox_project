<?php
include("class/api.class.php");
include("class/option.class.php");
include("class/database.class.php");
$api= new CurlHelper();
$option= new Option();
$db=new Database();
$db->connect();

$month=$_GET['month'];
$year=$_GET['year'];
$today=date("Y-m-d");
if((!$month) || (!$year)){
  $month= date("m");
  $year= date("Y");
  $day= $option->cal_day($year, $month);
}else{
  $day= $option->cal_day($year, $month);
}


 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TVox</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="complessivo.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Complessivo

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="query.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Query

              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Mese in analisi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <form action="complessivo.php" class="form-horizontal" method="get"><label for="inputEstimatedBudget">Mese</label>
                  <select class="form-control" id="month" name="month">
                    <option value="01" <?php if($month==1) echo "selected";?> >Gennaio</option>
                    <option value="02" <?php if($month==2) echo "selected";?> >Febbraio</option>
                    <option value="03" <?php if($month==3) echo "selected";?> >Marzo</option>
                    <option value="04" <?php if($month==4) echo "selected";?> >Aprile</option>
                    <option value="05" <?php if($month==5) echo "selected";?> >Maggio</option>
                    <option value="06" <?php if($month==6) echo "selected";?> >Giugno</option>
                    <option value="07" <?php if($month==7) echo "selected";?> >Luglio</option>
                    <option value="08" <?php if($month==8) echo "selected";?> >Agosto</option>
                    <option value="09" <?php if($month==9) echo "selected";?> >Settembre</option>
                    <option value="10" <?php if($month==10) echo "selected";?> >Ottobre</option>
                    <option value="11" <?php if($month==11) echo "selected";?> >Novembre</option>
                    <option value="12"<?php if($month==12) echo "selected";?> >Dicembre</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputSpentBudget">Anno</label>
                  <select class="form-control" id="year" name="year">
                    <option value="2020" <?php if($year==2020) echo "selected";?> >2020</option>
                    <option value="2019" <?php if($month==2019) echo "selected";?> >2019</option>
                  </select>
                </div>
                <div class="form-group">

                    <button class="btn btn-info" type="submit">Invia</button>
                </div>
              </div></form>
              <!-- /.card-body -->
            </div>
          </div>
   </div>
   <div class="row">
     <div class="col-12">
       <pre>
       <?php
       $tot= $db->query("SELECT * FROM  tvox WHERE MONTH(data)='$month' order by data", "select");

       foreach ($tot as $key => $value) {
         $data_tot= '{x: \''.$value['data'].'\',';
         $tot_open= 'y:'.$value['tot_open'].'},';
         $tot_open_today= 'y:'.$value['tot_open_today'].'},';
          $tot_close_today= 'y:'.$value['tot_close_today'].'},';
         $to.=  $data_tot." ".$tot_open;
         $too.=$data_tot." ".$tot_open_today;
         $tco.=$data_tot." ".$tot_close_today;

       }

       ?>
       </pre>

       <canvas id="canvas"></canvas>

      </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">

    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>

  var MONTHS = [
<?php
$x=1;
while($x<=$day){
  $date=$option->make_date($year, $month, $x);

  $x++;
}?>
    ];
  var config = {
    type: 'line',
    data: {
      labels: [<?php
      $x=1;
      while($x<=$day){
        $date=$option->make_date($year, $month, $x);
        echo "'".$date."',";
        $x++;
      }?>],
      datasets: [{
        label: 'Totale Ticket Aperti',
        backgroundColor: window.chartColors.red,
        borderColor: window.chartColors.red,
        data: [
          <?= $to;?>
        ],
        fill: false,
      }, {
        label: 'Totale Ticket Aperti Oggi',
        fill: false,
        backgroundColor: window.chartColors.blue,
        borderColor: window.chartColors.blue,
        data: [
          <?= $too;?>
        ],
      },
      {
        label: 'Totale Ticket Chiusi Oggi',
        fill: false,
        backgroundColor: window.chartColors.green,
        borderColor: window.chartColors.green,
        data: [
          <?= $tco;?>
        ],
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Chart.js Line Chart'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Month'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Value'
          }
        }]
      }
    }
  };

  window.onload = function() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myLine = new Chart(ctx, config);
  };

  document.getElementById('randomizeData').addEventListener('click', function() {
    config.data.datasets.forEach(function(dataset) {
      dataset.data = dataset.data.map(function() {
        return randomScalingFactor();
      });

    });

    window.myLine.update();
  });

  var colorNames = Object.keys(window.chartColors);
  document.getElementById('addDataset').addEventListener('click', function() {
    var colorName = colorNames[config.data.datasets.length % colorNames.length];
    var newColor = window.chartColors[colorName];
    var newDataset = {
      label: 'Dataset ' + config.data.datasets.length,
      backgroundColor: newColor,
      borderColor: newColor,
      data: [],
      fill: false
    };

    for (var index = 0; index < config.data.labels.length; ++index) {
      newDataset.data.push(randomScalingFactor());
    }

    config.data.datasets.push(newDataset);
    window.myLine.update();
  });

  document.getElementById('addData').addEventListener('click', function() {
    if (config.data.datasets.length > 0) {
      var month = MONTHS[config.data.labels.length % MONTHS.length];
      config.data.labels.push(month);

      config.data.datasets.forEach(function(dataset) {
        dataset.data.push(randomScalingFactor());
      });

      window.myLine.update();
    }
  });

  document.getElementById('removeDataset').addEventListener('click', function() {
    config.data.datasets.splice(0, 1);
    window.myLine.update();
  });

  document.getElementById('removeData').addEventListener('click', function() {
    config.data.labels.splice(-1, 1); // remove the label first

    config.data.datasets.forEach(function(dataset) {
      dataset.data.pop();
    });

    window.myLine.update();
  });

</script>
</body>
</html>

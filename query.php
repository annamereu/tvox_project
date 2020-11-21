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
$data=$_POST['data'];
switch($_POST['tipo']){
  case 'open_today':
      $query= $api->total_ticket_open_today($data);
      $exe_query= ( $api->perform_http_request($query));
      $tot= $exe_query['data']['advancedQuery'][0]['total'];

      $count= $db->check_query($data);
       if(!$count){
        $db->query("INSERT INTO tvox (data,tot_open_today) VALUES ('$data', '$tot')", "");
      }else{
        $db->query("UPDATE  tvox SET tot_open_today='$tot' WHERE data='$data'", "");
      }
    break;
    case 'tot_open':
        $query= $api->total_ticket_open($data);
        $exe_query= ( $api->perform_http_request($query));

        $tot= $exe_query['data']['advancedQuery'][0]['total'];

        $count= $db->check_query($data);
         if(!$count){
           $db->query("INSERT INTO tvox (data,tot_open) VALUES ('$data', '$tot')", "");
        }else{
          $db->query("UPDATE  tvox SET tot_open='$tot' WHERE data='$data'", "");
        }
      break;
      case 'tot_close_today':
          $query= $api->total_ticket_closed_today($data);
          $exe_query= ( $api->perform_http_request($query));

          $tot= $exe_query['data']['ticketsCount'];

          $count= $db->check_query($data);
           if(!$count){
             $db->query("INSERT INTO tvox (data,tot_close_today) VALUES ('$data', '$tot')", "");
          }else{
            $db->query("UPDATE  tvox SET tot_close_today='$tot' WHERE data='$data'", "");
          }
        break;
        case 'media_time':
            $query= $api->total_ticket_time($data);
            $exe_query= ( $api->perform_http_request($query));

          $tot= $exe_query['data']['advancedQuery'][0]['total'];
//  print_r ($exe_query);
            $count= $db->check_query($data);
             if(!$count){
              // $db->query("INSERT INTO tvox (data,tot_close_today) VALUES ('$data', '$tot')", "");
            }else{
            //  $db->query("UPDATE  tvox SET tot_close_today='$tot' WHERE data='$data'", "");
            }
          break;

  default:
  break;

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
     <div class="col-12">


    </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                Totale ticket aperti
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <blockquote>
                  <p>query {<br>
                      &emsp;ticketsCount(search:<br>
                        &emsp;  &emsp;{<br>
                            &emsp;&emsp;&emsp;state:OPEN<br>
                            &emsp;&emsp;&emsp;createdAt: {operator:<br>
                            &emsp;&emsp;&emsp;BETWEEN valueLeft: "2020-01-01T00:00:00Z"<br>
                            &emsp;&emsp;&emsp;valueRight:"2020-11-20T23:59:59Z"<br>
                        &emsp;&emsp;  }<br>
                        &emsp;})<br>

                         }
                      </p>

                </blockquote>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                Totale ticket aperti oggi
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <blockquote>
                  <p>query {<br>
                      &emsp;ticketsCount(search:<br>
                        &emsp;  &emsp;{<br>
                            &emsp;&emsp;&emsp;state:OPEN<br>
                            &emsp;&emsp;&emsp;createdAt: {operator:<br>
                            &emsp;&emsp;&emsp;BETWEEN valueLeft: "2020-11-20T00:00:00Z"<br>
                            &emsp;&emsp;&emsp;valueRight:"2020-11-20T23:59:59Z"<br>
                        &emsp;&emsp;  }<br>
                        &emsp;})<br>

                         }
                      </p>

                </blockquote>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                Totale ticket chiusi oggi
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <blockquote>
                  <p>query {<br>
                      &emsp;ticketsCount(search:<br>
                        &emsp;  &emsp;{<br>
                            &emsp;&emsp;&emsp;state:CLOSED<br>
                            &emsp;&emsp;&emsp;closedAt: {operator:<br>
                            &emsp;&emsp;&emsp;BETWEEN valueLeft: "2020-11-20T00:00:00Z"<br>
                            &emsp;&emsp;&emsp;valueRight:"2020-11-20T23:59:59Z"<br>
                        &emsp;&emsp;  }<br>
                        &emsp;})<br>

                         }
                      </p>

                </blockquote>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Ticket chiusi nel mese

                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <blockquote>
                  <p>query {<br>
                      &emsp;ticketsCount(search:<br>
                        &emsp;  &emsp;{<br>
                            &emsp;&emsp;&emsp;state:CLOSED<br>
                            &emsp;&emsp;&emsp;closedAt: {operator:<br>
                            &emsp;&emsp;&emsp;BETWEEN valueLeft: "2020-11-01T00:00:00Z"<br>
                            &emsp;&emsp;&emsp;valueRight:"2020-11-30T23:59:59Z"<br>
                        &emsp;&emsp;  }<br>
                        &emsp;})<br>

                         }
                      </p>

                </blockquote>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
          <!-- ./col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Somma durata ticket chiusi nella giornata

                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <blockquote>
                     query {<br>
                       &emsp;tickets(<br>
                           &emsp;&emsp;search:<br>
                           &emsp;&emsp; state:CLOSED<br>
                           &emsp;&emsp;&emsp;closedAt: {operator:<br>
                           &emsp;&emsp;&emsp;BETWEEN valueLeft: "2020-11-01T00:00:00Z"<br>
                           &emsp;&emsp;&emsp;valueRight:"2020-11-30T23:59:59Z"<br>
                           &emsp;)<br>
                           &emsp;&emsp;{timeUnit  }<br>
                    }

                </blockquote>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
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

<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
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
<!-- DataTables -->

<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

</body>
</html>

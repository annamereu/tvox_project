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
      $tot= $exe_query['data']['ticketsCount'];
      echo $tot;
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

        $tot= $exe_query['data']['ticketsCount'];

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



            foreach ($exe_query as $k=>$subArray) {
              foreach ($subArray as $id=>$value) {
                  foreach ($value as $k=>$v) {

                    $sumArray+=$v['timeUnit'];
              }
              }
            }

              $count= $db->check_query($data);
             if(!$count){
               $db->query("INSERT INTO tvox (data,media_time) VALUES ('$data', '$sumArray')", "");
            }else{
              $db->query("UPDATE  tvox SET media_time='$sumArray' WHERE data='$data'", "");
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css">
<style>
.toolbar {
    float: left;
}
</style>
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
                          <form action="index.php" class="form-horizontal" method="get"><label for="inputEstimatedBudget">Mese</label>
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
                  </div></div>
   <div class="row">
     <div class="col-12">
     <table  id="example" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">

       <thead>

         <tr><th>Data</th><th>Totale ticket aperti</th><th></th><th>Totale ticket aperti oggi</th><th></th><th>Totale ticket chiusi oggi</th><th></th><th>Media Durata Ticket</th><th></th></tr></thead>
       <tbody>
         <?php
         $x=1;
         while($x<=$day){
           $date=$option->make_date($year, $month, $x);
           echo "<tr>";
           echo "<td>".$date."</td>";
            $tot= $db->query("SELECT * FROM  tvox WHERE data='$date'", "select");
           ?>

              <?php

              if(!$tot[0]['tot_open']){?>
                <td>0</td><td>
                <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                  <input type="text" hidden value="tot_open" name="tipo">
                  <input type="text" hidden value="<?=$date?>" name="data">

                <button  type='submit'  class="btn btn-info"><i class="fas fa-file-download"></i></button></td>
              </form>
             <?php
             }else{

               ?>
               <td><?=$tot[0]['tot_open']?></td><td>
               <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                 <input type="text" hidden value="tot_open" name="tipo">
                 <input type="text" hidden value="<?=$date?>" name="data">

                 <button  type='submit'  class="btn btn-info"><i class="fas fa-sync"></i></button>
               </form>
               <?php
             }
             echo "</td>";
             ?>


             <?php

                if(!$tot[0]['tot_open_today']){?>
             <td>0</td><td>
                <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                  <input type="text" hidden value="open_today" name="tipo">
                  <input type="text" hidden value="<?=$date?>" name="data">

                <button  type='submit'  class="btn btn-info"><i class="fas fa-file-download"></i></button></td>
              </form>
             <?php
             }else{

              ?>
               <td><?=$tot[0]['tot_open_today']?></td><td>
                 <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                 <input type="text" hidden value="open_today" name="tipo">
                 <input type="text" hidden value="<?=$date?>" name="data">

                 <button  type='submit'  class="btn btn-info"><i class="fas fa-sync"></i></button>
               </form>
               <?php
             }
             echo "</td>";

            if(!$tot[0]['tot_close_today']){?>
               <td>0</td><td>
                <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                  <input type="text" hidden value="tot_close_today" name="tipo">
                  <input type="text" hidden value="<?=$date?>" name="data">

                <button  type='submit'  class="btn btn-info"><i class="fas fa-file-download"></i></button></td>
              </form>
             <?php
             }else{

              ?>
               <td><?=$tot[0]['tot_close_today']?></td><td>
               <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                 <input type="text" hidden value="tot_close_today" name="tipo">
                 <input type="text" hidden value="<?=$date?>" name="data">

                 <button  type='submit'  class="btn btn-info"><i class="fas fa-sync"></i></button>
               </form>
               <?php
             }
             echo "</td>";
             ?>


             <?php

              if(!$tot[0]['media_time']){?>
              <td>00:00</td><td>
                <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                  <input type="text" hidden value="media_time" name="tipo">
                  <input type="text" hidden value="<?=$date?>" name="data">

                <button  type='submit'  class="btn btn-info"><i class="fas fa-file-download"></i></button></td>
              </form>
             <?php
             }else{
               ?>
                <td><?php
                $media=$tot[0]['media_time']/$tot[0]['tot_close_today'];
                echo $option->creatempo($media);
                ?></td><td>

               <form action="index.php?year=<?=$year?>&month=<?=$month?>" method="POST">
                 <input type="text" hidden value="media_time" name="tipo">
                 <input type="text" hidden value="<?=$date?>" name="data">

                 <button  type='submit'  class="btn btn-info"><i class="fas fa-sync"></i></button>
               </form>
               <?php
             }
             echo "</td>";

             echo "</tr>";

           $x++;
         } ?>

       </tbody>
       <tfoot>
                   <tr>
                       <th colspan="6" style="text-align:right">Total:</th>
     <th colspan="2" style="text-align:right"></th>
                   </tr>
               </tfoot>
             </table>
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

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.colVis.min.js"></script>
<script>


$(document).ready(function() {
    $('#example').DataTable( {
      "paging":   false,
      "ordering": false,
      dom: 'Bfrtip',
  buttons: [
      'excel'
    ],
        "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( 5, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 5 ).footer() ).html(
                      'Ticket chiusi nel mese: '+ pageTotal
                    );
                }
    } );


} );
</script>
</body>
</html>

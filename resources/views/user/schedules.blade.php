<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Scheduling System</title>

  <!-- Styles -->
  <link rel="icon" href="\img\talavera-logo.jpg">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">



  <!-- AdminLTE -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">


  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


  <!-- BS Stepper -->
  <link rel="stylesheet" href="/adminlte/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" media="screen" href="/datatable/datatables.css">
  <link rel="stylesheet" media="screen" href="/datatable/buttons.dataTables.min.css">

  <!-- Booststrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="/css/sweetalert2.css">
  <!-- Datepicker -->
  <link rel="stylesheet" href="/css/datepicker.css">





  <!-- Scripts -->





  <!-- jQuery -->

  <script src="/js/jquery-3.5.1.min.js"></script>


  <!-- Datatables -->
  <script src="/datatable/datatables.min.js" defer></script>
  <script type="text/javascript" src="/js/jzip.min.js"></script>
  <script type="text/javascript" src="/js/pdfmake.min.js"></script>
  <script src="/datatable/dataTables.buttons.min.js" defer></script>
  <script src="/datatable/buttons.html5.min.js" defer></script>
  <!-- Sweetalert -->
  <script src="/js/cdnjs/sweetalert2.min.js"></script>
  <!-- Validate -->
  <script src="/js/validate.min.js"></script>
  <script src="/js/additional.min.js"></script>

  <!-- Datepicker -->
  <script src="/js/moment.min.js"></script>
  <script src="/js/datetimepicker.min.js"></script>


  <!-- BS-Stepper -->
  <script src="/adminlte/plugins/bs-stepper/js/bs-stepper.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js" defer></script>
  <link rel="stylesheet" href="/js/jquery-ui-1.12.1.custom/jquery-ui.theme.css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.3/themes/hot-sneaks/jquery-ui.css" />



  <!-- Boostrap4 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>


  <!-- AdminLTE App -->
  <script src="/adminlte/dist/js/adminlte.js"></script>
  <!-- ChartJS -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script> -->
  <script src="https://rawgit.com/nnnick/Chart.js/v1.0.2/Chart.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->
  <!-- PUSHER -->
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>


  <style type="text/css">
    @media only screen and (max-width: 1000px) {
      .bs-stepper-header {
        background-color: lightblue;
        display: none;

      }
    }

    /* *::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      background-color: #F5F5F5;
      border-radius: 10px;
    }

    *::-webkit-scrollbar {
      width: 10px;
      background-color: #F5F5F5;
    }

    *::-webkit-scrollbar-thumb {
      border-radius: 10px;
      background-image: -webkit-gradient(linear,
          left bottom,
          left top,
          color-stop(0.44, rgb(122, 153, 217)),
          color-stop(0.72, rgb(73, 125, 189)),
          color-stop(0.86, rgb(28, 58, 148)));
    } */

   /* #center {
      width: 95%;
      margin: auto;
    }

    .pie-head {
      width: 100%;
      margin: auto;
      text-align: center;
    }

    #center-vh {
      width: 50%;
      margin: auto;
      padding: 70px 0;
      text-align: center;
    }

    .image-cropper {
      width: 30px;
      height: 30px;
      position: relative;
      overflow: hidden;
      border-radius: 50%;
    }

    .rounded {
      display: inline;
      margin: 0 auto;
      height: 30px;
      width: 30px;
    }

    .between {
      margin-right: 5px;
    }

    .ourworks-box {
      margin-top: 10px;
      width: 100%;
      justify-content: center;
      text-align: center;
    }

    .our-works-head {
      font-size: 20px;
      font-weight: 400;
      color: black;
    }

    section {
      margin-top: 40px;
    }

    .cards {
      margin: 10px 4px;
      transition: .6s ease;
    }

    .cards:hover {
      transform: scale(1.05);
    }

    .card-block {
      padding: 10px;
    }

    .card-img-top {
      height: 70px;
      width: 70px;
      margin-left: 10px;
      border-radius: 50%;
      transition: all .2s ease-in-out;
    }

    .chartWrapper {
      position: relative;
    }

    .chartWrapper>canvas {
      position: absolute;
      left: 0;
      top: 0;
      pointer-events: none;
    }

    .chartAreaWrapper {
      width: 100%;
      overflow-x: scroll;
    }

    .scrollcards {
      height: 400px;
      width: 100%;
      background-color: #fff;
      overflow: auto;
    }

    .scrollcards-short,
    .scrollcards-mini {
      height: 400px;
      width: 100%;
      background-color: #fff;
      width: 100%;
    }

    div.scrollcards-short .cards {
      justify-content: center;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: 32%;
    }

    div.scrollcards-mini .cards {
      justify-content: center;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: 49%;
    }

    div.scrollcards .cards {
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: 400px;
    }*/
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    @if (Route::is('user.index'))
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="/img/nsm.png" alt="AdminLTELogo" height="60" width="60" />
    </div>
    @endif

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Home</a>
        </li>


      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">



        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">
            <i class="fas fa-sign-out"></i>
          </a>
        </li>




      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
        <img src="/img/talavera-logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light"> Scheduling System </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/img/mayor.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">User</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li @if (Route::is('admin.index')) class="nav-item menu-open" @else class="nav-item" @endif>
              <a href="{{ route('admin.index') }}" @if (Route::is('admin.index')) class="nav-link active" @else
                class="nav-link" @endif>
                <i class="nav-icon fas fa-tachometer"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li @if (Route::is('user.index')) class="nav-item menu-open" @else class="nav-item" @endif>
              <a href="" @if (Route::is('user.index')) class="nav-link active" @else class="nav-link"
              @endif>
              
              <p>{{$view->Category_Name}}</p>
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


      <main class="py-2">
      
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

.row {margin: 0 -5px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
<body>
<section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="position: relative; height: 500px; width: 160%;">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-calendar mr-1"></i>
                  Calendar
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Set Schedule</a>
                    </li>
                  
                  </ul>
                </div>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="tab-content p-0">
                <div class="row">
            
            <div class="column">
                <div class="card">
                <h3>January</h3>
                <p>Some text</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <h3>February</h3>
                <p>Reserved</p>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>March</h3>
                <p>Reserved</p>     
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>April</h3>
                <p>Reserved</p>    
                </div>
            </div>
            </div>
            <div class="column">
                <div class="card">
                <h3>May</h3>
                <p>Some text</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <h3>June</h3>
                <p>Reserved</p>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>July</h3>
                <p>Reserved</p>     
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>August</h3>
                <p>Reserved</p>    
                </div>
            </div>
            </div>
            <div class="column">
                <div class="card">
                <h3>September</h3>
                <p>Some text</p>
                </div>
            </div>

            <div class="column">
                <div class="card">
                <h3>October</h3>
                <p>Reserved</p>
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>November</h3>
                <p>Reserved</p>     
                </div>
            </div>
            
            <div class="column">
                <div class="card">
                <h3>December</h3>
                <p>Reserved</p>    
                </div>
            </div>
            </div>

                  
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
</body>





        @if(Session::has('type'))
        <script>

          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,

          })

          Toast.fire({
            icon: '{{Session::get("type")}}',
            title: '{{Session::get("title")}}'
          })


        </script>
        @endif
      </main>







    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="">Scheduling System</a>.</strong>
      All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->



</body>

</html>
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
      <!-- Fullcalendar -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />






  <!-- Scripts -->





  <!-- jQuery -->

  <script src="/js/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.js" integrity="sha512-s0SB4i9ezk9SRyV1Glrj/w5xS5ExSxXiN44fQeV9GYOtExbVWnC+mUsUyZdIYv6qXL0xe1qvpe0h1kk56gsgaA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" integrity="sha512-WlaNl0+Upj44uL9cq9cgIWSobsjEOD1H7GK1Ny1gmwl43sO0QAUxVpvX2x+5iQz/C60J3+bM7V07aC/CNWt/Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  


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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/gcal.js"></script>
  <script src="/js/datetimepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" integrity="sha512-rxThY3LYIfYsVCWPCW9dB0k+e3RZB39f23ylUYTEuZMDrN/vRqLdaCBo/FbvVT6uC2r0ObfPzotsfKF9Qc5W5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script> -->


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
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script> -->
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

    #center {
      width: 100%;
      margin: auto;
      text-align: center;
    }

    .par {
      margin: 0;
    }

    #tabs {
      justify-content: center;
      display: flex;
      text-align: center;

    }

    #tabs-li {
      text-align: center;
      display: inline;
    }

    .img-cropper {
      position: static;
      width: 70px;
      height: 70px;
      overflow: hidden;
      border-radius: 50%;
      margin-bottom: .5rem;
    }

    .senators-img {
      height: 100%;
      width: 100%;
      display: inline;
      margin: 0 auto;
      text-align: center;
      margin-bottom: .5rem;
    }

    .senators-p {
      width: 100%;
      margin: auto;
      margin-bottom: 0;
      text-align: center;
      text-justify: inter-word;
      size: 1px
    }

    .rank {
      position: absolute;
      top: -3px;
      left: -3px;
      background-color: rgba(0, 123, 255, 0.7);
      width: 25px;
      height: 25px;
      border-radius: 27px;
      color: #fff;
      text-align: center;
      vertical-align: middle;
      line-height: 27px;
      box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%), 0 6px 20px 0 rgb(255 255 255 / 19%);
      font-size: 14px;
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
      height: 150px;
      width: 100%;
      background-color: #fff;
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
    }

    .scrollcards-senatorials {
      height: auto;
      width: 100%;
      background-color: #fff;
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
    }

    .scrollcards-councilors {
      height: auto;
      width: 100%;
      background-color: #fff;
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
    }

    .scrollcards-partylist {
      height: 400px;
      width: 100%;
      background-color: #fff;
      overflow: auto;
    }

    .scrollcards-dashboard {
      height: auto;
      width: 100%;
      background-color: #fff;
      overflow-x: hidden;
      overflow-y: scroll;
    }

    div.scrollcards-partylist .cards {
      border: solid #ccc 1px;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: 400px;
    }

    .scrollcards-short,
    .scrollcards-mini {
      height: 150px;
      width: 100%;
      background-color: #fff;
      overflow-x: scroll;
      overflow-y: hidden;
      white-space: nowrap;
    }

    div.scrollcards-short .cards {
      border: solid #ccc 1px;
      justify-content: center;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: auto;
      min-width: 32%;
    }

    div.scrollcards-senatorials .cards {
      border: solid #ccc 1px;
      justify-content: center;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: auto;
    }

    div.scrollcards-councilors .cards {
      border: solid #ccc 1px;
      justify-content: center;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: auto;
      min-width: 12%;
    }

    div.scrollcards-mini .cards {
      border: solid #ccc 1px;
      justify-content: center;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: auto;
      min-width: 49%;
    }

    div.scrollcards .cards {
      border: solid #ccc 1px;
      display: inline-block;
      padding: 14px;
      text-decoration: none;
      height: auto;
      width: 400px;
    }

    .hidden {
      visibility: hidden;
      overflow: hidden;
      width: 0px;
      height: 0px;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed" id="navMenu">
  <div class="wrapper">

    <!-- Preloader -->
    @if (Route::is('user.index'))
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="/img/talavera-logo.jpg" alt="AdminLTELogo" height="60" width="60" />
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

    <!--     @if (Route::is('vote.index'))

        <li class="nav-item" id="expandView">
          <a class="nav-link" href="#" onclick="expandView()">
            <i class="fas fa-expand-wide"></i>
          </a>
        </li>
        <li class="nav-item hidden" id="compressView">
          <a class="nav-link" href="#" onclick="compressView()">
            <i class="fas fa-compress"></i>
          </a>
        </li>
        <li class="nav-item" id="printRank">
          <a class="nav-link" href="#" onclick="printRank()">
            <i class="fas fa-print"></i>
          </a>
        </li>
        @endif -->

        <li class="nav-item">
          <a class="nav-link" href="{{route('logout')}}">
            <i class="fas fa-sign-out" title="Logout"></i>
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
        <span class="brand-text font-weight-light"> Encoder </span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/img/mayor.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Mayor Vi</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li @if (Route::is('user.index')) class="nav-item menu-open" @else class="nav-item" @endif>
              <a href="{{ route('user.index') }}" @if (Route::is('user.index')) class="nav-link active" @else
                class="nav-link" @endif>
                <i class="nav-icon fas fa-tachometer"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>


                        <li @if (Route::is('schedule.index') || Route::is('event.index')  ) class="nav-item menu-open" @else class="nav-item" @endif>
                            <a href="" @if (Route::is('schedule.index') | Route::is('event.index')  ) class="nav-link active" @else class="nav-link"
                                @endif>
                             
                                <i class="nav-icon fas fa-calendar"></i>
                                <p>
                                    Schedule
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('schedule.index') }}" @if (Route::is('schedule.index'))
                                        class="nav-link active" @else class="nav-link" @endif>
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Schedule List</p>
                                    </a>
                                </li>



                                  <li class="nav-item">
                                    <a href="{{ route('event.index') }}" @if (Route::is('event.index'))
                                        class="nav-link active" @else class="nav-link" @endif>
                                        <i class="fas fa-list nav-icon"></i>
                                        <p>Event List</p>
                                    </a>
                                </li>




                            </ul>
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
        @yield('content')

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
      <strong>Copyright &copy; 2022
        <a href="/">Municipality of Talavera</a>.</strong>
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

<script>
 
</script>
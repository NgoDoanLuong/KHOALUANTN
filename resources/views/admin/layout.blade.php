<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hệ thống đánh giá môn học trực tuyến </title>
    <!-- jQuery -->

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">

    <script src="{{asset('jquery-3.2.1.min.js')}}"></script>

    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->

    <link href="{{asset('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <script src="{{asset('Chart.min.js')}}"></script>

    <script type="text/javascript">
       function xoa(message){
         if(window.confirm(message)){
           return true;
         }else return false;
       }
    </script>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">

            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/dhcn.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xin chào quản trị viên</span>
                <h2>{{Auth::user()->name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Quản lý</h3>
                <ul class="nav side-menu">
                  <li><a href="{{route('hocky.list')}}"><i class="fa fa-home"></i> Trang chủ</a>
                  </li>
                  <li><a href="{{route('sinhvien.list')}}"><i class="fa fa-edit"></i> Quản lý sinh viên </a>

                  </li>
                  <li><a href="{{route('giangvien.list')}}"><i class="fa fa-desktop"></i> Quản lý giảng viên</a>

                  </li>
                  <li><a><i class="fa fa-table"></i> Quản lý lớp môn học </a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('lopmonhoc.showAdd')}}">Tạo lớp môn học</a></li>
                      <li><a href="{{route('monhoc.show')}}">Tạo sinh viên lớp học</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Quản lý tiêu chí & Học kỳ</a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('hocky.list')}}">Quản lý học kỳ</a></li>
                    <li><a href="{{route('tieuchi.list')}}">Quản lý tiêu chí</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-bar-chart-o"></i> Kết quả đánh giá</a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('ketqua.show_hk')}}">Theo học kỳ</a></li>
                    <li><a href="{{route('ketqua.giangvien.list')}}">Theo giảng viên</a></li>
                    </ul>
                  </li>
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->


            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('images/dhcn.jpg')}}" alt="">{{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">


                    <li><a href="{{route('getLogout')}}"><i class="fa fa-sign-out pull-right"></i> Thoát</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Trường Đại học Công Nghệ - Đại học Quốc gia Hà Nội
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->

    <!-- JQVMap -->
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->

    <!-- Custom Theme Scripts -->

      <!-- Datatables -->

   <!--<script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.jss')}}"></script>-->

     <!-- Custom Theme Scripts -->

  <script type="text/javascript" src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>


    <script src="{{asset('build/js/custom.min.js')}}"></script>


   <script type="text/javascript">
   $(document).ready(function() {
      $('#tablesv').DataTable();
      $('#tablegv').DataTable();
      $('#table_lopmonhoc').DataTable();
      $('#danhsach_lop').DataTable();
      $('#table_tieuchi').DataTable();
   } );
   </script>
  </body>
</html>

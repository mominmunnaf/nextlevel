<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>
      @yield('title')
    </title>

    <!-- Bootstrap -->
    <link href="{{ asset('admin') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('admin') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('admin') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('admin') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('admin') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('admin') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin') }}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{ route('admin_dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>NextLevel</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('admin/production') }}/images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Auth Name</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3 class="bg bg-danger p-2 text-center m-0">Admin Panel</h3>
                <ul class="nav side-menu">
                  
                  <li>
                    <a href="{{ route('admin_dashboard') }}"><i class="fa fa-home"></i> Dashboard </a>
                  </li>

                  <li><a><i class="fa fa-edit"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('category.create') }}">Add Category</a></li>
                      <li><a href="{{ route('category.index') }}">All Categories</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-outdent"></i> Sub Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('subcategory.create') }}">Add Sub Category</a></li>
                      <li><a href="{{ route('subcategory.index') }}">All Sub Categories</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-th-large"></i> Product <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('product.create') }}">Add Product</a></li>
                      <li><a href="{{ route('product.index') }}">All Products</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-truck"></i> Order <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('all_order') }}">All Orders</a></li>
                      <li><a href="{{ route('pending_order') }}">Pending Orders</a></li>
                      <li><a href="{{ route('success_order') }}">Completed Orders</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-graduation-cap"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('administration.create') }}">Add Admin</a></li>
                      <li><a href="{{ route('administration.index') }}">All Admins</a></li>
                      <li><a href="{{ route('user.index') }}">All Users</a></li>
                    </ul>
                  </li>
                  
                </ul>
                <form method="GET" action="{{ route('admin_logout') }}">
                  @csrf
                  <button class="btn btn-sm btn-danger ml-3">Logout</button>
                </form>
              </div>
             
            </div>
            <!-- /sidebar menu -->

            

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('admin/production') }}/images/img.jpg" alt="">Auth Name
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                  <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                    @csrf
                    <i class="fa fa-sign-out pull-right"></i>
                    <input type="submit" value="Logout">                    
                  </form>
                    <a class="dropdown-item"  href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <div class="text-center">
                        <a class="dropdown-item">
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        @yield('content')

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy; <span class="text-danger">Next</span><span class="text-success">Level </span>2023 
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('admin') }}/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin') }}/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="{{ asset('admin') }}/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="{{ asset('admin') }}/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="{{ asset('admin') }}/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('admin') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="{{ asset('admin') }}/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="{{ asset('admin') }}/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="{{ asset('admin') }}/vendors/Flot/jquery.flot.js"></script>
    <script src="{{ asset('admin') }}/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('admin') }}/vendors/Flot/jquery.flot.time.js"></script>
    <script src="{{ asset('admin') }}/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="{{ asset('admin') }}/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('admin') }}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="{{ asset('admin') }}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{ asset('admin') }}/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="{{ asset('admin') }}/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin') }}/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="{{ asset('admin') }}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="{{ asset('admin') }}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('admin') }}/vendors/moment/min/moment.min.js"></script>
    <script src="{{ asset('admin') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('admin') }}/build/js/custom.min.js"></script>
	
  </body>
</html>

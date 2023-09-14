<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Nexus Nova Ltd </title>

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <!--       <link rel="shortcut icon" href="{{asset('public/img/fav1.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/img/fav1.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/img/fav1.png')}}"> -->
        <!-- END Icons -->
          <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
        <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/select2/css/select2.min.css')}}">

        <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

      <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{asset('public/dashboard_assets/css/dashmix.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
   <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
                <link rel="stylesheet" href="{{asset('public/dashboard_assets/js/plugins/flatpickr/flatpickr.min.css')}}">
                        <link rel="stylesheet"  href="{{asset('public/css/dropify.css')}}">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->

        <!-- END Stylesheets-->
         <link rel="stylesheet" id="css-theme" href="{{asset('public/dashboard_assets/css/themes/xpro.min.css')}}">

<style type="text/css">
    .error{
        color: #d73838;
    }
    .select2{
        width: 100%!important;
    }
    .bg-primary-sidebar{
        background-color:#34495E!important;
    }


 ::-webkit-scrollbar
{
    width: 10px;
    height: 10px;
    background-color: #F5F5F5;
}

 ::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    background-image:-webkit-gradient(linear, left bottom, left top, color-stop(0.44, #9e9e9e), color-stop(0.72, #9e9e9e), color-stop(0.86,#9e9e9e));

}
 th a{
    color: black;
 }
 .btn-alt-primary {
     color: white;
    background-color: #34495E!important;
}
.btn-alt-primary:hover {
     color: beige!important;
    background-color: #34495E!important;
}
.btn-primary{
    background-color: #286093!important;
}
.bg-header-dark{
  /* background: url('public/img/NN_WebBackground.jpg')!important; */
  background-color: #85929E!important;
}
a{
    color: #286092;
}

</style>
    </head>
    <body>

        @yield('sidebar')

              <!-- Header -->
            <header id="page-header" style="background: #34495E;">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Logo -->
                        <a class="font-w600 text-dual tracking-wide" href="{{url('/')}}">
                         <img src="{{asset('public/img/NN_logowithslogan.png')}}" width="180px">
                        </a>
                        <!-- END Logo -->

                        <!-- Menu -->
                        <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block ml-3">
                            <li class="nav-main-item">
                                <a class="nav-main-link  " href="{{url('/')}}">
                                    <i class="nav-main-link-icon fa fa-compass"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                                              <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-list-alt"></i>
                                    <span class="nav-main-link-name">Issues</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{url('log-issue')}}">

                                            <span class="nav-main-link-name">Log Issue</span>

                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{url('my-issues')}}">

                                            <span class="nav-main-link-name">
                                            @if(Auth::user()->role=='user')My
                                            @else
                                            All
                                            @endif
                                             Issues</span>

                                        </a>
                                    </li>

                                </ul>
                            </li>
                             @if(Auth::user()->role=='admin')
                              <li class="nav-main-item">
                                <a class="nav-main-link" href="{{url('users')}}">
                                    <i class="nav-main-link-icon fa fa-user-circle"></i>
                                    <span class="nav-main-link-name">Users</span>
                                </a>
                            </li>

                                <li class="nav-main-item">
                                <a class="nav-main-link" href="{{url('location-reports')}}">
                                    <i class="nav-main-link-icon fa fa-chart-pie"></i>
                                    <span class="nav-main-link-name">Reports</span>
                                </a>
                            </li>
                            <!-- <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-chart-pie"></i>
                                    <span class="nav-main-link-name">Reports</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{url('location-reports')}}">
                                          <span class="nav-main-link-name">Location Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{url('issue-type-reports')}}">
                                            <span class="nav-main-link-name">
                                            Issue Type Report</span>
                                      </a>
                                    </li>
                                </ul>
                            </li> -->
                             <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-cog"></i>
                                    <span class="nav-main-link-name">Settings</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{url('issue-type')}}">
                                          <span class="nav-main-link-name">Issue Type</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="{{url('location')}}">
                                            <span class="nav-main-link-name">
                                            Location</span>
                                      </a>
                                    </li>
                        <li class="nav-main-item">
                                <a class="nav-main-link" href="{{url('staff-role')}}">
                                    <span class="nav-main-link-name">Staff Role</span>
                                </a>
                            </li>
                                </ul>
                            </li>

                               @endif
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:;" onclick="document.getElementById('form-logout').submit()">
                                    <i class="nav-main-link-icon fa fa-sign-out-alt
"></i>
                                    <span class="nav-main-link-name">Logout</span>
                                </a>
                            </li>


                        </ul>
                        <!-- END Menu -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div>
                           <form id="form-logout" action="{{url('logout')}}" method="post">
                                    @csrf
                            </form>

                        <!-- Open Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

                        <!-- END Open Search Section -->

                        <!-- Search form in larger screens -->

                        <!-- Notifications Dropdown -->


                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-dual d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header bg-primary">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search your company.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary-darker">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->
        @yield('content')
          @yield('footer')

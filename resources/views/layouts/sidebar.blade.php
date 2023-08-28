
@section('sidebar')


  <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-dark main-content-boxed">

            <!-- Sidebar -->
            <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-primary-sidebar">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        Nexus  <span class="opacity-75">Nova</span>
                            <span class="font-w400">Ltd</span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- User Info -->
                    <div class="smini-hidden">
                        <div class="content-side content-side-full bg-black-10 d-flex align-items-center">
                            <a class="img-link d-inline-block" href="javascript:void(0)">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{asset('public/img/user.webp')}}" alt="">
                            </a>
                            <div class="ml-3">
                                <a class="font-w600 text-dual" href="javascript:void(0)">{{Auth::user()->name}}</a>
                                <div class="font-size-sm text-dual">{{Auth::user()->role}}</div>
                            </div>
                        </div>
                    </div>
                    <!-- END User Info -->

                    <!-- Side Navigation -->
                    <div class="content-side content-side-full bg-black-2">
                        <ul class="nav-main">
                               <!-- Menu -->
                         <li class="nav-main-item">
                                <a class="nav-main-link active" href="db_corporate_slim.html">
                                    <i class="nav-main-link-icon fa fa-compass"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                                              <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-list-alt
"></i>
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
                                <a class="nav-main-link" href="{{url('reports')}}">
                                    <i class="nav-main-link-icon fa fa-chart-pie"></i>
                                    <span class="nav-main-link-name">Reports</span>
                                </a>
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
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->
        @endsection('sidebar')

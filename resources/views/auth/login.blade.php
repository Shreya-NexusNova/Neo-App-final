
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Login - Nexus Nova Ltd  </title>
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <!--     <link rel="shortcut icon" href="{{asset('public')}}/dashboard_assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public')}}/dashboard_assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public')}}/dashboard_assets/media/favicons/apple-touch-icon-180x180.png"> -->
        <!-- END Icons -->
        <link rel="shortcut icon" href="{{asset('public/img/fav1.png')}}">
        <link rel="icon" type="image/png" sizes="192x192" href="{{asset('public/img/fav1.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/img/fav1.png')}}">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic,300italic,300" rel="stylesheet" type="text/css">
        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{asset('public')}}/dashboard_assets/css/dashmix.min.css">
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
        <style type="text/css">
            .bg-primary-op{
                background:#D4E6F1!important;
            }

            .btn-hero-primary{
                background: #2874A6;
            }
            .text-primary{
                color: #588cb7!important;
            }
            .text-warning{
                color: #f1ac38!important;
            }
            .glassmorphic-container {
                width: 80% !important;
                height: 55% !important;
                background-color: #FDFEFE;
                position: absolute;
                transform: translate(-50%,-50%);
                top: 50%;
                left: 50%;
                border-radius: 10px;
                backdrop-filter: blur(80px);
                border: 2px solid rgba(255,255,255,0.1);
                box-shadow: 0 0 10px rgba(8,7,16,0.7);
            }
        </style>
    </head>
    <body>
        <div class="bg-image" >
            <div class="row no-gutters bg-primary-op">
                <!-- Main Section -->
                <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                    <div class="p-3 w-100 glassmorphic-container">
                        <!-- Header -->
                        <div class="mb-3 text-center">
                            <a class="link-fx font-w700 font-size-h1"  ></a>
                            <p class="text-uppercase font-w700 font-size-sm">Sign In</p>
                        </div>
                        <!-- END Header -->
                        <!-- Sign In Form -->
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <div class="row no-gutters justify-content-center">
                            <div class="col-sm-8 col-xl-6">
                                <form class="js-validation-signin" action="{{url('login')}}" method="POST">
                                    @csrf
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="text"  autofocus class="form-control form-control-alt  @error('email') is-invalid @enderror" id="login-username" name="email" placeholder="Username">
                                            @error('email')
                                            <span class="invalid-feedback pl-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-alt  @error('password') is-invalid @enderror" id="login-password" name="password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                        </button>
                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <!-- <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{route('password.request')}}"> -->

                                            <!-- </a> -->

                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Main Section -->

                <!-- Meta Info Section -->
                <div class="hero-static  col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center" >
                    <div class="p-3">
                        <p class="display-4 mt-5 pt-3 text-dark ">
                <img src="{{asset('public/img/NN_logowithslogan.png')}}" width="300">
                        </p>
                        <p class="font-size-lg font-w600 text-dark  mb-0" style="color:#CE9464">

                        </p>
                    </div>
                </div>
                <!-- END Meta Info Section -->
            </div>
        </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>

        <script src="{{asset('public')}}/dashboard_assets/js/dashmix.core.min.js"></script>
        <!--
            Dashmix JS
            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_js/main/app.js
        -->
        <script src="{{asset('public')}}/dashboard_assets/js/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset('public')}}/dashboard_assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="{{asset('public')}}/dashboard_assets/js/pages/op_auth_signin.min.js"></script>
    </body>
</html>

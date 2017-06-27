<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico">

    <title>{{ config('app.name') }}.</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Animate -->
    <link href="{{ asset('website/css/animate.css') }}" rel="stylesheet">

    <!-- Magnific-popup -->
    <link rel="stylesheet" href="{{ asset('website/css/magnific-popup.css') }}">

    <!-- Icon-font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/ionicons.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="navbar navbar-custom sticky" role="navigation">
        <div class="container">
            <!-- Navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="ion-navicon"></i>
                </button>
                <!-- LOGO -->
                <a class="navbar-brand logo" href="index-2.html">
                    <i class="ion-social-buffer"></i>
                    <span>Taka</span>
                </a>
            </div>
            <!-- end navbar-header -->

            <!-- menu -->
            <div class="navbar-collapse collapse">
                <!-- Navbar right -->
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if (\Auth::user()->isAn('admin'))
                                <li>
                                    <a href="{{ url('/admin') }}">
                                        Portal Access
                                    </a>
                                </li>
                            @elseif(\Auth::user()->isAn('service-provider'))
                                <li>
                                    <a href="{{ url('/service-provider') }}">
                                        Portal Access
                                    </a>
                                </li>
                            @endif
                            
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('services') }}">Services</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li></li><li></li><li></li>
                </ul>

            </div>
            <!--/Menu -->
        </div>
        <!-- end container -->
    </div>
    <div class="clearfix"></div>
        @if(Session::has('message'))
            <p id="kialart" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @elseif(Session::has('error'))
            <p id="kialart" class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
    @yield('page')

    <!-- FOOTER -->
    <footer class="section bg-gray footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h5>Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a>
                        </li>
                        <li><a href="{{ route('services') }}">Services</a>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6">
                    <h5>Social</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Facebook</a>
                        </li>
                        <li><a href="#">Twitter</a>
                        </li>
                        <li><a href="#">Behance</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6">
                    <h5>Support</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help & Support</a>
                        </li>
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms & Conditions</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6">
                    <h5>Contact</h5>
                    <address>
            Taka Offices, Gate C<br>
            Juja, Thika<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890<br/>
            E: <a href="mailto:taka@hotmail.com">taka@hotmail.com</a>
          </address>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="footer-alt">
                        <p class="pull-right">{{ date('Y') }} © {{ config('app.name') }}.</p>
                        <p class="logo"><i class="ion-social-buffer"></i>Taka</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- END FOOTER -->




    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('website/js/jquery.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <!-- Jquery easing -->
    <script type="text/javascript" src="{{ asset('website/js/jquery.easing.1.3.min.js') }}"></script>
    <script src="{{ asset('website/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/js/jquery.magnific-popup.min.js') }}"></script>
    <!--sticky header-->
    <script type="text/javascript" src="{{ asset('website/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('website/js/waypoints.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('website/js/jquery.counterup.min.js') }}" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="{{ asset('website/js/jquery.app.js') }}"></script>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 100,
                time: 1200
            });
        });
    </script>



</body>
</html>
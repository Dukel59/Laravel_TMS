<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
{{--    <link rel="icon" type="image/png" href="{{'images/favicon.png'}}">--}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
{{--    <title>{{'Polo'}}</title>--}}
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
</head>

<body>
<!-- Body Inner -->
<div class="body-inner">
    <!-- Header -->
    <header id="header" data-fullwidth="true" class="header-alternative">
        <div class="header-inner">
            <div class="container">
                <!--Logo-->
                <div id="logo">
                    <a href="{{route('main')}}">
                        <img src="images/logo-circle.png" class="logo-default">
                        <img src="images/logo-circle-dark.png" class="logo-dark">
                    </a>
                </div>
                <div class="header-extras">
                    <ul>
                        @guest
                            <li>
                                <a href="{{route('auth.login')}}">Login</a>
                            </li>
                            <li>
                                <a href="{{route('auth.register')}}" >Register</a>
                            </li>
                        @endguest
                        @auth
                            <li>
                                <a href="{{route('account.show')}}">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('auth.logout')}}" >Logout</a>
                            </li>
                        @endauth
                    </ul>
                </div>
                <!--End: Logo-->
                <!--Navigation Resposnive Trigger-->
                <div id="mainMenu-trigger">
                    <a class="lines-button x"><span class="lines"></span></a>
                </div>
                <!--end: Navigation Resposnive Trigger-->
                <!--Navigation-->
                <div id="mainMenu" class="menu-center menu-lowercase">
                    <div class="container">
                        <nav>
                            <ul>
                                <li><a href="{{route('main')}}">Home</a></li>
                                <li><a href="{{route('products')}}">Products</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('contacts')}}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!--end: Navigation-->
            </div>
        </div>
    </header>
    <!-- end: Header -->
    @yield('content')
    <!-- Footer -->
    <footer id="footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="icon-clock"></i></a>
                            </div>
                            <h3>Working Days</h3>
                            <p><strong>Monday - Friday</strong>
                                <br>10:00 AM - 11:00 PM</p>
                            <p><strong>Saturday - Sunday</strong>
                                <br>10:00 AM - 04:00 PM</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                            </div>
                            <h3>Caffe Location</h3>
                            <p><strong>Caffe Address:</strong>
                                <br> 795 Folsom Ave, Suite 600
                                <br> San Francisco, CA 94107
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box effect small clean">
                            <div class="icon">
                                <a href="#"><i class="icon-phone"></i></a>
                            </div>
                            <h3>Caffe Contact</h3>
                            <p><strong>Phone:</strong>
                                <br> (123) 456-7890
                                <br> (987) 654-3210
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Social icons -->
                        <div class="social-icons social-icons-colored float-left">
                            <ul>
                                <li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
                                <li class="social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-vimeo"><a href="#"><i class="fab fa-vimeo"></i></a></li>
                                <li class="social-youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                <li class="social-pinterest"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="social-gplus"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                        <!-- end: Social icons -->
                    </div>
                    <div class="col-lg-6">
                        <div class="copyright-text text-center">© 2019 POLO - Responsive Multi-Purpose HTML5 Template. All Rights Reserved.<a href="//www.inspiro-media.com" target="_blank" rel="noopener">INSPIRO</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end: Footer -->
</div>
<!-- end: Body Inner -->
<!-- Scroll top -->
<a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
<!--Plugins-->
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/plugins.js')}}"></script>
<!--Template functions-->
<script src="{{asset('/js/functions.js')}}"></script>
</body>

</html>

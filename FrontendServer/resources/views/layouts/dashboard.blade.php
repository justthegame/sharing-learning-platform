<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Sharing Learning Platform</title>
        <link href="{{asset('lib/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <link href="{{asset('lib/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <script src="{{asset('lib/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/js//jquery.leanModal.min.js')}}"></script>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->

    </head>
    <body>
        <!-- header-section-starts -->
        <div class="container">	
            <div class="news-paper">
                <div class="header">
                    <div class="header-left">
                        <div class="logo">
                            <a href="#">
                                <h6>the</h6>
                                <h1>SL <span>Platform</span></h1>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="header-right">
                        <div class="top-menu">
                            <ul>        
                                <li><a href="{{route('home')}}">Home</a></li> |  
                                @if(Auth::id())
                                <li><a href="{{route('showArticle')}}">My Article
                                    </a></li> 
                                |
                                <li><a href="{{route('showConversation')}}">My Conversation
                                    </a></li> 
                                |
                                <li>
                                    {{ Auth::user()->name }}
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                        (Logout)
                                    </a>
                                </li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                @else
                                <li><a id="modal_trigger" href="#modal" class="btn1">Login / Register</a>

                                    <div id="modal" class="popupContainer" style="display:none;">
                                        <header class="popupHeader">
                                            <span class="header_title">Login</span>
                                            <span class="modal_close"><i class="fa fa-times"></i></span>
                                        </header>

                                        <section class="popupBody">
                                            <!-- Social Login -->
                                            <div class="social_login">
                                                <div class="">
                                                    <div id="fb-root">
                                                        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false">

                                                        </div>
                                                    </div>

                                                    <a href="#" class="social_box google">
                                                        <span class="icon"><i class="fa fa-google-plus"></i></span>
                                                        <span class="icon_title">Connect with Google</span>
                                                    </a>
                                                </div>

                                                <div class="centeredText">
                                                    <span>Or use your Email address</span>
                                                </div>

                                                <div class="action_btns">
                                                    <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                                                    <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
                                                </div>
                                            </div>

                                            <!-- Username & Password Login form -->
                                            <div class="user_login">
                                                <form class="form-horizontal" id="loginform" method="POST" action="{{ route('login') }}">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                        <div class="col-md-8">
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                            @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-4 control-label">Password</label>

                                                        <div class="col-md-8">
                                                            <input id="password" type="password" class="form-control" name="password" required>

                                                            @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8">
                                                            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                            <div class="one_half last"><a href="#" class="btn btn_red" id="submitloginform">Login</a></div>


                                                            <a class="forgot_password" href="{{ route('password.request') }}">
                                                                Forgot Your Password?
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                            <!-- Register Form -->
                                            <div class="user_register">
                                                <form class="form-horizontal" method="POST" action="{{ route('register') }}" id="registerform">
                                                    {{ csrf_field() }}

                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                        <label for="name" class="col-md-4 control-label">Name</label>

                                                        <div class="col-md-8">
                                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                            @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                        <div class="col-md-8">
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                            @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <label for="password" class="col-md-4 control-label">Password</label>

                                                        <div class="col-md-8">
                                                            <input id="password" type="password" class="form-control" name="password" required>

                                                            @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                        <div class="col-md-8">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-8">
                                                            <div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
                                                            <div class="one_half last"><a href="#" id="submitregisterform" class="btn btn_red">Register</a></div>


                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </section>
                                    </div>

                                    <script type="text/javascript">
                                        (function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id))
                                                    return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=1764813267088197';
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                        
                                        window.fbAsyncInit = function () {
                                            FB.init({
                                            appId: '375762162847338',
                                                    cookie: true,
                                                    xfbml: true,
                                                    version: 'v2.11'
                                            });
                                            FB.AppEvents.logPageView();
                                            FB.getLoginStatus(function (response) {
                                                statusChangeCallback(response);
                                            });
                                        };
                                        
                                        (function (d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) {
                                                return;
                                            }
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "https://connect.facebook.net/en_US/sdk.js";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                        
                                        $("#modal_trigger").leanModal({top: 200, overlay: 0.6, closeButton: ".modal_close"});
                                        $(function () {
                                            // Calling Login Form
                                            $("#login_form").click(function () {
                                                $(".social_login").hide();
                                                $(".user_login").show();
                                                return false;
                                            });
                                            // Calling Register Form
                                            $("#register_form").click(function () {
                                                $(".social_login").hide();
                                                $(".user_register").show();
                                                $(".header_title").text('Register');
                                                return false;
                                            });
                                            $("#submitregisterform").click(function (e) {
                                                e.preventDefault();
                                                $("#registerform").submit();
                                            });

                                            $("#submitloginform").click(function (e) {
                                                e.preventDefault();
                                                $("#loginform").submit();
                                            });
                                            // Going back to Social Forms
                                            $(".back_btn").click(function () {
                                                $(".user_login").hide();
                                                $(".user_register").hide();
                                                $(".social_login").show();
                                                $(".header_title").text('Login');
                                                return false;
                                            });
                                        })
                                    </script></li>
                                @endif
                            </ul>
                        </div>
                        <!---pop-up-box---->  
                        <link href="{{asset('lib/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>
                        <script src="{{asset('lib/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
                        <!---//pop-up-box---->
                        <div id="small-dialog1" class="mfp-hide">
                            <div class="signup">
                                <h3>Subscribe</h3>
                                <h4>Enter Your Valid E-mail</h4>
                                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') { this.value = ''; }" />
                                <div class="clearfix"></div>
                                <input type="submit"  value="Subscribe Now"/>
                            </div>
                        </div>	

                        <script>
                            $(document).ready(function () {
                            $('.popup-with-zoom-anim').magnificPopup({
                            type: 'inline',
                                    fixedContentPos: false,
                                    fixedBgPos: true,
                                    overflowY: 'auto',
                                    closeBtnInside: true,
                                    preloader: false,
                                    midClick: true,
                                    removalDelay: 300,
                                    mainClass: 'my-mfp-zoom-in'
                            });
                            });
                        </script>	
                        <div class="search">
                            <form>
                                <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = '';
                                    }"/>
                                <input type="submit" value="">
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <span class="menu"></span>
                <div class="menu-strip">
                    <ul>
                        @foreach($categoriesForHeader as $category)
                        <li><a href="{{ route('news', ['category' => $category['name']]) }}">{{$category['name']}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- script for menu -->
                <script>
                    $("span.menu").click(function () {
                    $(".menu-strip").slideToggle("slow", function () {
                    // Animation complete.
                    });
                    });
                </script>
                <!-- script for menu -->
                <div class="clearfix"></div>
                <div class="main-content">
                    <div class="col-md-9 total-news">
                        @yield("slider-content")

                        <div class="tech-news">
                            <div class="main-title-head">
                                <h3>Recent     Articles</h3>
                                <!--<a href="singlepage.html">More  +</a>-->
                                <div class="clearfix"></div>
                            </div>	
                            <div class="tech-news-grids">
                                @yield("article-section")
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>	
                    </div>
                </div>
                <div class="col-md-3 side-bar">
                    <!--<div class="sign_up text-center">
                        <h3>Sign  Up  for  Join  Our  Community</h3>
                        <p class="sign">Sign up to create articles and conversations!</p>
                        @yield("register-form")
                    </div>
                    <div class="clearfix"></div>-->
                    <div class="popular">
                        <div class="main-title-head">
                            <h5>Daily Conversation</h5>
                            <h4> Most    recent</h4>
                            <div class="clearfix"></div>
                        </div>		
                        <div class="popular-news">
                            @yield("conversation-section")

                            <!--<a class="more" href="singlepage.html">More  +</a>-->
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>	
                <div class="clearfix"></div>
                <div class="footer text-center">
                    <div class="bottom-menu">
                        <ul>                 
                            |
                            @foreach($categoriesForHeader as $category)
                            <li><a href="{{ route('news', ['category' => $category['name']]) }}">{{$category['name']}}</a></li> |
                            @endforeach
                        </ul>
                    </div>
                    <div class="copyright text-center">
                        <p>The News Reporter &copy; 2015 All rights reserved | Template by  <a href="http://w3layouts.com">W3layouts</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
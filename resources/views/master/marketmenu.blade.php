<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{URL::to('apple-touch-icon.png')}}">

        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
        <style>

            body {
                padding-top: 50px;
                padding-bottom: 20px;

            }

            footer{
              position: fixed;
              left: 0;
              bottom: 0;
              width: 100%;
              background-color: grey;
              color: white;
              text-align: left;
              padding:2px;
            }


            h1{
              font-family: 'Times New Roman', Times, serif;
            }
            h2{
              font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
              text-align: center;
            }

            h3{
              text-align: center;
            }
            img.center {
                display: block;
                margin: 0 auto;
            }
        </style>
        <link rel="stylesheet" href="{{URL::to('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/thumbnail.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/clearfix.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/imgmodal.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/sidemenu.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/select2.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/select2.min.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href={{ asset('css/font-awesome.css') }}>
        <script src="{{URL::to('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">E-OKU</a>

        </div>



        <div id="navbar" class="navbar-collapse collapse">

 <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Categories<span class="sr-only">(current)</span></a></li>-->
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="{{route('front.orgmarket')}}">Organization</a></li>
          <li><a href="{{route('product.index')}}">Product</a></li>
          <li><a href="{{route('front.artist')}}">Artist</a></li>
        </ul>
      </li>

        <li><a href="#">About Us</a></li>
        <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Feedback </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li>
        @if (Auth::guard('web')->check())
          <a href="{{route('cartItem.show',Auth::user()->id)}}">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart
                <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty:''}}</span>
          </a>
          @endif
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Account<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
         @if (Auth::guard('web')->check())
            <li><a href="{{route('user.profile')}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('user.ulogout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            @else
            <li><a href="{{route('user.signup')}}"><i class="fa fa-user" aria-hidden="true"></i> SignUp</a></li>
            <li class="divider"></li>
            <li><a href="{{route('user.signin')}}"><i class="fa fa-user" aria-hidden="true"></i> SignIn</a></li>
          @endif
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          @if (Auth::guard('admin')->check())
            <li><a href="{{route('admin.login')}}"><i class="fa fa-user" aria-hidden="true"></i> {{Auth::check() ? Auth::user()->name : 'Account'}}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('admin.alogout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            @else
            <li><a href="{{route('admin.login')}}"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
          @endif
          </ul>
        </li>



      </ul>


        </div><!--/.navbar-collapse -->
      </div>
    </nav>



      @yield('content')
     <footer class="container-fluid ">
        <p>&copy; E-OKU All Right Reserved 2017</p>
     </footer>


    </div> <!-- /container -->
        <script type ="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="https://use.fontawesome.com/0379815565.js"></script>
        <script src="{{URL::to('js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{URL::to('js/socialshare.js')}}"></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

        <!--date script-->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
         $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
         });
        </script>

        <script>
			$(function() {
				Grid.init();
			});
		</script>
        <script src="{{URL::to('js/main.js')}}"></script>
        <script src="{{URL::to('js/modal.js')}}"></script>
        <script src="{{URL::to('js/select2.js')}}"></script>
        <script src="{{URL::to('js/select2.min.js')}}"></script>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
     <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

        
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
    </body>
</html>

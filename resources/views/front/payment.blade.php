@extends('master.marketmenu')

@section('content')

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

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!--This cause drop down function for category and user account does not work-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            }

            button.accordion {
                background-color: #ccc;
                color: #444;
                cursor: pointer;
                padding: 12px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 15px;
                transition: 0.4s;
            }

            button.accordion.active, button.accordion:hover {
                background-color:darkgray;
            }

            div.panel-collapse collapse in{
                padding: 0 18px;
                background-color: white;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.2s ease-out;
            }

            h3{
                padding-left: 15px;
            }

            h4.personalDetails{
                 padding-left: 20px;
            }

            div.personalDetails{
                width:20%;
                padding-left:20px;
            }

            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }

            th {
               background-color:darkgrey;
            }

            th, td {
                padding: 5px;
                text-align: left;
            }

            table#tableConfirmation {
                width: 100%;
            }

            p.grandTotal{
                text-align:right;
                color:limegreen;
                padding-right:15px;
            }

            p.notice{
                padding-left: 15px;
                font-size: 13px;
            }
            div.button{
                padding-right:15px;
                text-align: right;
            }
            button.button{
                background-color:grey;
    border: none;
    color: floralwhite;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
            }

            p.total{
                text-align: right;
                font-size: 20px;
                color:green;
            }

        </style>
        <link rel="stylesheet" href="{{URL::to('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/thumbnail.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/clearfix.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/imgmodal.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/sidemenu.css')}}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
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
          <li><a href="{{route('front.payment')}}">Payment</a></li>
        </ul>
      </li>
        <li><a href="#">About Us</a></li>
        <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Feedback </a></li>

        <!--for testing payment-->
        <li><a href="{{ url('request')}}">Request</a></li>
        <li><a href="{{ url('response')}}">Response</a></li>
        <li><a href="{{ url('requery')}}">Requery</a></li>
        <!--for testing payment-->

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
<!--Header section end-->


<!--Payment section-->
<h3>Checkout</h3>
<div class="panel-group" id="accordion">

    <!------Step 1------->
{{ Form::open(array('route' => 'front.fakepaymentresponse', 'method' => 'get')) }}
  <form id="form" class="panel panel-default" action="{{ route('front.fakepaymentresponse')}}" method="post">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <button class="accordion">Step 1: Billing Details</button>
         </a>
        </h4>
      <br>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="personalDetails">
        <h4>Personal Details</h4>
            <label for="name">Name</label><br>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required><br>
            <label for="email">Email Address</label><br>
            <input type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email" required><br>
            <label for="email">Phone</label><br>
            <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{10}" placeholder="Phone" required><br>

        </div>
      </div>

    <!-------Step 2------->
      <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              <button class="accordion">Step 2: Payment Method</button>
         </a>
        </h4>
      <br>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          <p>Please select one payment method use in this order.</p>
            <input type="radio" name="payment" value="payment" checked> Ipay88 Payment Gateway<br>
        </div>
      </div>

    <!-------Step 3------->
         <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              <button class="accordion">Step 3: Confirmation</button>
         </a>
        </h4>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">

    <!-------Table-------->
        <table id="tableConfirmation" style="width:100%">
        <col style="width:70%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:10%">

<?php

$productName = (isset($_GET['productName']))? $_GET['productName']: "null";
$productPrice = (isset($_GET['productPrice']))? $_GET['productPrice']: "0.00";
$quantity = (isset($_GET['quantity']))? $_GET['quantity']: "0";
$total = (isset($_GET['total']))? $_GET['total']: "0.00";

$total2 = floatval($total);
$total3 = number_format($total2, 2);

?>
             <tr>
                 <th>Product Name</th>
                 <th>Quantity</th>
                 <th>Price</th>
             </tr>
            <tr>
                <td><?php echo($productName); ?></td>
                <input type="hidden" name="productName" value="<?php echo $productName; ?> ">
                <td><?php echo($quantity); ?></td>
                <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
                <td><?php echo($productPrice); ?></td>
                <input type="hidden" name="productPrice" value="<?php echo $productPrice; ?>">
            </tr>
            </table>
    <!------Table ended-------->
        <p class="total">Total: <?php echo($total3); ?></p>
        <input type="hidden" name="total" value="<?php echo $total; ?>">

        </div>
        <img src="image/ipay88.jpg" alt="ipay88" width="95px"; height="104px"; style="padding-left:15px">
        <br>
        <p class="notice">Please note that your payment will be processed by Mobile88 Sdn Bhd.</p>
        <br>
        <div class="button">
        <button type="submit" class="button">Confirm Order</button>

    {!! Form::close() !!}
        </div>
        <br>
    </div>
</form>
</div>

<!--Payment section end-->

<!--Footer section-->
          @yield('content')
     <footer class="container-fluid ">
        <p>&copy; E-OKU All Right Reserved 2017</p>
     </footer>


    <!-- /container -->
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
    </body>
</html>
@endsection

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
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
               
            }
            footer{
                  background-color: #555;
                  color: white;
                  padding: 25px;
    
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
            
            button.accordion:after {
                content: '\02795'; /* Unicode character for "plus" sign (+) */
                font-size: 13px;
                color: #777;
                float: right;
                margin-left: 5px;
            }
            button.accordion.active:after {
                content: "\2796"; /* Unicode character for "minus" sign (-) */
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
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
 <!--Header section-->
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
          <a class="navbar-brand" href="{{ url('/')}}">E-OKU</a>
        
        </div>
        <div id="navbar" class="navbar-collapse collapse">

 <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Categories<span class="sr-only">(current)</span></a></li>-->
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <li><a href="{{route('front.orgmarket')}}">Organization</a></li>
          <li><a href="{{route('front.product')}}">Product</a></li>
          <li><a href="{{ url('/payment')}}">Payment</a></li>
          </ul>
        </li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Feedback</a></li>
        <li><a href="{{ url('payment')}}">Checkout</a></li>

      </ul>

          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    
    <!-- #region Jssor Slider Begin -->
    <script src="js/jssor.slider-24.1.5.min.js" type="text/javascript"></script>
    <style>
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('../image/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }
        /* jssor slider arrow navigator skin 12 css */
        /*
        .jssora12l                  (normal)
        .jssora12r                  (normal)
        .jssora12l:hover            (normal mouseover)
        .jssora12r:hover            (normal mouseover)
        .jssora12l.jssora12ldn      (mousedown)
        .jssora12r.jssora12rdn      (mousedown)
        */
        .jssora12l, .jssora12r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 30px;
            height: 46px;
            cursor: pointer;
            background: url('../image/a12.png') no-repeat;
            overflow: hidden;
        }
        .jssora12l { background-position: -16px -37px; }
        .jssora12r { background-position: -75px -37px; }
        .jssora12l:hover { background-position: -136px -37px; }
        .jssora12r:hover { background-position: -195px -37px; }
        .jssora12l.jssora12ldn { background-position: -256px -37px; }
        .jssora12r.jssora12rdn { background-position: -315px -37px; }
    </style>
        
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;overflow:hidden;visibility:hidden;">
        
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
    </div>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->
<!--Header section end-->

        
<!--Payment section-->
<h3>Checkout</h3>

<div class="panel-group" id="accordion">
  
  <form class="panel panel-default">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              <button class="accordion">Step 1: Billing Details</button>
         </a>
        </h4>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div class="personalDetails">
        <h4>Personal Details</h4>
            <label for="name">Name</label><br>
            <input type="text" class="form-control" id="name" placeholder="Name"><br>
            <label for="email">Email Address</label><br>
            <input type="text" class="form-control" id="email" placeholder="Email"><br>
            <label for="email">Phone</label><br>
            <input type="text" class="form-control" id="phone" placeholder="Phone"><br>
        </div>
      </div>
  </form>
    
    <form class="panel panel-default">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              <button class="accordion">Step 2: Payment Method</button>
         </a>
        </h4>
      <div id="collapseTwo" class="panel-collapse collapse">
        <div class="panel-body">
          <p>Please select one payment method use in this order.</p>
            <input type="radio" name="payment" value="payment" checked> Ipay88 Payment Gateway<br>
        </div>
      </div>
  </form>
    
    <form class="panel panel-default">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              <button class="accordion">Step 3: Confirmation</button>
         </a>
        </h4>
      <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
            
         <table id="tableConfirmation" style="width:100%">
        <col style="width:75%">
        <col style="width:5%">
        <col style="width:10%">
        <col style="width:10%">
            
             <tr>
                 <th>Product Name</th>
                 <th>Quantity</th> 
                 <th>Price</th>
                 <th>Total</th>
             </tr>
             <tr>
                 <td>Test1</td>
                 <td>1</td> 
                 <td>RM50.00</td>
                 <td>RM50.00</td>
             </tr>
             <tr>
                 <td>Test2</td>
                 <td>3</td> 
                 <td>RM20.00</td>
                 <td>RM60.00</td>
             </tr>
             <tr>
                 <td>Test3</td>
                 <td>2</td> 
                 <td>RM10.00</td>
                 <td>RM20.00</td>
             </tr>            
            </table>
          </div>
          <p class="grandTotal">Grand Total: RM130.00</p>
        <img src="image/ipay88.jpg" alt="ipay88" width="95px"; height="104px"; style="padding-left:15px">
          <br>
          <br>
          <p class="notice">Please note that your payment will be processed by Mobile88 Sdn Bhd.</p>
          <br>
        </div>
  </form>
    
</div>   
    
  <script>
      var acc = document.getElementsByClassName("accordion");
      var i;
      for (i = 0; i < acc.length; i++) {
          acc[i].onclick = function() {
              this.classList.toggle("active");
              var panel = this.nextElementSibling;
              if (panel.style.maxHeight){
                  panel.style.maxHeight = null;
              } else {
                  panel.style.maxHeight = panel.scrollHeight + "px";
              } 
          }
      }
</script>
          
<!--Payment section end-->
       
        
<!--Footer section-->   
      <footer class="container-fluid ">	
        <p>&copy; E-OKU All Right Reserved 2017</p>
      </footer>

     <!-- /container -->        
        <script type ="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
        
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
<!--Footer section end--> 
</html>
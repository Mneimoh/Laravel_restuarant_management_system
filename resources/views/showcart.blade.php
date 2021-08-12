<!DOCTYPE html>
<html lang="en">

  <head>

  	<base href="/public">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    
    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            <li class="scroll-to-section" style="background-color: red;">
                                
                                @auth
                                <a href="{{url('/showcart',Auth::user()->id)}}">
                                    Cart[{{$count}}]
                                </a>
                                @endauth

                                @guest
                                Cart[0]
                                @endguest
                            </li> 
                            @if (Route::has('login'))
                                <li class="scroll-to-section">
                                
                                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                        @auth
	                                        <li>
	                                            <x-app-layout>
	                                            </x-app-layout>
	                                        </li>
                                        @else
                                            <li class="scroll-to-section"><a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

                                            @if (Route::has('register'))
                                                <li  class="scroll-to-section"><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                                            @endif
                                        @endauth
                                    </div>
                               
                                </li>
                            @endif
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- partial -->
    <form class="forms-sample" action="{{ url('/orderconfirm') }}" method="POST">
     @csrf
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Cart Page </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  
                </ol>
              </nav>
            </div>
            <div id="top">
            <div class="row">
            	<div class="col-lg-1"></div>
    			<div align="center" class="col-lg-10 grid-margin stretch-card">
             	<div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cart table</h4>
                    <div class="table-responsive">
                      <table class="table table-dark">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> Food Name </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Action </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          	$sn = 0;
                          ?>
                          @foreach($cartdata as $cart)
                          	<?php
                          		$sn += 1;
                          	?>
	                        <tr>
		                        <td> {{$sn}} </td>
		                        <td> 
		                        	<input type="text" name="foodname[]" value="{{$cart->title}}" hidden="">
		                        	{{$cart->title}} 
		                        </td>
		                        <td>
		                        	<input type="num" name="price[]" value="{{$cart->price}}" hidden=""> 
		                        	${{$cart->price}} 
		                        </td>
	                            <td>
	                            	<input type="num" name="quantity[]" value="{{$cart->quantity}}" hidden="">
	                            	{{$cart->quantity}} 
	                            </td>
	                            <td> 
	                        	<a href="{{url('/deletecart',$cart->cart_id)}}" ><label class="btn btn-danger" style="cursor: pointer;">Remove</label></a> </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div align="center" style="padding: 20px;">
                		<button id="order" type="button" class="btn btn-primary">Order Now</button>
                	  </div>
                    </div>
                  </div>
                </div>
                
            	</div>   
        	</div>
        	<div id="appear" class="row" style="padding: 10px; display: none;" >
            	<div class="col-lg-1"></div>
    			<div align="center" class="col-lg-10 grid-margin stretch-card">
                <div class="card" style="background-color: #101010d4; color: #fff;">
                  <div class="card-body">
                    <h4 class="card-title">Order Form</h4>
                    
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Phone</label>
                        <input type="num" name="phone" class="form-control" id="exampleInputPassword4" placeholder="Phone" required>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputPassword4" placeholder="Address" required>
                      </div>
                      <button type="submit" class="btn btn-success mr-2">Order Confirm</button>
                      <button id="close" type="button" class="btn btn-danger">Close</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


    <!-- jQuery -->
    <script type="text/javascript">

    	$("#order").click(
    		function(){
    			$("#appear").show();
    		}
    	);

    	$("#close").click(
    		function(){
    			$("#appear").hide();
    		}
    	);

    </script>
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>
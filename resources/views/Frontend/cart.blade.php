<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
    <link href="{{('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{('Frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('Frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('Frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{('Frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{('Frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{('Frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{('Frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('Frontend/images/ico/apple-touch-icon-144-precomposed.cartcartpng')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('Frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('Frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('Frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
   
    @guest
  		<div class="container text-center">
			<div class="content-404">
				<img src="{{ asset('images/cart/cart-empty.jpg') }}" class="img-responsive" width="30%" alt="" />
				<p><b>OPPS!</b>Looks like you're not logged in!</p>
				<p>Login to add items in your cart or click on the logo to return to our home page.</p>
				<h2><a href="{{ url('/login') }}">Login</a></h2>
			</div>
        <br>
	</div>
  	@endguest
  	@auth
 
        
  	 	{{Cart::restore(Auth()->user()->email)}}
    
    <body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			@if(session()->has('success'))
			   <div class="alert alert success">
			   	{{session()->get('success')}}
			   </div>
			   @endif
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{('Frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{route('Wishlistshow')}}"><i class="fa fa-star"></i> Wishlist</a></li>
								@if(Cart::Count() != 0) 
								<li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								@endif
								{{-- <li><a href="login.html"><i class="fa fa-lock"></i> Login</a></li> --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						{{-- <div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html">Home</a></li>
								
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div> --}}
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('home')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			@if(Cart::Count() == 0) 
			 <div class="container">
        <h3 class="text-center">YOUR CART IS EMPTY</h3>
        <p class="text-center">CHECKOUT FROM OUR GREAT COLLECTION</p>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>
 
			@endif
			
			@if(Cart::Count() > 0) 
			
            
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td>Size</td>
							<td class="quantity">Quantity</td>
							
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						@foreach(Cart::content() as $item)
						<tr>
							
							<td class="cart_product">
							<a href=""><img src='{{ asset("upload/".$item->options->img)}}' alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->name}}s</a></h4>
								{{-- <p>{{$item->options->img[0]}}</p> --}}
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->options->size}}</a></h4>
								{{-- <p>{{$item->options->img[0]}}</p> --}}
							</td>
							
							 <td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{route('cart.update',$item->rowId)}}" method="post">
										@csrf
										@method('PUT')
										<input class="cart_quantity_input" type="hidden" name="qtyadd" value="{{$item->qty}}" autocomplete="off" size="7">
								
									<a class="cart_quantity_up" href=""><button   type="submit"> + </button></a>
								     </form>
									
									<input class="cart_quantity_input" type="fix" name="qty" value="{{$item->qty}}" autocomplete="off" size="5" readonly>
								
                                    <form action="{{route('cart.edit',$item->rowId)}}" method="post">
										@csrf
										@method('GET')
										<input class="cart_quantity_input" type="hidden" name="qtyremove" value="{{$item->qty}}" autocomplete="off" size="7">
								
									<a class="cart_quantity_up" href=""><button  type="submit"> - </button></a>
								   
								</form>
								</div>
							</td>
							<td class="cart_delete">
							<form method="post" action="{{route('cart.destroy',$item->rowId)}}">
								@csrf
								@method('DELETE')
							
								<button type="submit" class="cart_quantity_delete"><i class="fa fa-times"></i></button>
							</form>
							</td>
						
						</tr>
                        @endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
  	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-12">

					<div class="total_area">
                        <ul>
                            <li><form action="{{route('Coupon')}}" method="POST" class="searchform">
                                @csrf
                                @method('POST')
                                <input type="text" name="Coupon" placeholder="Apply Coupon code" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                              <p>Get the Discount</p>

                            </form></li>
                            <li>Cart Sub Total <span>INR {{Cart::subtotal()}}</span></li>
                            {{-- <li>Eco Tax <span>INR {{Cart::tax()}}</span></li> --}}
                             {{-- <li>Shipping Cost <span> {{(Cart::subtotal() < 1000) ? 'Free' : 'INR 100'}}</span></li> --}}
                            @if(session()->has('Coupon'))
                            <li> Discount ({{session()->get('Coupon')['name']}}) <span>INR {{session()->get('Coupon')['discount']}}</span>
                            <form action="{{route('Coupon.destroy')}}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            
                            <button type="submit">Remove</button></form></li>
                            <li>New subtotatal<span>INR {{$newsubtotal}}</span></li>
                            

                            @endif
                            <li>Tax<span>INR {{$newTax}}</span></li>
                            <li>New Total <span>INR {{$newtotal}}</span></li>
                    
                            {{-- <li>Total <span>INR {{Cart::total()}}</span></li> --}}
                        </ul>
                            <a class="btn btn-default check_out" href="{{url('/checkout')}}">Order Preview</a>
                    </div>
    
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@endif
	

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('Frontend/images/home/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('Frontend/images/home/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('Frontend/images/home/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('Frontend/images/home/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{('Frontend/images/home/map.png')}}" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	


    <script src="{{('Frontend/js/jquery.js')}}"></script>
	<script src="{{('Frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{('Frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{('Frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{('Frontend/js/main.js')}}"></script>
</body>
</html>
@endauth
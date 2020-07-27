<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('Frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/responsive.css')}}" rel="stylesheet">
    <script src="{{asset('https://js.stripe.com/v3/')}}"></script>

  <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
  {{-- <script src="{{asset('ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js')}}"></script>        --}}
    <link rel="shortcut icon" href="{{asset('Frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('Frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('Frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('Frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('Frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
 

</head><!--/head-->


<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{asset('Frontend/images/home/logo.png')}}" alt="" /></a>
                        </div>
                       
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                

                                <li><a href="{{route('account')}}"><i class="fa fa-user"></i> {{ isset(Auth::user()->name ) ? Auth::user()->name : "user"}}</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                               {{--  <li><a href="{{asset('checkout.html')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                               --}} 
                                <li><a href="{{route('cart.index')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                               
                               <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><i class="fa fa-lock"></i> Logout</a></li>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
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
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                               
                            </ul>
                        </div>
                    </div>
                  </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

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
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('home')}}">Home</a></li>
				  <li class="active">Review Order</li>
				</ol>
			</div>
			<div class="col-sm-7">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						@foreach(Cart::content() as $item)
						<tr>
							
							<td class="cart_product">
							<a href=""><img name="product_image" width="75" height="75" src='{{ asset("upload/".$item->options->img)}}' alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->name}}</a></h4>
								{{-- <p>{{$item->options->img[0]}}</p> --}}
							</td>
							<td class="cart_price">
								<p>{{$item->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
								<input class="cart_quantity_input" type="fix" name="qty" value="{{$item->qty}}" autocomplete="off" size="5" readonly>
								
                                    
									{{-- <a class="cart_quantity_up" href=""><button  type="submit"> - </button></a> --}}
								   
								
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$item->total}}</p>
							</td>
							
						</tr>
                        @endforeach
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-sm-5">
			 <div class="signup-form"><!--sign up form-->
			 	        <legend>Shipping To</legend>
                        <div class="form-group {{$errors->has('shipping_name')?'has-error':''}}">
                            <input type="text" class="form-control" name="shipping_name" id="shipping_name" value="{{$address->name}}" placeholder="Shipping Name" readonly>
                            <span class="text-danger">{{$errors->first('shipping_name')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('shipping_address')?'has-error':''}}">
                            <input type="text" class="form-control" value="{{$address->address}}" name="shipping_address" id="shipping_address" placeholder="Shipping Address" readonly>
                            <span class="text-danger">{{$errors->first('shipping_address')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('shipping_city')?'has-error':''}}">
                            <input type="text" class="form-control" name="shipping_city" value="{{$address->city}}" id="shipping_city" placeholder="Shipping City" readonly>
                            <span class="text-danger">{{$errors->first('shipping_city')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('shipping_state')?'has-error':''}}">
                            <input type="text" class="form-control" name="shipping_state" value="{{$address->state}}" id="shipping_state" placeholder="Shipping State" readonly>
                            <span class="text-danger">{{$errors->first('shipping_state')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('shipping_pincode')?'has-error':''}}">
                            <input type="text" class="form-control" name="shipping_pincode" value="{{$address->pincode}}" id="shipping_pincode" placeholder="Shipping Pincode" readonly>
                            <span class="text-danger">{{$errors->first('shipping_pincode')}}</span>
                        </div>
                        <div class="form-group {{$errors->has('shipping_mobile')?'has-error':''}}">
                            <input type="text" class="form-control" name="shipping_mobile" value="{{$address->mobile}}" id="shipping_mobile" placeholder="Shipping Mobile" readonly>
                            <span class="text-danger">{{$errors->first('shipping_mobile')}}</span>
                        </div>

               </div>
		  </div>
		<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>

			</div>
			{{-- {!! session()->get('error') !!}  --}}
						@if ($errors->any())
			      <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			              <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			      </div><br />
			    @endif

			<div class="row">
				{{-- <form id="payment-form" method="POST" action="#"> --}}
			 	
				<form id="payment-form" method="POST" action="{{route('order.store')}}">
			 		@csrf
			 		@method('POST')
			 		 @if(session()->has('Coupon'))
                     <input type="hidden" name="coupon_code" value="{{session()->get('Coupon')['name']}}">
				     {{-- <input type="hidden" name="coupon_amount" value="{{session()->get('Coupon')['discount']}}"> --}}
				    @endif
                            
				    <input type="hidden" name="name" value="{{$address->name}}">
				    <input type="hidden" name="address" value="{{$address->address}}">
				    <input type="hidden" name="city" value="{{$address->city}}">
				    <input type="hidden" name="pincode" value="{{$address->pincode}}">
				    <input type="hidden" name="mobile" value="{{$address->mobile}}">
				    <input type="hidden" name="state" value="{{$address->name}}">
				    {{-- <input type="hidden" name="Totalpayment" value="{{$newtotal}}"> --}}
				    <input type="hidden" name="users_id" value="{{Auth::user()->id}}">
				    <input type="hidden" name="users_email" value="{{Auth::user()->email}}">
				    <input type="hidden" name="grand_total" value="{{$newtotal}}">
                    
                    
                       @foreach(Cart::content() as $item)
                       <input type="hidden" name="product_id[]" value="{{$item->id}}">
                       <input type="hidden" name="product_name[]" value="{{$item->name}}">
                       <input type="hidden" name="product_qty[]" value="{{$item->qty}}">
                       @endforeach
						
			    <div class="col-sm-12">
                    
					<div class="total_area">
						<ul>
						    
						   <li>Cart Sub Total <span>INR {{Cart::subtotal()}}</span></li>
							{{-- <li>Eco Tax <span>INR {{Cart::tax()}}</span></li> --}}
						     {{-- <li>Shipping Cost <span> {{(Cart::subtotal() < 1000) ? 'Free' : 'INR 100'}}</span></li> --}}
							{{-- @if(session()->has('Coupon')) --}}
							
							{{-- <li> Discount ({{session()->get('Coupon')['name']}}) <span>INR {{session()->get('Coupon')['discount']}}</span>
							<form action="{{route('Coupon.destroy')}}" method="POST" style="display: inline;">
							@csrf
							@method('delete')
							
							<button type="submit">Remove</button></form></li>
							 --}}
							 {{-- <li>New subtotatal<span>INR {{$newsubtotal}}</span></li> --}}
							

							{{-- @endif --}}
							<li>Tax<span>INR {{$newTax}}</span></li>
							<li>Total<span>INR {{$newtotal}}</span></li>
							<li>SELECT PAYMENT</li>
							<li>Cash On Delivery<span><input type="radio" onclick="javascript:yesnoCheck();" id="cod" name="payment_method" value="COD">
</span></li>                  
                            {{-- <li>PayPal<span><input type="radio" id="pay1"  name="payment_method" value="PayPal">
</span></li> --}}
							{{-- <li>Paytm<span><input type="radio" id="pay2" name="payment_method" value="Paytm">
</span></li> --}}          <li>Stripe<span><input type="radio" onclick="javascript:yesnoCheck();" id="stripe" name="payment_method" value="Stripe">
                           </span></li>
					       <li id="payment" style="display:none;">
					            <label for="card-element">
							      Credit or debit card
							    </label>
							    <div id="card-element">
							  </div>
							  <div id="card-errors" role="alert" class="text-danger"></div>

							 </li>
					    
										
							{{-- <li>Total <span>INR {{Cart::total()}}</span></li> --}}
						</ul>
				       <button type="submit" class="btn btn-default check_out"> To the Payment</button>
				
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	</section> <!--/#cart_items-->
 <script src="{{asset('https://code.jquery.com/jquery-1.12.4.min.js')}}"></script>
 
  
<script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('stripe').checked) {
        document.getElementById('payment').style.display = 'block';
    }
    else document.getElementById('payment').style.display = 'none';

}
</script>
<script>
 
var stripe = Stripe('pk_test_51H7fG9Aqd6wClRAQNf4X0tNAIOxJhP74XxwK6b30WXYqBvGMo0RhboRgGgwDCllPDZZ5AHGmS9tfw7sr0WuPg7gm00NQi965gH');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');


form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
  function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  
  // Submit the form
  form.submit();
}


</script>

@endauth
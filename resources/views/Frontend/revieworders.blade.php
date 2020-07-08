@include('Frontend.header')
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
				<form method="POST" action="{{route('order.store')}}">
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
							<li>Cash On Delivery<span><input type="radio" id="pay" name="payment_method" value="COD">
</span></li>                  
                            <li>PayPal<span><input type="radio" id="pay1"  name="payment_method" value="PayPal">
</span></li>
							<li>Paytm<span><input type="radio" id="pay2" name="payment_method" value="Paytm">
</span></li>
							<li>Stripe<span><input type="radio" id="pay3" name="payment_method" value="Stripe">
</span></li>
					
							{{-- <li>Total <span>INR {{Cart::total()}}</span></li> --}}
						</ul>
				       <button class="btn btn-default check_out" href=""> To the Payment</button>
				
						</form>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	</section> <!--/#cart_items-->
@endauth
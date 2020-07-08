@include('Frontend.header')

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{route('home')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td>Order ID</td>
							<td class="description">Name</td>
							<td>Image</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>ORDER STATUS</td>
							<td>ORDER DETAILS</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						
						@foreach($orders as $item)
							
						<tr>

							<td>
								<h4>{{$item->id}}</h4>
								
							</td>
								
							<td>
								 @foreach($item->products as $pro)
								 @foreach($pro->images as $img)
                                             @if(isset($img->image[0]))
                                            <img height="70" width="70" src="{{ asset("upload/".$img->image)}}" alt="" />
                                        </br>
                                             @break
                                             @endif
                                   @endforeach
                                   @endforeach
                                            
							</td>
							<td class="cart_description">
								@foreach($item->products as $pro)
							
								<h4><a href="{{route('product',$pro->id)}}">{{$pro->Product_name}}</a></h4>
								@endforeach
							
								</td>
							
							<td class="cart_total">
								   @foreach($item->products as $pro)
										<h4><a href=""></a> {{$pro->pivot->quantity}}</h4>
							
							      	
                                   @endforeach
							
								</td>
							
							<td class="cart_total">
								<p class="cart_total_price">{{$item->grand_total}}</p>
							</td>
							<td class="cart_total">
                                <p class="cart_total_price">{{$item->order_status}}</p>
							</td>
							@endforeach
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
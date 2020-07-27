 @foreach($featured_products->chunk(3) as $products)
                         <div class="row">  
                         @foreach($products as $pro)     
                         <div class="col-sm-4">
                           
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                             @foreach($pro->images as $img)
                                                 @if(isset($img->image[0]))
                                                     <img src="{{ asset("upload/".$img->image)}}" alt="" />
                                                    @break
                                                @endif
                                             @endforeach
                                            <h2>{{$pro->Price}}</h2>
                                            <p>{{$pro->Product_name}}</p>
                                            <a href="{{route('product',$pro->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$pro->Price}}</h2>
                                                <p>{{$pro->Product_name}}</p>
                                                <a href="{{route('product',$pro->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                        
                                </div>

                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{route('Wishlist',$pro->id)}}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>

                            </div>
                           </div>
                           @endforeach
                       </div>
                     @endforeach
                 {!! $products->links() !!}

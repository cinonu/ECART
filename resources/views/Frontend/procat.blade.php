                              @foreach($products->chunk(4) as $prod)
                                  <div class="row">  
                              @foreach($prod as $pro)
                                 <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                               <img src="{{ asset("upload/".$pro->image)}}" alt="" />
                                                <h2>{{$pro->Price}}</h2>
                                                <p>{{$pro->Product_name}}</p>
                                                <a href="{{route('product',$pro->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                       
                                </div>

                                @endforeach
                               </div>
                               @endforeach
                              


                            
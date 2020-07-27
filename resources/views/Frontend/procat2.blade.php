                  <?php $d = 0; ?>
                    @foreach($products->chunk(3) as $prod)
                    <?php $counP = $d; ?>
                        <div class="row">  
                            
                             @foreach($prod as $pro)
                             
                              <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                     <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ asset("upload/".$pro->image)}}" alt="" />
                                            <h2>{{$pro->Price}}</h2>
                                            <p>{{$pro->Product_name}}</p>
                                            <a href="{{route('product',$pro->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$pro->Price}}</h2>
                                                <p>{{$pro->Product_name}}</p>
                                                <a href="{{route('product',$pro->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                        
                                </div>

                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li id="wishlist<?php echo $counP ?>"><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <input type="hidden" id="pro_price<?php echo $counP ?>" name="wishlist" value="{{$pro->product_id}}">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                              </div>
                          </div>
                           <?php $counP ++;?>

                      
                        @endforeach
                        <?php $d = $counP;?>
                        </div>
                    @endforeach
                    {!! $products->links() !!}


                              


                            
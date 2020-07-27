
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
    <link rel="stylesheet" type="text/css" href="{{asset('css/algolia.css')}}">
 

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
                               <li><a href="{{route('Wishlistshow')}}"><i class="fa fa-star"></i> Wishlist</a></li>
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
                                <li><a href="{{route('home')}}" class="active">Home</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        {{-- <div class="search_box pull-right">
                            <form action="{{route('search')}}" method="get">
                                @csrf
                                @method('GET')
                            <input type="text" placeholder="Search"/ value="{{request()->input('query')}}" name="query" id = "query">
                            </form>
                        </div> --}}
                        <div class="aa-input-container" id="aa-input-container">
    <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for products...." name="search" autocomplete="off" />
    <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
        <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
    </svg>
</div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

 <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
                        
                        </ol>
                       
                      <div class="carousel-inner">
                            <?php $i=0; ?>
                         
                         @foreach($banner as $banners)
                         
                            <div class="item {{ ($i==0)?'active':'' }}">
                                <div class="col-sm-6">

                                    <h1><span>E</span>-SHOPPER</h1>
                                    <h2>{{ $banners->title }}</h2>
                                    <p>{{ $banners->context }}</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src='{{ asset("upload/".$banners->image)}}' class="girl img-responsive" alt="" />
                                    <img src="{{asset('Frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
                                </div>
                            </div>
                            <?php $i++; ?>
                        
                            @endforeach
                        </div>

                            
                          
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                             @foreach($categories as $cat1)

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('catprowise',$cat1->id)}}">
                                        {{$cat1->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                           </div><!--/category-products-->

                          
                         
                    
                         <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('Frontend/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                         <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('Frontend/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                         <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('Frontend/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                         <div class="shipping text-center"><!--shipping-->
                            <img src="{{asset('Frontend/images/home/shipping.jpg')}}" alt="" />
                        </div><!--/shipping-->
                    
                    
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        @if ($errors->any())
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    Item Added to the Wishlist
</div>
@endif
                        <h2 class="title text-center">Features Items</h2>
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
                        

                        
                       
                        
                    </div>
                    <ul class="pagination">
                        <?php echo $featured_products; ?>
                    </ul><!--features_items-->
             <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <?php $i=0; ?>
                            <input type="hidden" id="test_id" class="test_class" name="test_name" value="test">
                            <ul class="nav nav-tabs">
                                @foreach($category as $cat)
                                <li class="{{ ($i==0)?'active':'' }}" id="cat{{$cat->id}}" value="{{$cat->id}}" ><a  href="#tshirt" data-toggle="tab">{{$cat->category_name}}</a>
                                </li>
                                <?php $i++; ?>
                                @endforeach
                            </ul>

                        </div>
                       
                     
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="{{-- {{$cat2->category_name}} --}}" >
                                <div id="productData">
                                 @foreach($item->chunk(4) as $rot)
                                 <div class="row">
                                 @foreach($rot as $tor)
                                 <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                 @foreach($tor->images as $img)
                                             @if(isset($img->image[0]))
                                            <img src="{{ asset("upload/".$img->image)}}" alt="" />
                                             @break
                                             @endif
                                            @endforeach
                                            
                                                <h2>{{$tor->Price}}</h2>
                                                <p>{{$tor->Product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                       
                                </div>

                                @endforeach
                                </div>
                                @endforeach 
                                </div>
                        </div>
                    </div>
              </div><!--/category-tab-->
                       
                       
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">   
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('Frontend/images/home/recommend1.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('Frontend/images/home/recommend2.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('Frontend/images/home/recommend3.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">  
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('Frontend/images/home/recommend1.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('Frontend/images/home/recommend2.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="{{asset('Frontend/images/home/recommend3.jpg')}}" alt="" />
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a>          
                        </div>
                    </div><!--/recommended_items-->
                    
                </div>
            </div>
        </div>
   </section>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js')}}"></script>
   <script src="{{asset('https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js')}}"></script>
    <script src="{{asset('js/algolia.js')}}"></script>
   
@include('Frontend.ourjs');
@include('Frontend.footer');
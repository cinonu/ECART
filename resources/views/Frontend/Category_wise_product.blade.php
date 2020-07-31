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
                                {{-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="{{route('productlist')}}">Products</a></li>
                                        <li><a href="{{route('product')}}">Product Details</a></li> 
                                        <li><a href="checkout.html">Checkout</a></li> 
                                        <li><a href="cart.html">Cart</a></li> 
                                        <li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
                                 --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                                                               <div class="aa-input-container" id="aa-input-container">
    <input type="search" id="aa-search-input" class="aa-input-search" placeholder="Search for products...." name="search" autocomplete="off" />
    <svg class="aa-input-icon" viewBox="654 -372 1664 1664">
        <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
    </svg>
</div>
  
                        {{-- <div class="search_box pull-right">
                          <form action="{{route('search')}}" method="get">
                                @csrf
                                @method('GET')
                            <input type="text" placeholder="Search"/ value="{{request()->input('query')}}" name="query" id = "query">
                            </form>
                        </div> --}}
                    </div>
   
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    <section>      
    	<div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                              
                            <div class="panel panel-default">
                                <div class="panel-heading">
                               
                                @foreach($category as $cat1)
                                 <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('catprowise',$cat1->id)}}" @if(isset($categoryname) && $cat1->category_name == $categoryname) style="color:#FC992B" @endif >
                                        {{$cat1->category_name}}</a></h4>
                                </div>
                              </div>
                           
                              {{--   <div class="panel-heading">
                                  <a href="{{route('catprowise',$cat1->id)}}" @if(isset($categoryname) && $cat1->category_name == $categoryname) style="color:#FC992B" @endif > <h4 class="panel-title">{{$cat1->category_name}}</h4></a>
                                </div>
                               --}}  @endforeach
                          
                               
                             {{-- <a href="#">shirts</a></h4> --}}
                             </ul>
                                </div>
                            </div>
                           </div><!--/category-products-->
                    
                        
                        <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							 <div class="well text-center">
								 <input   type="text" class="span2" value="" data-slider-min="0" data-slider-max="10000" data-slider-step="5" data-slider-value="[2500,4500]" id="sl2" ><br/>
								 <b class="pull-left">INR 0</b><b class="pull-right">INR 10000</b>

							 </div>
						</div><!--/price-range-->
						
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
 <div class="alert alert-success" style="display:none">
      <button type="button" class="close" data-dismiss="alert">×</button> 
  
    {{ Session::get('success') }}
</div>
                        <h2 class="title text-center">Products </h2>
                         <div id="tag_container">
                         @include('Frontend.procat2')
                        </div>
                    </div>      
                </div>
        </div>
      </div>
  </section>

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
                                        <img src="{{asset('Frontend/images/home/iframe1.png')}}" alt="" />
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
                                        <img src="{{asset('Frontend/images/home/iframe2.png')}}" alt="" />
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
                                        <img src="{{asset('Frontend/images/home/iframe3.png')}}" alt="" />
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
                                        <img src="{{asset('Frontend/images/home/iframe4.png')}}" alt="" />
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
                            <img src="{{asset('Frontend/images/home/map.png')}}" alt="" />
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
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">T-Shirt</a></li>
                                <li><a href="#">Mens</a></li>
                                <li><a href="#">Womens</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Shoes</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
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
 </footer>

  
    <script src="{{asset('Frontend/js/jquery.js')}}"></script>
    <script src="{{asset('Frontend/js/bootstrap.min.js')}}"></scriptweb>
    <script src="{{asset('Frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('Frontend/js/price-range.js')}}"></script>
    <script src="{{asset('Frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('Frontend/js/main.js')}}"></script>
    <script >

  </script>
  <script>
     $('.tooltip-inner').bind('DOMSubtreeModified', function(){
   var p = $(".tooltip-inner").text();
	   var full_url = document.URL; // Get current url
    	var url_array = full_url.split('/'); // Split the string into an array with / as separator
    	var last_segment = url_array[url_array.length-1];  // Get the last part of the array (-1)
	  // alert(p);
	  $.ajax({
        type:'get',
        dataType:'html',
        url:'{{url('ajaxdata')}}',
        data:{p:p , id : last_segment},
        // success:function(response){
        //  $("#filter-price-range").html(response);
        //  }
        }).done(function(data){
         $("#tag_container").empty().html(data);
        }).fail(function(jqXHR, ajaxOptions, thrownError){

              // alert('No response from server');
        });

	});

    // $(window).on('hashchange', function() {
    //     if (window.location.hash) {
    //         var page = window.location.hash.replace('#', '');
    //         if (page == Number.NaN || page <= 0) {
    //             return false;
    //         }else{
    //             getData(page);
    //         }
    //     }
    // });
    
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');
            // var page=$(this).attr('href').split('page=')[1];
  
            getData(myurl);
        });
  
    });
  
    function getData(myurl){
         var p = $(".tooltip-inner").text();
         var full_url = document.URL; // Get current url
         var url_array = full_url.split('/'); // Split the string into an array with / as separator
         var last_segment = url_array[url_array.length-1];  // Get the last part of the array (-1)
        $.ajax(
        {
            url: myurl,
            type: "get",
            datatype: "html",
          data:{p:p , id : last_segment},
        }).done(function(data){
            $("#tag_container").empty().html(data);
          
        }).fail(function(jqXHR, ajaxOptions, thrownError){

              alert('No response from server');
        });
    }
  <?php $maxp = count($products); for($i=0;$i<$maxp;$i++) { ?>
   $(document).on("click", '#wishlist<?php echo $i;?>', function(event) { 
    var pro_id<?php echo $i;?> = $('#pro_price<?php echo $i;?>').val();

   
    event.preventDefault();
  
    $.ajax({
        type : 'get',
        dataType : 'html',
        data:{id:pro_id<?php echo $i;?>},
        url : '{{url('Wishl/id')}}',
        success: function (response) {
            console.log('response', response);
            $(".alert-success").css("display", "block");
            $(".alert-success").append("<P>Item Added to the Wishlist");
        }
      
    }) 
 
});
    <?php } ?>

    
</script>
  <script src="{{asset('https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js')}}"></script>
       <script src="{{asset('js/algolia1.js')}}"></script>
 </body>
</html>

   $('mydiv').bind('DOMSubtreeModified', function(){
  console.log('changed');
});
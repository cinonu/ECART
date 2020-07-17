@include('Frontend.header')

@foreach($page as $item)
 <div class="container">
        <h3 class="text-center">{{$item->title}}</h3>
        <p class="text-center">Thanks for your Order that use Options on Cash On Delivery</p>
        <p class="text-center">We will contact you by Your Email <?php echo "$item->body" ?>
           </p>
    </div>
  <div style="margin-bottom: 20px;"></div>

@endforeach
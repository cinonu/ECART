@extends('admin')
@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <ul class=" nav flex-column nav-tabs nav-pills bg-white">
              <li class="nav-item">
                <a class="nav-link active" href="{{ url('/admin/product') }}">General</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Attributes Values</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">Add Attribute</a>
              </li>
              
             </ul>
            </div>
          </div> 
         <div class="col-md-8" >
             <div class="card">
            <form action="{{ route('image',$product->id) }}" method="POST" enctype="multipart/form-data" id="form">
              @csrf
                 <div class="form-group">
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <label for="Image">Image:</label>
                <input type="file" class="form-control" id="image"placeholder="Select Image" name="Image" multiple>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>

           
  <div class="card p-3"> 
          @foreach($product->images as $image)

           {{-- $parameter= Crypt::encrypt($image->id); --}}
          <div class="card">
           <img src="{{ asset('upload/'.$image->image) }}" height="200px" width="200px"> 
            <form method="POST" action="{{ route('delete',$image->id)}}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
           </form>
          </div>

            @endforeach
         </div>
        </div>

      </div>
    </div>
 @endsection
           
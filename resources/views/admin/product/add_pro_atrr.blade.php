
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
                <a class="nav-link" data-toggle="tab" href="#menu1">Add Attribute</a>
              </li>
              
             </ul>
            </div>
          </div> 
         <div class="col-md-8" >
             <div class="card">
              <form action="{{route('product_attribute.store')}}" method="post" role="form">
                                        <legend>Add Attribute</legend>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <input type="hidden" name="products_id" value="{{$product->id}}">
                                            <input type="text" class="form-control" name="sku" value="{{old('sku')}}" id="sku" placeholder="SKU" required>
                                            <input type="text" class="form-control" name="size" value="{{old('size')}}" id="size" placeholder="Size" required>
                                            <input type="text" class="form-control" name="price" value="{{old('price')}}" id="price" placeholder="Price" required>
                                            <span style="color: red;">{{$errors->first('price')}}</span>
                                            <input type="number" class="form-control" name="stock" value="{{old('stock')}}" id="stock" placeholder="Stock" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                
          </div>
</div>
</div>
               {{-- <h5>List Products Attribute</h5> --}}
                        
                        <div class="widget-content nopadding">
                            <form action="{{route('product_attribute.update',$product->id)}}" method="post" role="form"  display: inline; >
                                {{method_field("PUT")}}
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attributes as $attribute)
                                    <input type="hidden" name="id[]" value="{{$attribute->id}}">
                                <tr>
                                    <td class="taskDesc">
                                        <input type="text" name="sku[]" id="sku" class="form-control" value="{{$attribute->sku}}" required="required" style="width: 75px;">
                                    </td>
                                    <td class="taskStatus">
                                        <input type="text" name="size[]" id="size" class="form-control" value="{{$attribute->size}}" required="required" style="width: 75px;">
                                    </td>
                                    <td class="taskOptions">
                                        <input type="text" name="price[]" id="price" class="form-control" value="{{$attribute->price}}" required="required" style="width: 75px;">
                                    </td>
                                    <td class="taskOptions">
                                        <input type="text" name="stock[]" id="stock" class="form-control" value="{{$attribute->stock}}" required="required" style="width: 75px;">
                                    </td>
                                    <td style="text-align: center; ">
                                        <button style="float: left;" type="submit" class="btn btn-success btn-mini">Edit</button>
                                     </form>
                                     <form action="{{route('product_attribute.destroy',$product->id)}}" method="post"  display: inline; >
                                        @csrf
                                        @method('delete')                                         
                                        <input type="hidden" name="id" value="{{$attribute->id}}">
                                        <button type="submit" rel1="delete-attribute" class="btn btn-danger btn-mini deleteRecord"  display: inline; >Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                           
        </div>

    </div>
 @endsection
           
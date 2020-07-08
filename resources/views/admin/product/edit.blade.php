
@extends('admin')
@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <ul class=" nav flex-column nav-tabs nav-pills bg-white">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home">General</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{ route('product_attribute.show',$product->id) }}">Add Attribute</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{ route('images',$product->id) }}">Add Image</a>
              </li>
            </ul>
                </div>
           </div>
            <div class="col-md-8">
                <div class="card">
                   <div class="card-header">Edit product #{{ $product->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($product, [
                            'method' => 'PATCH',
                            'url' => ['/admin/product', $product->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.product.form', ['formMode' => 'edit'])

                        {!! Form::close() !!}
                     </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

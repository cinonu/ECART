@extends('admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Configuration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        @foreach(get_config_list() as $data)
      <label>{{ $data['identifier']}}</label>
      <input type="text" name="{{ $data['identifier']}}" value="{{ $data['value']}}">
      @endforeach     
              
    <!-- /.content-header -->
     <form action="{{ asset('/configuration') }}" method="POST">
       @csrf
        @method('PUT')
       
      @foreach(get_config_list() as $data)
      
            <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group">

                <strong>{{$data['identifier']}}</strong>
             <input type="text" name="{{$data['identifier']}}" class="form-control" placeholder="firstname" 
             value="{{$data['value']}}">
            </div>
        </div>
        
   
          
        @endforeach

   <div class="col-xs-12 col-sm-4 col-md-4 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
     </div>
    </form>
     
@endsection
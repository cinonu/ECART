@extends('admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Email Templates Management</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Email Templates</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
           <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                   {{--  <a href="{{ url('/admin/products/create') }}" class="btn btn-success btn-sm float-sm-right" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> --}}
                    <h3 class="card-title">Email Templates</h3></div>
                    <div class="card-body">
 
                        <div class="table-responsive">
                            <table class="table" id="email_template">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>subject</th>
                                        {{-- <th>message</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                 @foreach($data as $e)
                                
                                <tbody>
                                  <td>{{ $loop->iteration }} </td>
                                  <td>{{$e->subject}}</td>
                                  {{-- <td>{{$e->message}}</td> --}}
                                  <td>
                                  <a href="{{ url('admin/EmailTemplates/' . $e->id) }}" title="View cm"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('admin/EmailTemplates/' . $e->id . '/edit') }}" title="Edit cm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                  </td>
                                 </tbody>
                                  @endforeach
                               
                            </table>
                        {{--     <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
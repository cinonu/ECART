@extends('admin')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            @include('sidebar')

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product</div>
                    <div class="card-body">
                       
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/contactus', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Ticket No</th><th>USER EMAIL</th><th>SUBJECT</th><th>MESSAGE</th>
                                        <th>Issued Date</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($contact as $item)

                                    <tr>
                                        <td>
                                            {{$item->id}}
                                        </td>
                                         <td>
                                            {{$item->email}}
                                         </td>
                                         <td>
                                             {{$item->Subject}}
                                         </td>
                                         <td>
                                             {{$item->Message}}
                                         </td>
                                         <td>
                                            {{$item->created_at}}
                                         </td>
                                        <td>
                                            <a href="{{ url('/admin/Contactus/' . $item->id) }}" title="View product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <di v class="pagination-wrapper">  </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

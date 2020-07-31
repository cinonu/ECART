@extends('admin')
@section('content')

    <div class="content-wrapper">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Coupons</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/coupons/create') }}" class="btn btn-success btn-sm" title="Add New coupons">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/categories', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Coupon code</th><th>amount</th><th>amount type</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($coupon as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->coupon_code }}</td>
                                        <td>
                                            {{$item->amount}}
                                        </td>
                                        <td>
                                            {{$item->amount_type}}
                                        </td>
                                        <td>
                                            {{$item->status}}
                                        </td>
                                      <td>
                                      
                                           
                                          {{--   <a href="{{ url('/admin/coupons/' . $item->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/coupons', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete category',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                          <div class="pagination-wrapper"> </div>
                        </div>
 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

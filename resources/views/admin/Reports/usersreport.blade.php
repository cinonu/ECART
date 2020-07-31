@extends('admin')
@section('content')
<div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Order's Report</div>
                       
                        <form method="GET" action="{{ url('/admin/banners') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>user ID</th><th>USER DETAILS</th><th>CREATED AT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ url('/admin/user/'.$item->id) }}">Clik here for Details</a></td>
                                        <td>{{$item->created_at}}</td>
           
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                             </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

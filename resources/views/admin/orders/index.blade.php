@extends('admin')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            {{-- @include('admin.sidebar') --}}

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Orders</div>
                    <div class="card-body">
                         
                        
                        <br/>
                        <br/>
                        <div class="table-responsive">

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                     <th>#</th><th>order ID</th><th>customer email</th><th>customername</th><th>Order amount</th><th>Order Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $item)
                                
                                 <form action="{{ route('ManageOrders.update',$item->id) }}" method="POST" role="form">
                                @csrf
                                @method('PUT')
                              
                                    <tr>

                                        <td>{{ $loop->iteration }} </td>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->users_email}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->grand_total}}</td>
                                        <td>
                                            <select name="order_status" value="{{$item->order_status}}">
                                              <option value="{{$item->order_status}}" selected>{{$item->order_status}}</option>
                                              <option value="Recieved" >Recieved</option>
                                              <option value="Packing">Packing</option>
                                              <option value="Dispatched">Dispatched</option>
                                              <option value="Delivered">Delivered</option>
                                            </select>
                                         </td>

                                           
                                  
                                          <td>
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>SAVE</button>

                                          </td>
                                          </form>
                                          <td>
                                            <a href="{{ route('ManageOrders.show',$item->id) }}" title="View product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            
                                          </td>
                                        
                                    </tr>
                                  
                                   @endforeach
                                   
                                </tbody>
                            </table>
                        
                            {{-- <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">product {{ $order->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/ManageOrders') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {{-- <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                         --}}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Product Details
                                            <td>
                                        <ul style="list-style-type: none">
                                            <li><strong>product name</strong></li>
                                         @foreach($order->product_name as $proname)
                                           <li> {{ $proname }} </li>
                                         @endforeach
                                        </ul>
                                           </td>
                                               <td>
                                        <ul style="list-style-type: none">
                                            <li><strong>product quantity</strong></li>
                                         @foreach($order->product_qty as $proqty)
                                           <li> {{ $proqty }} </li>
                                         @endforeach
                                        </ul>
                                           </td>
                                        

                                        </th>
                                    </tr>
                                    <tr>
                                        <th>User NAme</th>
                                        <td> {{ $order->name }} </td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Address</th>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $order->city }}</td>
                                    </tr>
                                    <tr>
                                        <th>state </th>
                                        <td> {{ $order->state }} </td>
                                    </tr>
                                    <tr>
                                        <th> Pincode</th>
                                        <td> {{ $order->pincode }} </td>
                                    </tr>
                                     <tr>
                                        <th>Mobile</th>
                                        <td> {{ $order->mobile }} </td>
                                    </tr>
                                     <tr>
                                        <th>Payment Method</th>
                                        <td> {{ $order->payment_method }} </td>
                                    </tr>
                                     <tr>
                                        <th>Order Amount</th>
                                        <td> {{ $order->grand_total }} </td>
                                    </tr>
                               
                               
                               
                               
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

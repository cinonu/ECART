@extends('admin')
@section('content')
<div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">Order's Report</div>
                       
                        <form method="GET" action="{{ url('/admin/banners') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                           
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Order number</th><th>orderDetails</th><th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderreport as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td><a href="{{ route('ManageOrders.show',$item->id) }}">click here to view</a></td>
                                        <td>{{ $item->created_at }}</td>
           
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           <ul class="pagination">
                        <?php echo $orderreport; ?>
                    </ul><!--features_items-->
            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

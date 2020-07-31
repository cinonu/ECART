@extends('admin')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Report</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Used Coupons Report</li>
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
        {{-- <div class="row">
           <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fa fa-bar-chart"></i> Choose the report type</h3>
                     </div>
                    <div class="card-body">
                      <div class="well">
<div class="input-group">
<div class="input-group-append">
  
  </div></div>
</div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /.row -->
        {{-- row start --}}
<div class="row">
      {{-- col-1 starts --}}

      <div class="col-md-9 col-md-pull-3 col-sm-12">
      <div class="card card-default">
      <div class="card-header">
      <h3 class="pancardel-title"><i class="fa fa-bar-chart"></i>Coupons Report</h3>

      </div>
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered"  id="reports" style="width:100%">
      <thead>
      <tr>
      <td>#</td>
      <td class="text-left">Coupon Code</td>
      <td class="text-left">How Many Time Used</td>
      {{-- <td class="text-right"></td> --}}
      {{-- <td class="text-right">No. Products</td> --}}
      {{-- <td class="text-right">Tax</td> --}}
      <td class="text-right">Total Discount</td>
      {{-- <td class="text-right">Created</td> --}}
    
      </tr>
      </thead>
    </table>
      </div>
     </div>
    </div>
  </div>

      {{-- col-2 ends --}}

      {{-- col-2 start --}}
      <div id="filter-report" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
      <div class="card card-default">
      <div class="card-header">
      <h3 class="card-title"><i class="fa fa-filter"></i> Filter</h3>
      </div>
      <div class="card-body">
      <form id="search-form" action="#" >
      <div class="form-group">
      <label class="control-label" for="input-date-start">Date Start</label>
      <div class="input-group">
      <input type="text" name="start_date" value="{{date("Y-m-d", strtotime("-1 month"))}}" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="input-date-start" class="form-control date">
     
      </div>
      </div>
      <div class="form-group">
      <label class="control-label" for="input-date-end">Date End</label>
      <div class="input-group">
      <input type="text" name="end_date" value="{{date('Y-m-d')}}" placeholder="Date End" data-date-format="YYYY-MM-DD" id="input-date-end" class="form-control date">
      
      </div>
      </div>
     {{--  <div class="form-group">
      <label class="control-label" for="input-group">Group By</label>
      <select name="filter_group" id="input-group" class="form-control">
      <option value="year">Years</option>
      <option value="month">Months</option>
      <option value="week" selected="selected">Weeks</option>
      <option value="day">Days</option>
      </select>
      </div>
      --}} <div class="form-group">
     {{--  <label class="control-label" for="input-status">Status</label> --}}
     {{--  <select name="filter_order_status_id" id="input-status" class="form-control">
      <option value="">All Statuses</option>
      <option value="pending">Pending</option>
       <option value="processing">Processing</option> 
      <option value="completed">Completed</option> 
      <option value="decline">Declined</option>  
      </select> --}}
      </div>
      <div class="form-group text-right">
      <button type="submit" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
      </div>
      </form>
      </div>
      </div>
      </div>
      {{-- col-2 ends --}}

</div>
    {{-- row end    --}}
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="{{asset('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
   
@push('datatable-js')
<script src="{{asset('https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js')}}"></script>
<script src="{{asset('https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js')}}"></script>
<script>
   $(function() {
      $( ".date" ).datepicker({
        dateFormat:"yy-mm-dd",
      });
    });
</script>

<script>
  $(function () {
    
        table = $('#reports').DataTable({
         searching: false,
        processing: true,
        serverSide: true,
        // lengthChange: false,
        ajax: {
          url :"{{ route('coupon-report') }}",
         data: function (d) {
              d.start_date = $('[name=start_date]').val(); 
              // alert(d.date_start);
              d.end_date = $('[name=end_date]').val();
              // d.filter_group = $('[name=filter_group]').val();
              // d.status = $('[name=filter_order_status_id]').val();
              // alert(d.filter_group);
          }
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            // {data: 'start_date', name: 'start_date'},
            {data: 'coupon_code', name: 'start_date'},
            {data: 'order_number', name: 'number_of_orders'},
            {data: 'coupon_amount', name: 'grand_total'},
          
        ]
    });
    
  });
  $('#search-form').on('submit', function(e) {
      e.preventDefault();
        table.draw();
        
    });
</script>
@endpush
@endsection 
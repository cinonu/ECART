<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use App\order;
// use App\Charts;
use App\Coupon;
use DataTables;
use DB;

class DashboardController extends Controller
{
    public function show()
    {
	    $currentMonth = date('m');
	    $order = DB::table('orders')
	            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
	            ->where('order_status','Recieved')
	            ->get();
	    
	    $user = DB::table('users')
	            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
	            ->get();
	    
	    $sales = DB::table('orders')
	             ->where('error',NULL)
	             ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
	             ->sum('grand_total');

	    $coupons = DB::table('orders')
	              ->where('error',NUll)
	              ->where('coupon_code','!=',NUll)
	              ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
	              ->get();
	   
	          
	      
		    
		return view('content',compact('order','user','sales','coupons'));

   }

   public function showorderreport()
   { 
       $currentMonth = date('m');
	  
    $orderreport =DB::table('orders')
	            ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
	            ->where('order_status','Recieved')
	            ->paginate(10);
	    
   	return view('admin.Reports.orderreport',compact('orderreport'));

   }

    public function showuserreport()
    {
     $currentMonth = date('m');
	  
    $user = DB::table('users')
	           ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
	           ->paginate(10);
	   

   	return view('admin.Reports.usersreport',compact('user'));

   }
  

    public function showcouponreport(Request $request)
    {
    	  if ($request->ajax()) {
            
            $query = order::latest(); 
            if(isset($request->start_date))
            {
              $query->where('created_at','>=',$request->start_date);
            }
            if(isset($request->end_date))
            {
              $query->where('created_at','<=',date('Y-m-d',strtotime("1 day",strtotime($request->end_date))));
            }

            $query->where('coupon_code','<>','');
            
         
            $data =  $query->get(); 
            // dd($data);  
            return Datatables::of($data)
                    ->addIndexColumn() 
                    ->editColumn('order_number', function($row) {
                        // if($row->brand_id != "")
                        // {
                        // return ($brand = Brand::find($row->brand_id))?$brand->toArray()['name']:'N/A';
                        // }
                        // else
                        // {
                        //     return 'N/A';
                        // }
                        return "<a href='".route('ManageOrders.show',$row->id)."'>$row->id</a>";
                        
                        // 
                    })
                    ->editColumn('discount', function($row) {
                        // if($row->brand_id != "")
                        // {
                        // return ($brand = Brand::find($row->brand_id))?$brand->toArray()['name']:'N/A';
                        // }
                        // else
                        // {
                        //     return 'N/A';
                        // }
                        return number_format($row->coupon_amount,2);
                        
                        // 
                    })

                     ->rawColumns(['order_number']) 
                    ->make(true);
        } 
        
        return view('admin.Reports.couponsreport')->with('type','coupon');
    }

    public function sendshowsalesreport(Request $request)
    {
    
	    if ($request->ajax()) {
	    	$data = DB::table('orders')
	    	        ->select(DB::raw('min(date(created_at)) as start_date'),DB::raw('max(date(created_at)) as end_date'),DB::raw('count(*) as number_of_orders'), DB::raw('sum(grand_total) as total'))
	    	        ->where('error',NULL)
	    	        ->whereBetween('created_at', [$request->start_date, $request->end_date]);

	    	        
	    	        if ($request->filter_group == 'month')
    				$data->groupByRaw('month(created_at)');

    			    elseif ($request->filter_group == 'day') {
    			    	$data->groupByRaw('date(created_at)');

    			    }
    			     elseif ($request->filter_group == 'week') {
    			    	$data->groupByRaw('week(created_at)');

    			    }
    			      elseif ($request->filter_group == 'year') {
    			    	$data->groupByRaw('year(created_at)');

    			    }




					$result = $data->get();
	                
	    	       
                    // ->get();

	    	         // dd($data);

	    	       return Datatables::of($result)
                    ->addIndexColumn() 
                   
                   
                    ->make(true);
        } 
         return view('admin.Reports.salesreport');		  
            
      }
	 
}
  
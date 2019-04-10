<?php

namespace App\Http\Controllers\Admin;

use App\BillDetail;
use App\Warehouse;
use App\Bill;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class StatisticalController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin')->except('logout');
    }
    public function index(){
        $params =  [
            'breadcrumb' => ['Statistical'],
            'title' => 'statistical'
        ];

        return view( "admin.statistical.index",  $params);
    }

    public function salary(Request $request){

        $month = $request->get('datetime')? date('m', $request->get('datetime')) : date('m');
        $year = $request->get('datetime') ? date('Y', $request->get('datetime')) : date('Y') ;
        $salary  = BillDetail::join('bill', 'bill_id', '=', 'bill.id')
            ->join('warehouse', 'bill_detail.product_id', '=', 'warehouse.product_id')
            ->whereRaw("MONTH(created_at) = '$month' AND YEAR(created_at) = '$year'")
            ->selectRaw('sum(amount * unit) as total, sum(warehouse.cost * unit) as costprice, DAY(bill.created_at) as day')
            ->groupBy('day')
            ->get();
        $soldProduct  = BillDetail::join('bill', 'bill_id', '=', 'bill.id')
            ->whereRaw("MONTH(created_at) = '$month' AND YEAR(created_at) = '$year'")
            ->selectRaw('sum(unit) as total, DAY(bill.created_at) as day')
            ->groupBy('day')
            ->get();
        return response()->json(['salary' => $salary, 'soldProduct' => $soldProduct ]);
    }

    public function bestbuy(){
        $data =  Warehouse::join('product', 'product_id', '=', 'product.id')
            ->select('title', 'sold');
        $bestbuy =  $data 
            ->orderBy('sold', 'desc')
            ->limit(5)
            ->get();
        $badbuy =  $data 
            ->orderBy('sold', 'asc')
            ->limit(5)
            ->get();
        return response()->json(['bestbuy' => $bestbuy, 'badbuy' => $badbuy ]);
    }
}

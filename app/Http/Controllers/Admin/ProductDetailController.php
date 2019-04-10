<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\ProductDetail;
use App\Product;

class ProductDetailController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'product-detail', ProductDetail::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::all(),
            'products' => Product::where('deleted', 0)->get(),
        ];
    }
    public function edit($id)
    {
        $row = $this->model::find($id);
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'products' => Product::where('deleted', 0)->get() ])->render(), 'status'=> 200]);
    }
}

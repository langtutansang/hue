<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\ProductAttributeDetail;
use App\Product;
use App\Attribute;

class ProductAttributeDetailController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'product-attribute-detail', ProductAttributeDetail::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => Product::where('deleted', 0)->get(),
            'attributes' => Attribute::where('deleted', '0')->get()
        ];
    }
    public function edit($id)
    {
        $row = $this->model::find($id);
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'attributes' => Attribute::where('deleted', 0)->get() ])->render(), 'status'=> 200]);
    }
    public function destroy($id)
    {   
        $result = ProductAttributeDetail::find($id)->delete();

        return ($result? 1 : 0);
    }


}

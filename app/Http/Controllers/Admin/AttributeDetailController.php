<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Attribute;
use App\AttributeDetail;

class AttributeDetailController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'attribute-detail', AttributeDetail::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
            'attributes' => Attribute::where('deleted', 0)->get()
        ];
    }
    public function edit($id)
    {
        $row = $this->model::find($id);
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'attributes' => Attribute::where('deleted', 0)->get() ])->render(), 'status'=> 200]);
    }
}

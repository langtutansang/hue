<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Classes;
use App\Test;

class TestController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'test', Test::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return View("admin.create-test.index",['classes'=> Classes::where("deleted", 0)->get()]);
    }

    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'classes'=> Classes::where("deleted", 0)->get() ])->render(), 'status'=> 200]);
    }
}

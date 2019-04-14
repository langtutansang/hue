<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Classes;
use App\Test;
use App\ResultTest;
use App\ResultTestDetail;

class ResultTestController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'resulttest', ResultTest::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return response()->json([ 'data' => View("admin.$this->view.create",['tests'=> Test::where("deleted", 0)->get()])->render()]);
    }
    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'tests'=> Test::where("deleted", 0)->get() ])->render(), 'status'=> 200]);
    }

    public function resultTestDetail($id){
        $row = json_decode(ResultTestDetail::where('id',$id)->get());
        return view("admin.$this->view.resulttestdetail", ['rows' => $row]);
    }
}

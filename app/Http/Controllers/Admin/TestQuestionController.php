<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Test;
use App\TestQuestion;

class TestQuestionController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'testquestion', TestQuestion::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return response()->json([ 'data' => View("admin.$this->view.create",['test'=> Test::where("deleted", 0)->get()])->render()]);
    }
    public function edit($id)
    {
        $row = $this->model::find($id);
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'test'=> Test::where("deleted", 0)->get() ])->render(), 'status'=> 200]);
    }
    public function createTestQuestion(){
        return view("admin.$this->view.createTestQuestion", ['tests' => Test::where("deleted", 0)->get()]);
    }
    public function createTestQuestionDetail(){
        return view("admin.$this->view.createTestQuestionDetail", ['testquestions' => TestQuestion::where("deleted", 0)->get()]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Classes;
use App\Test;
use App\TestQuestion;
use App\TestQuestionDetail;

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

    public function store(Request $request)
    {
        $class = new $this->model;
        $class->title = $request->get('title');
        $class->description = $request->get('description');
        $class->classes_id = $request->get('classes_id');
        $class->timetest = $request->get('timetest');
        $class->save();  

        foreach($request->get('question') as $question){
            $testQuestion = new TestQuestion();
            $testQuestion->test_id = $class->id;
            $testQuestion->title = $question["title"];
            $testQuestion->answer = $question["answer"];
            $testQuestion->type = isset($question["list"]) ? 0 : 1;
            $testQuestion->save();
            if(isset($question["list"]) )  {
                foreach( $question["list"] as $list ){
                    TestQuestionDetail::insert([
                        "test_question_id" => $testQuestion->id,
                        "answered" => $list['answered'],
                        "head" => $list['head'],
                    ]);
                }

               
            }
        }

        return response()->json([ 'status'=> 200]);
    }

}

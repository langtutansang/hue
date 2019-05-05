<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Classes;
use App\Test;
use App\TestQuestion;
use App\TestQuestionDetail;
use App\ResultTest;

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
        return View("admin.edit-test.index", ['row' => $row, 'classes'=> Classes::where("deleted", 0)->get() ]);
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

        return response()->json([ 'status'=> 200, "newId" => $class->id ]);
    }

    
    public function update(Request $request, $id)
    {
        $test = ResultTest::where('test_id', $id)->get();
        if(count($test)  === 0) {
            Test::where('id', $id)->update([
                "title" => $request->get('title'),
                "description" => $request->get('description'),
                "classes_id" => $request->get('classes_id'),
                "timetest" => $request->get('timetest'),
            ]);

            TestQuestion::where('test_id', $id)->delete();

            foreach($request->get('question') as $question){
                $testQuestion = new TestQuestion();
                $testQuestion->test_id = $id;
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
        else {
            Test::where('id', $id)->update([
                'deleted' => 1
            ]);
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

            return response()->json([ 'status'=> 200 ]);
        }
    }


}

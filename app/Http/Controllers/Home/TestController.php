<?php

namespace App\Http\Controllers\Home;
use App\Test;
use App\Category;
use App\Classes;
use App\ResultTest;
use App\ResultTestDetail;
use App\TestQuestion;

use Illuminate\Http\Request;

class TestController
{
    public function index($id){
        $test = Test::where("deleted", 0)->where("id", $id)->first();
        $categories = Category::where("deleted", 0)->get();
        $breadcrumbs = [
            [                
                "name" => $test->classes->course->category->name,
                "url" => "/category/" . $test->classes->course->category->id
            ],
            [
                
                "name" => $test->classes->course->name,
                "url" => "/category/" . $test->classes->course->category->id . "#course" . $test->classes->course->id
            ],
            [
                "name" => $test->name,
                "url" => ""
            ]
        ];
        return view("home.test.index",
           [   
            "test"=> $test,
            "categories"=> $categories, 
            "breadcrumbs" => $breadcrumbs,
            "title" => $test->name
        ]);
    }
    function resultTest($id, Request $request){
        $kq = $request->all();
        unset($kq['_token']);
        $data = new ResultTest();
        $data->users_id = 1;
        $data->score = 0;
        $data->test_id = $id;
        $data->save();
        $testQuestion = TestQuestion::where("test_id", $id)->select("test_question.answer", "test_question.id")->get();
        var_dump($testQuestion);die();

    }
}
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
        $kqs = $request->all();
        unset($kqs['_token']);        
        $data = new ResultTest();
        $data->users_id = 1;
        $data->score = 0;
        $data->test_id = $id;
        $data->result_true = 0;
        $data->save();
        $countQuestionTest = TestQuestion::where("test_id", $id)->get()->count();
        $countAnswerUser = 0;

        foreach($kqs as $key=>$kq){
            $idQuestionTest = str_replace("test-question-", "", $key);
            $resultdetail = new ResultTestDetail();
            $resultdetail->result_test_id = $data->id;
            $resultdetail->test_question_id = $idQuestionTest;
            $resultdetail->answer = $kq;
            $resultdetail->save();            
            $answer = TestQuestion::where("id", $idQuestionTest)->where("answer", $kq)->get()->count();
            if($answer > 0){
                $countAnswerUser++;
            }
        }
        $data->score = Round(10/$countQuestionTest * $countAnswerUser);
        $data->result_true = $countAnswerUser;
        $data->save();
        return redirect("/resulttest/$data->id");
    }
    public function resultTestUser($id){
        $categories = Category::where("deleted", 0)->get();
        $result = ResultTest::where("id", $id)->first();
        return view("home.resulttest.index", [
                    "result" => $result,
                    "categories"=> $categories, 
                    "breadcrumbs" => [],
                    "title" => "Kết quả kiểm tra của " . $result->test->title,
                ]);
    }
}
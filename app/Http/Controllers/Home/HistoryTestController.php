<?php

namespace App\Http\Controllers\Home;
use App\Category;
use App\ResultTest;

use Illuminate\Http\Request;

class HistoryTestController
{
    public function index(){
        $resultTests = ResultTest::where("users_id", 1)->orderBy("date", "desc")->get();
        $categories = Category::where("deleted", 0)->get();
        return view("home.historytest.index",
           [   
            "categories"=> $categories, 
            "breadcrumbs" => [
                [
                    "name" => "Lịch sử thi",
                    "url" => "#"
                ]
            ],
            "title" => "Lịch sử thi",
            "resultTests" =>$resultTests
        ]);
    }
}
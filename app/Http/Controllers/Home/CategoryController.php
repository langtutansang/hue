<?php

namespace App\Http\Controllers\Home;
use App\Category;
use App\Course;
use Auth;
use App\ResultTest;

class CategoryController
{
    public function index($id){
        $categories = Category::where("deleted", 0)->get();
        $category = Category::where("deleted", 0)->where("id", $id)->first();
        $courses = Course::where("deleted", 0)->where("category_id", $id)->get();
        $rules = [];
        if(Auth::check()){
            $rules = ResultTest::join('test', 'test.id', '=', 'result_test.test_id')->where('result_test.result_true', 1)->select('test.classes_id')->distinct()->pluck('test.classes_id')->toArray();
        }
        $breadcrumbs = [
            [
                
                "name" => $category->title,
                "url" => ""
            ],
        ];

        return view("home.category.index",
        [
            "categories"=> $categories, 
            "courses" => $courses ,
            'breadcrumbs' => $breadcrumbs,
            "title" => $category->title,
            'rules' => $rules
        ]);
    }
    
}
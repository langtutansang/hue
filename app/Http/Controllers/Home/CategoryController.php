<?php

namespace App\Http\Controllers\Home;
use App\Category;
use App\Course;

class CategoryController
{
    public function index($id){
        $categories = Category::where("deleted", 0)->get();
        $category = Category::where("deleted", 0)->where("id", $id)->first();

        $courses = Course::where("deleted", 0)->where("category_id", $id)->get();
        $breadcrumbs = [
            [
                
                "name" => $category->name,
                "url" => ""
            ],
        ];

        return view("home.category.index",
        [
            "categories"=> $categories, 
            "courses" => $courses ,
            'breadcrumbs' => $breadcrumbs,
            "title" => $category->name
        ]);
    }
    
}
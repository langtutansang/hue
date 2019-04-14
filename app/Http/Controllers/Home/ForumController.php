<?php

namespace App\Http\Controllers\Home;
use App\Test;
use App\Category;
use Illuminate\Http\Request;

class ForumController
{
    public function index(){
        $categories = Category::where("deleted", 0)->get();
       
        return view("home.forum.index",
           [   
            "test"=> "s",
            "categories"=> $categories, 
            "breadcrumbs" => "s",
            "title" =>""
        ]);
    }
}
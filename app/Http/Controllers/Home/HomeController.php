<?php

namespace App\Http\Controllers\Home;
use App\Category;

class HomeController
{
    public function index(){
        $categories = Category::where("deleted", 0)->get();   
        return view("home.index",
        [
            "flag"=> 1,
            "title" => "Home",
            "categories" => $categories
        ]);
    }
    
}
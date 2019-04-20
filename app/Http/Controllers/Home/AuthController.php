<?php

namespace App\Http\Controllers\Home;
use App\User;
use App\Category;

use Illuminate\Http\Request;

class AuthController
{
    public function index(){
        $categories = Category::where("deleted", 0)->get();
        return view("home.auth.index",
        [
            "categories"=> $categories, 
            "breadcrumbs" => [
                ["name" => "Đăng nhập/Đăng ký",
                "url" => "#"]
            ],
            "title" => "Đăng nhập/Đăng ký",
        ]);
    }
    
}
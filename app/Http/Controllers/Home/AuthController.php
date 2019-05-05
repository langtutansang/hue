<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use App\User;
use App\Category;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }



    public function login(){
        $categories = Category::where("deleted", 0)->get();
        return view("home.auth.login",
        [
            "categories"=> $categories, 
            "breadcrumbs" => [
                ["name" => "Đăng nhập/Đăng ký",
                "url" => "#"]
            ],
            "title" => "Đăng nhập/Đăng ký",
        ]);
    }

    public function register(){
        $categories = Category::where("deleted", 0)->get();
        return view("home.auth.register",
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
<?php

namespace App\Http\Controllers\Home;
use App\User;
use Auth;
use App\Category;

use Illuminate\Http\Request;

class UserController
{
    public function index(){
        $categories = Category::where("deleted", 0)->get();
        $user = User::where("id", Auth::user()->id)->first();
        $breadcrumbs = [
            [
                
                "name" => "Profile",
                "url" => ""
            ],
        ];

        return view("home.account.index",
        [
            "test"=> "s",
            "categories"=> $categories, 
            "breadcrumbs" => $breadcrumbs,
            "title" => "My Profile",
            "user" => $user
        ]);
    }
    
}
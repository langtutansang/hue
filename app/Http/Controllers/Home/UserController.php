<?php

namespace App\Http\Controllers\Home;
use App\User;
use App\Category;

use Illuminate\Http\Request;

class UserController
{
    public function index(){
        $categories = Category::where("deleted", 0)->get();
        $user = User::where("id", 1)->first();
        return view("home.account.index",
        [
            "test"=> "s",
            "categories"=> $categories, 
            "breadcrumbs" => "s",
            "title" => "My Profile",
            "user" => $user
        ]);
    }
    
}
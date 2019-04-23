<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Category;

class AccountController extends Controller
{
    protected $redirectTo = '/auth';

    public function __construct() {
        $this->middleware('auth:web')->except('logout');

    }
    public function index()
    {
        $categories = Category::where("deleted", 0)->get();
        $user = User::find(Auth::id());
        $breadcrumbs = [
            [
                
                "name" => "Profile",
                "url" => ""
            ],
        ];

        return view("home.account.index",
        [
            "categories"=> $categories, 
            "breadcrumbs" => $breadcrumbs,
            "title" => "My Profile",
            "user" => $user
        ]);
    }
    public function changeInfo(Request $request)
    {
      $data = $request->all();
      unset($data['_token']);
      if($request->hasFile('picture')){
        $path = Storage::putFile("public/home/user", $request->file('picture'));
        $data['picture'] = str_replace('public','storage', $path ) ;
      }
      User::where('id', Auth::id() )->update($data);
      return redirect()->back();
    }
    
    public function changePassword(Request $request)
    {
        $data = $request->all();
        
        if( $data['password'] == $data['password_confirmation'] && Hash::check($data['password_old'], Auth::user()->password )){
            $result = User::where('id', Auth::id() )->update([
            'password' => Hash::make($data['password']),
            'remember_token' => ""
            ]);
            if($result) Auth::logout();
        }
        return redirect()->back();
    }
    
}
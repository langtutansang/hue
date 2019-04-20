<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;

use App\Test;
use App\Category;
use App\Forum;
use App\ForumComment;
use Illuminate\Support\Facades\Storage;

use Auth;

class ForumController
{
    public function index(Request $request){
        
        $categories = Category::where("deleted", 0)->get();
        $forums = Forum::where("deleted", 0);
        if($request->has('category')) $forums = $forums->where('category_id', $request->get('category'));
        $forums = $forums->get();
        return view("home.forum.index",
           [   
            "categories"=> $categories, 
            "breadcrumbs" => [
                [
                    "url"=> "#",
                    "name" => "Diễn đàn"
                ]
            ],
            "title" =>"Diễn dàn",
            "forums" => $forums
        ]);
    }

    public function detail(Request $request, $id){
        $forum = Forum::find($id);
        if(!$forum) redirect('/forum');
        $categories = Category::where("deleted", 0)->get();
        return view("home.forum-detail.index",
           [   
            "categories"=> $categories, 
            "breadcrumbs" => [
                [
                    "url"=> "/forum",
                    "name" => "Diễn đàn"
                ],
                [
                    "url" => '#',
                    "name" => $forum->title
                ]
            ],
            "title" => $forum->title,
            'row' => $forum
        ]);
    }
    public function comment($id, Request $request)
    {
        ForumComment::insert([
            "forum_id" =>  $id,
            "users_id" => Auth::id(),
            "comment" => $request->get('comment')
        ]);
        return redirect()->back();
    }

    public function create(){
     
        $categories = Category::where("deleted", 0)->get();
        return view("home.forum-create.index",
           [   
            "categories"=> $categories, 
            "breadcrumbs" => [
                [
                    "url"=> "/forum",
                    "name" => "Diễn đàn"
                ],
                [
                    "url" => '#',
                    "name" => 'Tạo mới'
                ]
            ],
            "title" =>'Tạo mới',
        ]);
    }

    public function store(Request $request){
        $class = new Forum;
        foreach($request->all() as $key => $field){
            $class[$key] = $field;
        }
        unset($class['_token']);
        $class['users_id'] = Auth::id();
        $path = Storage::putFile("public/home/post", $request->file('picture'));
        $class->picture = str_replace('public','storage', $path ) ;
        $class->save();
        return redirect('/forum');
    }
}
<?php

namespace App\Http\Controllers\Home;
use App\Category;
use App\Lesson;
use App\Classes;
use App\LessonVideo;

class ClassesController
{
    public function index($id){
        $categories = Category::where("deleted", 0)->get();
        $lessons = Lesson::where("deleted", 0)->where('classes_id', $id)->get();
        $classes = Classes::where("deleted", 0)->where('id', $id)->first();
        $video = LessonVideo::where('lesson_id', $id)->first();
     
        $breadcrumbs = [
            [
                
                "name" => $classes->course->category->name,
                "url" => "/category/" . $classes->course->category->id
            ],
            [
                
                "name" => $classes->course->name,
                "url" => "/category/" . $classes->course->category->id . "#course" . $classes->course->id
            ],
            [
                "name" => $classes->name,
                "url" => ""
            ]
        ];

        return view("home.classes.index",
           [   
            "categories"=> $categories, 
            "lessons" => $lessons ,
            "breadcrumbs" => $breadcrumbs,
            "video" => $video,
            "classes" => $classes,
            "title" => $classes->name
        ]);
    }
    
}
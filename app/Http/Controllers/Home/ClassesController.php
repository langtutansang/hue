<?php

namespace App\Http\Controllers\Home;
use App\Category;
use App\Lesson;
use App\Classes;
use App\LessonVideo;
use App\ResultTest;

class ClassesController
{
    public function index($id){
        $classes = Classes::where("deleted", 0)->where('id', $id)->first();
        if(!isset($classes)) return redirect('/');
        $enabledTest = false;
        if(!isset($classes->previous_class)){
            $enabledTest = true;
        }else{
            $temp = ResultTest::join("test", "result_test.test_id", "=", "test.id")->where("test.classes_id", $classes->previous_class)
            ->where("result_test.score", ">=", 5)->select('result_test.*')->count();
            $enabledTest = $temp !== 0 ;
        }
        $categories = Category::where("deleted", 0)->get();
        $lessons = Lesson::where("deleted", 0)->where('classes_id', $id)->get();
     
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
            "classes" => $classes,
            "title" => $classes->name,
            "enabledTest" => $enabledTest
        ]);
    }
    
}
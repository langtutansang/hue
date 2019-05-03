<?php

namespace App\Http\Controllers\Home;
use App\Category;
use App\ResultTest;
use App\Course;

class HomeController
{
    public function index(){
        $categories = Category::where("deleted", 0)->get();   
        $courses = Course::all();
        $list= [];
        foreach($courses as $course){
            $resultTest = ResultTest::join('test', 'test.id', '=', 'result_test.test_id')
            ->join('classes', 'test.classes_id', '=', 'classes.id')
            ->join('course', 'classes.course_id', '=', 'course.id')
            ->where('course.id', $course->id)
            ->orderBy('result_test.date', 'desc')
            ->orderBy('result_test.score', 'desc')
            ->first();
            if($resultTest) $list[] = $resultTest;
        }
        return view("home.dashboard.index",
        [
            "title" => "Home",
            "categories" => $categories,
            "breadcrumbs" => [],
            "resultTest" => $list
        ]);
    }
    
}
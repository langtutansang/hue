<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Course;
use App\Category;

class CoursesController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'courses', Course::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return response()->json([ 'data' => View("admin.$this->view.create",['categories'=> Category::where("deleted", 0)->get()])->render()]);
    }
    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'categories'=> Category::where("deleted", 0)->get() ])->render(), 'status'=> 200]);
    }
}

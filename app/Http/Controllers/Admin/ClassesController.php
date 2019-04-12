<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Classes;
use App\Course;

class ClassesController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'classes', Classes::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return response()->json([ 'data' => View("admin.$this->view.create",['courses'=> Course::where("deleted", 0)->get()])->render()]);
    }
}

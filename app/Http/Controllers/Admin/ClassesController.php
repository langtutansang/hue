<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Classes;
use App\Course;
use App\Admin;
use Auth;

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

        if(Auth::guard('admin')->user()->master == 1){
            $admins = Admin::all();
        }
        else $admins = Admin::where('id', Auth::guard('admin')->id())->get();

        return response()->json([ 'data' => View("admin.$this->view.create",[
            'admins' => $admins, 
            'courses'=> Course::where("deleted", 0)->get(),
            'classes' => Classes::where("deleted", 0)->get(),
            ])->render()]);
    }
    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        
        if(Auth::guard('admin')->user()->master == 1){
            $admins = Admin::all();
        }
        else $admins = Admin::where('id', Auth::guard('admin')->id())->get();

        return response()->json([ 'data' => View("admin.$this->view.edit", [
            'row' => $row, 
            'courses'=> Course::where("deleted", 0)->get() ,
            'classes' => Classes::where("deleted", 0)->get(),
            'admins' => $admins
        ])->render(), 'status'=> 200]);
    }
}

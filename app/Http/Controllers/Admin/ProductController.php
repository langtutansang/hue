<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Product;
use App\Brand;

class ProductController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'product', Product::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
            'brands' => Brand::where('deleted', 0)->get(),
        ];
    }
    public function store(Request $request)
    {   
        $class = new $this->model;
        $data = $request->all();

        if($request->hasFile('picture')) {
            $path = Storage::putFile("public/product", $request->file('picture'));
            $data['picture'] = str_replace('public','storage', $path ) ;
        }
      
        foreach( $data as $key => $field){
            $class[$key] = $field;
        }

        $class->id = NULL;

        $class->save();
        return response()->json([ 'data' => View("admin.$this->view.item", ['row' => $class ])->render()]);
    }

    public function edit($id)
    {
        $row = $this->model::find($id);
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'brands' => Brand::where('deleted', 0)->get() ])->render(), 'status'=> 200]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        print_r($data);die();
        if($request->hasFile('picture')) {
            $path = Storage::putFile("public/product", $request->file('picture'));
            $data['picture'] = str_replace('public','storage', $path ) ;
        }
      

        $result =$this->model::where('id', $id)->update($data);
        if($result != 1) return response()->json(['status' => 500]);

        $row = $this->model::find($id);
        return response()->json([ 'data' => View("admin.$this->view.item", ['row' => $this->model::find($id) ])->render(), 'status'=> 200]);
    }
}

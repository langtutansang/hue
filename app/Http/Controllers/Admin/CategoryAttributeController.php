<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Category;
use App\CategoryAttribute;
use App\Attribute;


class CategoryAttributeController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'category-attribute', CategoryAttribute::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => Category::where('deleted', 0)->get(),
            'attributes' => Attribute::where('deleted', 0)->get()
        ];
    }
    public function edit($id)
    {
        $row = Category::find($id);
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'categories' => Category::where('deleted', 0)->get() ])->render(), 'status'=> 200]);
    }

    public function destroy($id)
    {   
        $result = CategoryAttribute::find($id)->delete();

        return ($result? 1 : 0);
    }

}

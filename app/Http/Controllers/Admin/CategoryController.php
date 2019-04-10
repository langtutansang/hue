<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Category;

class CategoryController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'category', Category::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    
}

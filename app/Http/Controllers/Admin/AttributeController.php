<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Attribute;

class AttributeController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'attribute', Attribute::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    
}

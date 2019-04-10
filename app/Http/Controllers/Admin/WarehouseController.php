<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Warehouse;

class WarehouseController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'warehouse', Warehouse::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::all(),
        ];
    }
}

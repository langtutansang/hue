<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Bill;

class BillController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'bill', Bill::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::all(),
        ];
    }
}

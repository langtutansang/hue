<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Grammar;
use App\Lesson;

class GrammarController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'grammar', Grammar::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
}

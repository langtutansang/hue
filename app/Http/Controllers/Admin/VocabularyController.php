<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\Vocabulary;
use App\Lesson;

class VocabularyController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'vocabulary', Vocabulary::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
}

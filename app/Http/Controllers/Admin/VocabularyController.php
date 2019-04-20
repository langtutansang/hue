<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Vocabulary;
use App\Lesson;
use GoogleTranslate;
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
    public function transText()
    {
        GoogleTranslate::translate('Hello world');
    }

    public function store(Request $request)
    {
        $class = new $this->model;
        foreach($request->all() as $key => $field){
            $class[$key] = $field;
        }
        $class->id = NULL;
        $class->save();        

        return response()->json([ 'status'=> 200, 'data' => $class]);
    }


}

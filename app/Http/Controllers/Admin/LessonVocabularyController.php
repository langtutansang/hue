<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use App\LessonVocabulary;
use App\Lesson;
use App\Vocabulary;

class LessonVocabularyController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'lessonvocabulary', LessonVocabulary::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return response()->json([ 'data' => View("admin.$this->view.create",['lessons'=> Lesson::where("deleted", 0)->get(), 'vocabularies'=> Vocabulary::where("deleted", 0)->get()])->render()]);
    }
    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        return response()->json([ 'data' => View("admin.$this->view.edit", ['row' => $row, 'lessons'=> Lesson::where("deleted", 0)->get(), 'vocabularies'=> Vocabulary::where("deleted", 0)->get()])->render(), 'status'=> 200]);
    }
}
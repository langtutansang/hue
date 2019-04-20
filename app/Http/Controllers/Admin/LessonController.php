<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\RestfulApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Classes;
use App\Lesson;
use App\Vocabulary;
use App\Grammar;
use App\LessonVideo;
use App\LessonGrammar;
use App\LessonVocabulary;

class LessonController extends RestfulApiController
{
    public function __construct() {
        parent::__construct( 'lesson', Lesson::class);
    }

    public function buildInputVarIndex(){
        return [
            'model' => $this->model::where('deleted', '0')->get(),
        ];
    }
    public function create(){
        return view("admin.create-lesson.index", ['classes'=> Classes::where("deleted", 0)->get(),
        'vocabularies' => Vocabulary::where("deleted", 0)->get(),
        'grammars'=> Grammar::where("deleted", 0)->get()]);
    }

    public function edit($id)
    {
        $row = $this->model::find($id);        
        if(!isset($row)) return response()->json(['status' => 500]);
        $grammarIds = LessonGrammar::where('lesson_id', $id)->pluck('grammar_id')->toArray();
        $vocabularyIds = LessonVocabulary::where('lesson_id', $id)->pluck('vocabulary_id')->toArray();
        return view("admin.edit-lesson.index", [
            'classes'=> Classes::where("deleted", 0)->get(),
            'vocabularies' => Vocabulary::where("deleted", 0)->get(),
            'grammars'=> Grammar::where("deleted", 0)->get(),
            'row' => $row,
            'grammarIds' => $grammarIds ,
            'vocabularyIds' => $vocabularyIds
        ]);
    }

    public function store(Request $request)
    {
        $class = new $this->model;
        $class->title = $request->get('title');
        $class->classes_id = $request->get('classes_id');
        $class->save();  


        $lessonVideo = new LessonVideo();
        $lessonVideo->description = $request->get('url_description');
        $lessonVideo->video_url = $request->get('url');
        $lessonVideo->lesson_id = $class->id;
        $lessonVideo->save();
        
        if($request->has('grammar') ) {

            $grammars = [];
            foreach($request->get('grammar') as $grammar){
                $grammars[] = [
                    "grammar_id" => $grammar,
                    "lesson_id" => $class->id
                ];
            }
            LessonGrammar::insert($grammars);
        }
        if($request->has('vocabulary') ) {
            $vocabularies = [];
            foreach($request->get('vocabulary') as $vocabulary){
                $vocabularies[] = [
                    "vocabulary_id" => $vocabulary,
                    "lesson_id" => $class->id
                ];
            }
            LessonVocabulary::insert($vocabularies);
        }

        return response()->json([ 'status'=> 200]);
    }

    public function update(Request $request, $id)
    {
        Lesson::where('id', $id)->update([
            "title" => $request->get('title'),
            "classes_id" => $request->get('classes_id')
        ]);
        LessonVideo::where('lesson_id', $id)->update([
            "description" => $request->get('url_description'),
            "video_url" => $request->get('url')
        ]);
        
        LessonGrammar::where('lesson_id', $id)->delete();
        
        if($request->has('grammar') ) {
            $grammars = [];
            foreach($request->get('grammar') as $grammar){
                $grammars[] = [
                    "grammar_id" => $grammar,
                    "lesson_id" => $id
                ];
            }
            LessonGrammar::insert($grammars);
    
        }
      
        LessonVocabulary::where('lesson_id', $id)->delete();
        if($request->has('vocabulary') ) {
            $vocabularies = [];
            foreach($request->get('vocabulary') as $vocabulary){
                $vocabularies[] = [
                    "vocabulary_id" => $vocabulary,
                    "lesson_id" => $id
                ];
            }
            LessonVocabulary::insert($vocabularies);
        }


        return response()->json([ 'status'=> 200]);
    }

}

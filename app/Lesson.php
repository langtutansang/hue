<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    public $timestamps = false;
    
    public function classes(){
        return $this->belongsTo("App\Classes");
    }
    public function lessonVocabulary(){
        return $this->hasMany("App\LessonVocabulary");
    }
    public function lessonGrammar(){
        return $this->hasMany("App\LessonGrammar");
    }
    public function lessonVideo(){
        return $this->hasOne("App\LessonVideo");
    }
}
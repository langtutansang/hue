<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonVocabulary extends Model
{
    protected $table = 'lesson_vocabulary';
    public $timestamps = false;
    public function lesson(){
        return $this->belongsTo("App\Lesson");
    }
    public function vocabulary(){
        return $this->belongsTo("App\Vocabulary");
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonGrammar extends Model
{
    protected $table = 'lesson_grammar';
    public $timestamps = false;
    public function lesson(){
        return $this->belongsTo("App\Lesson");
    }
    public function grammar(){
        return $this->belongsTo("App\Grammar");
    }
}
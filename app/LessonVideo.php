<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonVideo extends Model
{
    protected $table = 'lesson_video';
    public $timestamps = false;
    public function lesson(){
        return $this->belongsTo("App\Lesson");
    }
}
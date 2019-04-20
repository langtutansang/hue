<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    public $timestamps = false;

    public function course(){
        return $this->belongsTo("App\Course");
    }
    public function test(){
        return $this->hasMany("App\Test")->where('deleted', 0)->first();
    }
    public function lesson(){
        return $this->hasMany("App\Lesson")->where('deleted', 0);
    }
}
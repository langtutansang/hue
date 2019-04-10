<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';
    public $timestamps = false;
    
    public function classes(){
        return $this->hasMany("App\Classes");
    }

        
    public function category(){
        return $this->belongsTo("App\Category");
    }

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
    public $timestamps = false;
    
    public function classes(){
        return $this->belongsTo("App\Classes");
    }
    public function testQuestion(){
        return $this->hasMany("App\TestQuestion");
    }
}
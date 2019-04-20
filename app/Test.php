<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Test extends Model
{
    protected $table = 'test';
    public $timestamps = false;
    
    public function classes(){
        return $this->belongsTo("App\Classes");
    }
    public function testQuestion(){
        return $this->hasMany("App\TestQuestion")->where('deleted', 0);
    }
    public function testResult(){
        return $this->hasMany("App\ResultTest")->where('deleted', 0)->where('score', '>=', 5)->where('users_id', Auth::user()->id);
    }
}
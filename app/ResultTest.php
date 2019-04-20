<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultTest extends Model
{
    protected $table = 'result_test';
    public $timestamps = false;
    public function test(){
        return $this->belongsTo("App\Test");
    }
    public function resultTestDetail(){
        return $this->hasMany("App\ResultTestDetail");
    }
    public function users(){
        return $this->belongsTo("App\User");
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $table = 'test_question';
    public $timestamps = false;
    
    public function testQuestionDetail(){
        return $this->hasMany("App\TestQuestionDetail");
    }
}
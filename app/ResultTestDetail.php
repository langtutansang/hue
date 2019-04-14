<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultTestDetail extends Model
{
    protected $table = 'result_test_detail';
    public $timestamps = false;

    public function resultTest(){
        return $this->belongsTo("App\ResultTest");
    }
}
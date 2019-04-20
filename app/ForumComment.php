<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $table = 'forum_comment';
    public $timestamps = false;

    public function forum(){
        return $this->belongsTo("App\Forum");
    }

    public function users(){
        return $this->belongsTo("App\User");
    }
}
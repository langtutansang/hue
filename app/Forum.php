<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'forum';
    public $timestamps = false;

    public function users(){
        return $this->belongsTo("App\User");
    }
    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function forumComment(){
        return $this->hasMany("App\ForumComment")->orderBy('created_at', 'DESC');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //一个课程对应多个评论
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use RecordInfo;
    protected $guarded = [];
    //一个文章对应多个评论
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

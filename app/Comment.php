<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RecordInfo;
class Comment extends Model
{
    use RecordInfo;
    protected $guarded=[];
    //一个评论对应一条记录
    public function commentable()
    {
        return $this->morphTo();
    }
}

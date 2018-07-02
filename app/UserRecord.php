<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRecord extends Model
{
    public $guarded = [];

    public function record()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

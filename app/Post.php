<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['thread_id', 'user_id', 'content'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function thread() {
        return $this->belongsTo(Thread::class);
    }
}

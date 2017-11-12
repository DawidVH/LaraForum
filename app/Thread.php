<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];
    public function posts() {
        return $this->hasMany('App\Post');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function section() {
        return $this->belongsTo('App\Section');
    }

    public function addPost($post) {
        $this->posts()->create($post);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['user_id', 'section_id', 'name', 'content', 'open'];
    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function addPost($post) {
        $this->posts()->create($post);
    }
}

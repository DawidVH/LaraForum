<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function threads() {
        return $this->hasMany('App\Thread');
    }

    public function addThread($thread) {
        $this->threads()->create($thread);
    }
}

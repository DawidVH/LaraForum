<?php

namespace App\Http\Controllers;
use App\Thread;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Thread $thread) {
        $thread->addPost([
            'content' => request('content'),
            'user_id' => auth()->id(),
            'thread_id' => $thread->id
        ]);
        return back();
    }
}

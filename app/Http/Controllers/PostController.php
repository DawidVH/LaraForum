<?php

namespace App\Http\Controllers;
use App\Thread;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Thread $thread) {
        $this->validate(request(), [
            'content' => 'required'
        ]);
        $thread->addPost([
            'content' => request('content'),
            'user_id' => auth()->id(),
            'thread_id' => $thread->id
        ]);
        return back();
    }
    public function destroy(Post $post) {
        $post->delete();
        return back();
    }
}

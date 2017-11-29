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
        $owner = $post->user()->getParent();
        if(auth()->id()==$owner->id || auth()->user()->hasRole('admin')) {
            $post->delete();
            session()->flash('message', 'The post has been deleted.');

            return back();
        } else {
            session()->flash('message', 'You are not allowed ot do that.');

            return back();
        }

    }
}

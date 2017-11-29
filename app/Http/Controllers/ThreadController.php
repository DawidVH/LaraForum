<?php

namespace App\Http\Controllers;
use App\Thread as Thread;
use App\User as User;
use App\Section;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function show(Section $section, Thread $thread) {
        return view('thread.show', [
            'thread' => $thread,
            'posts' => $thread->posts()->paginate(10),
            'section' => $section
        ]);
    }
   public function store(Section $section) {
        $this -> validate(request(), [
            'title' => 'required',
            'content' => 'required'
        ]);

        $section->addThread([
            'name' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id(),
            'section_id' => $section->id
        ]);
        return back();
   }

    public function destroy(Thread $thread) {
        $owner = $thread->user()->getParent();
        if(auth()->id()==$owner->id || auth()->user()->hasRole('admin')) {
            $thread->posts()->delete();
            $thread->delete();
            session()->flash('message', 'The thread has now been deleted.');

            return redirect('/');
        } else {
            session()->flash('message', 'You are not allowed to do that.');
            return back();
        }

    }
}

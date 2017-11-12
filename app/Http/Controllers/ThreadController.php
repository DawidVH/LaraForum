<?php

namespace App\Http\Controllers;
use App\Thread;
use App\Section;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function show(Thread $thread) {
        return view('thread.show', compact('thread'));
    }
   public function store(Section $section) {
        $section->addThread([
            'name' => request('title'),
            'content' => request('content'),
            'user_id' => auth()->id(),
            'section_id' => $section->id
        ]);
        return back();
   }
}

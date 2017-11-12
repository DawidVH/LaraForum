<?php

namespace App\Http\Controllers;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function show(Thread $thread) {
        return view('thread.show', compact('thread'));
    }
//    public function create(Section $section) {
//        return view('thread.create', compact('section'));
//    }
}

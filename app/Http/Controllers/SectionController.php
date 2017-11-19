<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;

class SectionController extends Controller
{
    public function index() {
        $sections = Section::all();
        return view('forum.index', compact('sections'));
    }

    public function show(Section $section) {
        return view('forum.section', [
            'section' => $section,
            'threads' => $section->threads()->latest()->paginate(10)
        ]);
    }
}

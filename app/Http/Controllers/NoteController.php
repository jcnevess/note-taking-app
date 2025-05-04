<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Tag;
use Inertia\Inertia;

class NoteController extends Controller
{
    public function show() {
        return Inertia::render('Home', ['notes' => Note::with('tags')->get(), 'tags' => Tag::all()]);
    }
}

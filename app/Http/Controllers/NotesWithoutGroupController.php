<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Group;
use App\Note;

class NotesWithoutGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
      $user_id = auth()->user()->id;
      $groups  = Group::where('user_id', $user_id)->get();
      $notes   = Note::with('group')->latest()->where('user_id', $user_id)
                                               ->withoutGroup()
                                               ->paginate(10);

      return view('notes.index', compact('notes', 'groups'));
    }
}

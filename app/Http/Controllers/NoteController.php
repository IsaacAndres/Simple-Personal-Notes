<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\Note;

class NoteController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $user_id = auth()->user()->id;
      $notes = Note::orderBy('id', 'DESC')->where('user_id', $user_id )->paginate();
      return view('notes.index', compact('notes'));
    }

    public function create()
    {
      return view('notes.create');
    }

    public function store(NoteRequest $request)
    {
      Note::create(request()->all());
      return redirect()->route('notes.index')
                       ->with('info', 'Nota guardada ');
    }

    public function update(NoteRequest $request, Note $note)
    {
      $note->update(request()->all());
      return redirect()->route('notes.index')
                       ->with('info', 'La nota ' . $note->title . ' fue actualizada.');
    }

    public function edit(Note $note)
    {
      return view('notes.edit', compact('note'));
    }

    public function show(Note $note)
    {
      return view('notes.show', compact('note'));
    }

    public function destroy(Note $note)
    {
      $note->delete();
      return back()->with('info', 'La nota ' . $note->title . ' fue eliminada.');
    }
}

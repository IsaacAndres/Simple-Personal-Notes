<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;
use App\Group;
use App\Note;
use Alert;

class NoteController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }


    public function index(Group $group = null)
    {
      $user_id = auth()->user()->id;
      $groups = Group::where('user_id', $user_id)->get();
      if ($group != null) {
        $notes = Note::latest()->where('user_id', $user_id)
                                            ->where('group_id', $group->id)
                                            ->paginate(10);
      } else {
        $notes = Note::latest()->where('user_id', $user_id)
                                            ->paginate(10);
      }

      return view('notes.index', compact('notes', 'groups'));
    }

    public function create()
    {
      $user_id = auth()->user()->id;
      $groups = Group::where('user_id', $user_id)->get()->pluck('name', 'id');
      return view('notes.create', compact('groups'));
    }

    public function store(NoteRequest $request)
    {
      $user_id = auth()->user()->id;
      $request->merge(['user_id' => $user_id]);
      Note::create($request->all());
      return redirect()->route('notes.index')
                       ->with('info', 'Nota guardada ');
    }

    public function update(NoteRequest $request, Note $note)
    {
      $this->authorize('pass', $note);
      $user_id = auth()->user()->id;
      $request->merge(['user_id' => $user_id]);
      $note->update($request->all());
      return redirect()->route('notes.index')
                       ->with('info', 'La nota ' . $note->title . ' fue actualizada.');
    }

    public function edit(Note $note)
    {
      $this->authorize('pass', $note);
      $user_id = auth()->user()->id;
      $groups = Group::where('user_id', $user_id)->get()->pluck('name', 'id');
      return view('notes.edit', compact('note', 'groups'));
    }

    public function show(Note $note)
    {
      $this->authorize('pass', $note);
      return view('notes.show', compact('note'));
    }

    public function destroy(Note $note)
    {
      $this->authorize('pass', $note);
      $note->delete();
      return back()->with('info', 'La nota ' . $note->title . ' fue eliminada.');
    }
}

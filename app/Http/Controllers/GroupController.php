<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $groups = Group::where('user_id', $user_id)->paginate(10);

        return view('groups.index', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $this->validate($request, [
          'name' => 'required',
        ]);

        $request->merge(['user_id' => $user_id]);
        Group::create($request->all());
        return redirect()->route('groups.index')
                         ->with('info', 'El grupo ' . $request->name . ' fue creado.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->authorize('pass', $group);
        $user_id = auth()->user()->id;
        $request->merge(['user_id' => $user_id]);
        $group->update($request->all());
        return redirect()->route('groups.index')
                         ->with('info', 'El grupo ' . $group->name . ' fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
      $this->authorize('pass', $group);
      $group->delete();
      return back()->with('info', 'El grupo ' . $group->name . ' fue eliminado.');
    }
}

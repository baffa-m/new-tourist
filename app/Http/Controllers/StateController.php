<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('admin.states.index', compact('states'));
    }

    public function create()
    {
        return view('admin.states.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_name' => 'required|string|max:255',
        ]);

        $state = State::create([
            'state_name' => $request->input('state_name'),
         ]);

        return redirect()->route('state.index', $state);
    }

    public function show(State $state)
    {
        // return view('states.show', compact('state'));
    }

    public function edit(State $state)
    {
        return view('admin.states.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $state->update([
            'state_name' => $request->input('state_name'),
        ]);

        return redirect()->route('state.show', $state);
    }

    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('state.index');
    }
}

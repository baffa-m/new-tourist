<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;

class AdminDestination extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        $states = State::all();
        return view('admin.destinations.create', compact('states'));
    }

    public function store(DestinationRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'image_path' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        $destination = Destination::create($validatedData);
        return redirect()->route('destinations.index', $destination);
    }

    public function show(Destination $destination)
    {
        return view('admin.destinations.show', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        $states = State::all();
        return view('admin.destinations.edit', compact('destination', 'states'));
    }

    public function update(DestinationRequest $request, Destination $destination)
    {
        $destination->update($request->validated());

        return redirect()->route('destinations.show', $destination);
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('destinations.index');
    }
}

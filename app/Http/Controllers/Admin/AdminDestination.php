<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;

class AdminDestination extends Controller
{

    public function Dash() {
        return view('admin.dashboard');
    }

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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'category' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
        ]);

        if ($request->hasFile('image_path')) {
            $uploadedImage = $request->file('image_path');
            $imagePath = $uploadedImage->store('uploads', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $destination = Destination::create($validatedData);

        return redirect()->route('destination.index')->with('success', 'Destination created successfully!');
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

        return redirect()->route('destination.show', $destination);
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()->route('destination.index');
    }
}

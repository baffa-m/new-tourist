<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DestinationRequest;
use App\Models\User;

class AdminDestination extends Controller
{

    public function Dash() {
        $states_count = State::count();
        $destinations_count = Destination::count();
        $users_count = User::count();
        return view('admin.dashboard', compact('states_count', 'destinations_count', 'users_count'));
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
            'category' => 'required|string|max:255',
            'state_id' => 'required|exists:states,id',
            'images' => 'required|array',  // Assuming it's an array of images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $destination = Destination::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'location' => $validatedData['location'],
            'category' => $validatedData['category'],
            'state_id' => $validatedData['state_id'],
            // Add other fields as needed
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('uploads', 'public');
                $destination->uploads()->create(['image_path' => $imagePath]);
            }
        }

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

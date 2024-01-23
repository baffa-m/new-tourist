<?php

namespace App\Http\Controllers\Admin;

use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel;

class AdminHotel extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $states = State::all();
        return view('admin.hotels.create', compact('states'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'price_range' => 'required|string|max:255',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming it's an image file
            'state_id' => 'required|exists:states,id',
        ]);

        if ($request->hasFile('image_path')) {
            $uploadedImage = $request->file('image_path');
            $imagePath = $uploadedImage->store('uploads', 'public');
            $validatedData['image_path'] = $imagePath;
        }

        $hotel = Hotel::create($validatedData);

        return redirect()->route('hotel.index')->with('success', 'Destination created successfully!');
    }

    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', compact('hotel'));
    }

    public function edit(Hotel $hotel)
    {
        $states = State::all();
        return view('admin.hotels.edit', compact('hotel', 'states'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $hotel->update($request->validated());

        return redirect()->route('hotel.show', $hotel);
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('hotel.index');
    }
}

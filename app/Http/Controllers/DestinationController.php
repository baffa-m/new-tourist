<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use App\Http\Requests\DestinationRequest;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(DestinationRequest $request)
    {
        $destination = Destination::create($request->validated());

        return redirect()->route('destinations.show', $destination);
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
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

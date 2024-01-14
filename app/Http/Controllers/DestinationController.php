<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DestinationController extends Controller
{
    public function index() {
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));

    }

    public function show(Destination $destination) {
        $reviews = $destination->reviews()->paginate(10);
        return view('destinations.show', compact('destination', 'reviews'));
    }

}

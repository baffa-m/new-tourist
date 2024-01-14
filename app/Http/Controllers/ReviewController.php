<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Destination;

class ReviewController extends Controller
{
    public function index()
    {
        // Implement index logic if needed
    }

    public function create()
    {
        return view('reviews.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rating' => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['destination_id'] = $request->destination_id;

        $review = Review::create($validatedData);

        return response()->json(['message' => 'Review submitted successfully.']);
    }
    
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    public function update(ReviewRequest $request, Review $review)
    {
        $review->update($request->validated());

        return redirect()->route('reviews.show', $review);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index');
    }
}

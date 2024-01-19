<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;

class ShowComponent extends Component
{
    public $destination;
    public $rating = 0;
    public $comment;


    protected $rules = [
        'rating' => 'nullable|integer|min:1|max:5',
        'comment' => 'nullable|string',
    ];

    public function setRating($value)
    {
        $this->rating = $value;
    }

    protected $preserveQueryString = true;

    public function render()
    {
        return view('livewire.show-component');
    }

    public function submitReview()
    {
        $this->validate();

        // Save the review to the database
        Review::create([
            'user_id' => auth()->user()->id,
            'destination_id' => $this->destination->id,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        // Reset values after submission
        $this->reset(['rating', 'comment']);

        $this->dispatch('reviewSubmitted');
    }
}

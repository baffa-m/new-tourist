<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewComponent extends Component
{
    use WithPagination;

    public $destination;

    protected $listeners = ['reviewSubmitted' => 'fetchReviews'];

    public function mount($destination)
    {
        $this->destination = $destination;
    }

    public function render()
    {
        $reviews = Review::where('destination_id', $this->destination->id)->paginate(5);

        return view('livewire.review-component', compact('reviews'));
    }

    public function submitReview()
    {
        // Validate and save the review

        $this->emit('reviewSubmitted');

        $this->resetPage(); // Add this line to reset the pagination to the first page
    }

    public function fetchReviews()
    {
        // Fetch updated reviews after submission
        $this->render();
    }
}

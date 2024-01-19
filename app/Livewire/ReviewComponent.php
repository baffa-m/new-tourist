<?php

namespace App\Livewire;

use App\Models\Review;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class ReviewComponent extends Component
{
    use WithPagination;

    public $destination;
    public $rating = 0; // Add the rating property

    #[On('reviewSubmitted')]
    public function refreshComments() {
        $reviews = Review::where('destination_id', $this->destination->id)->paginate(5);
    }

    public function mount($destination)
    {
        $this->destination = $destination;
    }

    protected $preserveQueryString = true;


    public function render()
    {
        $reviews = Review::where('destination_id', $this->destination->id)->latest('created_at')->paginate(5);

        return view('livewire.review-component', compact('reviews'));
    }




    public function fetchReviews()
    {
        // Fetch updated reviews after submission
        $this->render();
    }
}

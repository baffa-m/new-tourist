<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}


    <!-- Display existing reviews (ratings and comments) -->
    <div id="reviews-container">
        @forelse ($reviews as $review)
            <div class="mt-2 shadow-sm rounded-md">
                <span class="text-gray-600 dark:text-gray-300 font-bold">{{ $review->user->name }} - Rated: {{ $review->rating }}/5</span>
                <p class="text-gray-600 dark:text-gray-300">{{ $review->comment }}</p>
            </div>
            <hr class="bg-gray-400 h-0.5" />
        @empty
            <p>No reviews yet.</p>
        @endforelse
    </div>

    <!-- Pagination links container -->
    <div id="pagination-container">
        {{ $reviews->links() }}
    </div>

</div>

<x-app-layout>

    <div class="bg-white">

        <main class="my-8" wire:ignore>
            @livewire('show-component', ['destination' => $destination])
        </main>
    </div>

    <script>
        $(document).ready(function () {
            const starsContainer = $('#rating-stars');
            const ratingInput = $('#rating-input');
            const reviewForm = $('#review-form');
            const reviewsContainer = $('#reviews-container');
            const paginationContainer = $('#pagination-container');

            starsContainer.on('click', '.rating-star', function (event) {
                const selectedValue = $(this).data('value');
                ratingInput.val(selectedValue);

                // Reset all stars
                starsContainer.children().removeClass('text-yellow-400 peer-hover:text-yellow-400 hover:text-yellow-400');

                // Highlight selected stars
                $(this).addClass('text-yellow-400 peer-hover:text-yellow-400 hover:text-yellow-400');
                $(this).prevAll().addClass('text-yellow-400 peer-hover:text-yellow-400 hover:text-yellow-400');
            });

        });

        document.addEventListener('livewire:load', function () {
        const starsContainer = document.getElementById('rating-stars');

        starsContainer.addEventListener('click', function (event) {
            const selectedValue = event.target.dataset.value;

            Livewire.emit('setRating', selectedValue);

            // Reset all stars
            starsContainer.querySelectorAll('.rating-star').forEach(star => {
                star.classList.remove('text-yellow-400', 'peer-hover:text-yellow-400', 'hover:text-yellow-400');
            });

            // Highlight selected stars
            event.target.classList.add('text-yellow-400', 'peer-hover:text-yellow-400', 'hover:text-yellow-400');
            let prevStar = event.target.previousElementSibling;
            while (prevStar) {
                prevStar.classList.add('text-yellow-400', 'peer-hover:text-yellow-400', 'hover:text-yellow-400');
                prevStar = prevStar.previousElementSibling;
            }
        });
    });


    </script>

</x-app-layout>

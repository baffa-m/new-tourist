<div wire:ignore>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="container mx-auto px-6">
        <div class="dark:bg-gray-800 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="md:flex-row -mx-4">
                    <div class="md:flex-1 px-4">
                        
                        <div id="default-carousel" class="relative" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                                <!-- Item 1 -->
                                @foreach ($destination->uploads as $image)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <div class="h-96 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url({{ asset($image->image_path) }})">

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- Slider indicators -->
                            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    <span class="hidden">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    <span class="hidden">Next</span>
                                </span>
                            </button>
                        </div>
                        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

                    </div>
                    <div class="md:flex-1 px-4">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{ $destination->name }}</h2>
                        <p class="flex text-gray-600 dark:text-gray-300 text-sm mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                            {{ $destination->location }}
                        </p>

                        <div>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Destination Description:</span>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mt-2">
                                {{ $destination->description}}
                            </p>
                        </div>

                        <!-- Ratings and Comments Section -->
                        <div class="mt-4" wire:ignore>
                            <span class="font-bold text-gray-700 dark:text-gray-300">Ratings and Comments:</span>
                            <!-- You can customize the form and display based on your needs -->
                            <div wire:ignore>
                                <form id="review-form" wire:submit.prevent="submitReview" method="post">
                                    @csrf
                                    <input type="text" hidden name="destination_id" value="{{ $destination->id }}">
                                    <div>
                                        <div class="flex items-center mt-2">
                                            <span class="mr-2">Rate:</span>
                                            <div id="rating-stars" class="flex flex-row-reverse">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg wire:click="setRating({{ $i }})" class="rating-star text-gray-600 cursor-pointer duration-100" width="23" height="23" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        <!-- Use wire:model to keep the rating in sync -->
                                        <input type="text" wire:model="rating" hidden name="rating" id="rating-input">
                                        <textarea wire:model="comment" rows="3" class="w-full mt-2 px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md focus:outline-none focus:border-blue-500" placeholder="Add your comment..."></textarea>
                                        <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md">Submit Review</button>
                                    </div>
                                </form>
                            </div>

                            @livewire('review-component', ['destination' => $destination])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<x-app-layout>

    <div class="bg-white">

        <main class="my-8">
            <div class="container mx-auto px-6">
                @isset($recommendedDestinations)
                <h3 class="text-lg">Here Are Some Recommended Destinations Based on your Preferences</h3>
                @endisset
                <div class="my-6 rounded-2xl bg-gray-200">
                    @isset($recommendedDestinations)
                    <div id="default-carousel" class="relative" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                            <!-- Item 1 -->
                            @foreach ($recommendedDestinations as $destination)
                            @php $mainImage = $destination->uploads->first(); @endphp

                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url({{ $mainImage->image_path }}); background-size: cover; height: 100%">
                                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                                            <div class="px-10 max-w-xl">
                                                <h2 class="text-2xl text-white font-semibold">{{ $destination->name }}</h2>
                                                <p class="mt-2 text-gray-400">{{ Str::limit($destination->description, 50) }}</p>
                                                <a href="{{ route('destinations.show', ['destination' => $destination])}}" class="flex items-center mt-4 pl-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                    <span>View</span>
                                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                                </a>
                                            </div>
                                        </div>
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
                    @endisset
                    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
                </div>

                <div class="md:flex mt-8 md:-mx-4">
                    @isset($high_review_destination)
                    @php $mainImage = $high_review_destination->uploads->first(); @endphp

                    <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" style="background-image: url({{ asset($mainImage->image_path)}})">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <p class="mt-2 text-gray-400">View destination with highest review in your location.</p>
                                <h2 class="text-2xl text-white font-semibold">{{ $high_review_destination->name }}</h2>
                                <a href="{{ route('destinations.show', ['destination' => $high_review_destination])}}" class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span>View</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endisset
                    @isset($recommended_hotel)

                    <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2" style="background-image: url({{ asset($recommended_hotel->image_path)}})">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <p class="mt-2 text-gray-400">We recommend this hotel for you</p>
                                <h2 class="text-2xl text-white font-semibold">{{ $recommended_hotel->name }}</h2>
                                <p class="mt-2 text-gray-400">{{ $recommended_hotel->price_range }}</p>

                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Trending</h3>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($trending_destinations as $destination)
                        @php $mainImage = $destination->uploads->first(); @endphp
                            <a href="{{ route('destinations.show', ['destination' => $destination])}}">
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ $mainImage->image_path }})"></div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase">{{ $destination->name}}</h3>
                                        <span class="text-gray-500 mt-2">{{ $destination->location }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">New Destinations</h3>
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($new_destinations as $destination)
                        @php $mainImage = $destination->uploads->first(); @endphp
                            <a href="{{ route('destinations.show', ['destination' => $destination])}}">
                                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                    <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ $mainImage->image_path }})"></div>
                                    <div class="px-5 py-3">
                                        <h3 class="text-gray-700 uppercase">{{ $destination->name}}</h3>
                                        <span class="text-gray-500 mt-2">{{ $destination->location }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>


    </div>

</x-app-layout>

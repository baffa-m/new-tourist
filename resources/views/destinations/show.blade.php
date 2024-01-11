<x-app-layout>

    <div class="bg-white">

        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="dark:bg-gray-800 py-8">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="md:flex-row -mx-4">
                            <div class="md:flex-1 px-4">
                                <div class="h-[460px] w-full rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                                    <img class="w-full h-full object-cover" src="{{ asset('storage/' . $destination->image_path) }}" alt="Destination Image">
                                </div>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

</x-app-layout>

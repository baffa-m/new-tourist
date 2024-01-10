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
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">

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

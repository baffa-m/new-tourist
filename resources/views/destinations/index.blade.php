<x-app-layout>
    <div class="bg-white">
        <main class="my-8">
            @foreach ($destinations as $destination)
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <a href="{{ route('destinations.show', ['destination' => $destination])}}">
                            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">

                                </div>
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase">{{ $destination->name}}</h3>
                                    <span class="text-gray-500 mt-2">{{ $destination->location }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
        </main>
    </div>

</x-app-layout>

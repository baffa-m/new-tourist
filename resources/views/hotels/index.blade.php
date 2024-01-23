<x-app-layout>
    <div class="bg-white">
        <main class="my-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach ($hotels as $hotel)
                    <a href="{{ route('hotels.show', ['hotel' => $hotel])}}">
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url({{ $hotel->image_path }})"></div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{ $hotel->name}}</h3>
                                <span class="text-gray-500 mt-2">{{ $hotel->address }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </main>
    </div>
</x-app-layout>

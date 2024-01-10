<header>
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                Brand
            </div>
            <div class="flex items-center justify-end w-full">

                @guest
        <div class="flex space-x-5">
            <a class="flex space-x-2 items-center hover:text-yellow-500 text-lg text-gray-500"
                href="http://127.0.0.1:8000/login">
                Login
            </a>
            <a class="flex space-x-2 items-center hover:text-yellow-500 text-lg text-gray-500"
                href="http://127.0.0.1:8000/register">
                Register
            </a>
        </div>
        @endguest
        @auth
        <div class="ms-3 relative">
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
        @endauth

                <div class="flex sm:hidden">
                    <button @click="isOpen = !isOpen" type="button" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                            <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
                <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="{{ route('home')}}">Home</a>
                <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="{{ route('destinations.index')}}">Destinations</a>
                <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="{{ route('hotels.index')}}">Hotels</a>
                <a class="mt-3 text-gray-600 dark:text-white hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
            </div>
        </nav>

    </div>
</header>

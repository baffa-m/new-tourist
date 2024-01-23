<x-guest-layout>
    <form method="POST" class="w-80" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                <div class="text-xs">
                    <ul>
                        <li>The password should not be less than 8 characters</li>
                        <li>The password should not be more than 16 char characters</li>
                    </ul>
                </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <h4 class="mt-2">Preferences</h4>
        <div>
            <div class="my-2">
                Historic
                <label for="historic_yes">
                    <input type="radio" name="historic" id="historic_yes" value="1">
                    Yes
                </label>
                <label for="historic_no">
                    <input type="radio" name="historic" id="historic_no" value="0">
                    No
                </label>
            </div>

            <div class="my-2">
                Shopping
                <label for="shopping_yes">
                    <input type="radio" name="shopping" id="shopping_yes" value="1">
                    Yes
                </label>
                <label for="shopping_no">
                    <input type="radio" name="shopping" id="shopping_no" value="0">
                    No
                </label>
            </div>

            <div class="my-2">
                Nature and Wildlife
                <label for="nature_yes">
                    <input type="radio" name="nature_wildlife" id="nature_yes" value="1">
                    Yes
                </label>
                <label for="nature_no">
                    <input type="radio" name="nature_wildlife" id="nature_no" value="0">
                    No
                </label>
            </div>

            <div class="my-2">
                Parks
                <label for="parks_yes">
                    <input type="radio" name="parks" id="parks_yes" value="1">
                    Yes
                </label>
                <label for="parks_no">
                    <input type="radio" name="parks" id="parks_no" value="0">
                    No
                </label>
            </div>

            <div class="my-2">
                Sports
                <label for="sports_yes">
                    <input type="radio" name="sports" id="sports_yes" value="1">
                    Yes
                </label>
                <label for="sports_no">
                    <input type="radio" name="sports" id="sports_no" value="0">
                    No
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

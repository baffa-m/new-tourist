<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Preference Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your preference so we can show you destinations according to your taste.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('preference.update') }}" class="mt-6 space-y-6 dark:text-white">
        @csrf
        @method('patch')

        <div>
            Historic
            <label for="historic_yes">
                <input type="radio" name="historic" id="historic_yes" value="1" {{ $userPreferences && $userPreferences->historic ? 'checked' : '' }}>
                Yes
            </label>
            <label for="historic_no">
                <input type="radio" name="historic" id="historic_no" value="0" {{ $userPreferences && !$userPreferences->historic ? 'checked' : '' }}>
                No
            </label>
        </div>

        <div>
            Shopping
            <label for="shopping_yes">
                <input type="radio" name="shopping" id="shopping_yes" value="1" {{ $userPreferences && $userPreferences->shopping ? 'checked' : '' }}>
                Yes
            </label>
            <label for="shopping_no">
                <input type="radio" name="shopping" id="shopping_no" value="0" {{ $userPreferences && !$userPreferences->shopping ? 'checked' : '' }}>
                No
            </label>
        </div>

        <div>
            Nature and Wildlife
            <label for="nature_yes">
                <input type="radio" name="nature_wildlife" id="nature_yes" value="1" {{ $userPreferences && $userPreferences->nature_wildlife ? 'checked' : '' }}>
                Yes
            </label>
            <label for="nature_no">
                <input type="radio" name="nature_wildlife" id="nature_no" value="0" {{ $userPreferences && !$userPreferences->nature_wildlife ? 'checked' : '' }}>
                No
            </label>
        </div>

        <div>
            Parks
            <label for="parks_yes">
                <input type="radio" name="parks" id="parks_yes" value="1" {{ $userPreferences && $userPreferences->parks ? 'checked' : '' }}>
                Yes
            </label>
            <label for="parks_no">
                <input type="radio" name="parks" id="parks_no" value="0" {{ $userPreferences && !$userPreferences->parks ? 'checked' : '' }}>
                No
            </label>
        </div>

        <div>
            Sports
            <label for="sports_yes">
                <input type="radio" name="sports" id="sports_yes" value="1" {{ $userPreferences && $userPreferences->sports ? 'checked' : '' }}>
                Yes
            </label>
            <label for="sports_no">
                <input type="radio" name="sports" id="sports_no" value="0" {{ $userPreferences && !$userPreferences->sports ? 'checked' : '' }}>
                No
            </label>
        </div>

        <!-- Repeat the structure for other radio button groups (nature_wildlife, parks, sports) -->

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

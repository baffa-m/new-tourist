<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Name
    </label>
    <input value="{{ old('name', isset($destination->name) ? $destination->name : null) }}"
     class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" type="text" placeholder="e.g. Meseum">
     @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
   </div>
    <div class="w-full md:w-1/2 px-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Location
    </label>
    <input value="{{ old('location', isset($destination->location) ? $destination->location : null) }}"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="location" type="text" placeholder="Address">
    @error('location')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full -1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Description
    </label>
    <textarea
     name="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="e.g. About the place">
     {{ old('description', isset($destination->description) ? $destination->description : null) }}
    </textarea>
    @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            Upload Image
        </label>
        <input name="images[]"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
               type="file" multiple>
        @error('images')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>

    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        State
      </label>
      <div class="relative">
        <select name="state_id" id="state">
            <option>Select State</option>
            @foreach ($states as $state)
                <option {{ $state->id == old('state', isset($application) ? $application->state_id : '') ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
        Category
      </label>
      <select name="category" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option value="">Select an Option</option>
            <option value="historic" {{ (old('category', isset($destination->category) ? $destination->category : null) == 'historic') ? 'selected' : '' }}>Historical</option>
            <option value="shopping" {{ (old('category', isset($destination->category) ? $destination->category : null) == 'shopping') ? 'selected' : '' }}>Shopping</option>
            <option value="nature_wildlife" {{ (old('category', isset($destination->category) ? $destination->category : null) == 'nature_wildlife') ? 'selected' : '' }}>Nature & Wildlife</option>
            <option value="parks" {{ (old('category', isset($destination->category) ? $destination->category : null) == 'parks') ? 'selected' : '' }}>Parks</option>
            <option value="sports" {{ (old('category', isset($destination->category) ? $destination->category : null) == 'sports') ? 'selected' : '' }}>Sports</option>
        </select>

    </div>
  </div>

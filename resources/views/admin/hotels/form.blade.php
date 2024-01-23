<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        Name
    </label>
    <input value="{{ old('name', isset($hotel->name) ? $hotel->name : null) }}"
     class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" type="text" placeholder="Hotel Name">
     @error('name')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
   </div>
    <div class="w-full md:w-1/2 px-3">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Address
    </label>
    <input value="{{ old('address', isset($hotel->address) ? $hotel->address : null) }}"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="address" type="text" placeholder="Address">
    @error('address')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Price Range
        </label>
        <input value="{{ old('price_range', isset($hotel->price_range) ? $hotel->price_range : null) }}"
        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="price_range" type="text" placeholder="Price Range">
        @error('price_range')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
</div>


<div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Upload Image
      </label>
      <input name="image_path" value="{{ old('image_path', isset($hotel->image_path) ? $hotel->image_path : null) }}"
       class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="file">
       @error('image_path')
       <p class="text-red-500 text-xs italic">{{ $message }}</p>
   @enderror
    </div>
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
        State
      </label>
      <div class="relative">
        <select name="state" id="state">
            <option>Select State</option>
            @foreach ($states as $state)
                <option {{ $state->id == old('state', isset($hotel) ? $hotel->state_id : '') ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
      </div>
    </div>
  </div>

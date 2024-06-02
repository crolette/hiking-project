<?php

use Illuminate\Support\Facades\Auth;

?>


@section('pageTitle', 'Edit a new hike')
@section('meta_description', 'JCVD - Edit a hike')

<x-app-layout>
    <x-slot name="header">
        {{ __('Edit a hike') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-emerald-500">
                <div class="p-6 text-gray-900">
    <form action="{{ route('hike.update', ['id' => $id]) }}" method="POST">
        @csrf
@method ('PATCH')
<div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" id="name" name="name" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $hike->name }}"  required>
  </div>
  <div class="mb-5">
  <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
      <input type="text" id="location" name="location" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="{{ $hike->location }}" required>
  </div>
    <div class="mb-5">
  <label for="distance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distance</label>
      <input type="number" id="distance" name="distance" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="{{ $hike->distance }}" required>
  </div>
    <div class="mb-5">
  <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
      <input type="time" id="duration" name="duration" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="{{ $hike->duration }}" required>
  </div>

    <div class="mb-5">
  <label for="elevation_gain" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Elevation Gain</label>
      <input type="number" id="elevation_gain" name="elevation_gain" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="{{ $hike->elevation_gain }}" min="0" length="5" required>
  </div>

    <fieldset class="mb-5">
    <legend class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Choose the type of hike:</legend>
    <div class="flex flex-col gap-2">
<div class="flex items-center gap-2">

        <input type="radio" id="one_way" name="round_trip"  value="0"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" min="0" length="5" {{$hike->round_trip == 0 ? 'checked' : '' }} />
        <label for="one_way" class="block text-sm font-medium text-gray-900 dark:text-white">One way</label>
    </div>
    
    <div class="flex items-center gap-2">

        <input type="radio" id="round_trip" name="round_trip" value="1"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" min="0" length="5" {{$hike->round_trip == 1 ? 'checked' : '' }} />
        <label for="round_trip" class="block text-sm font-medium text-gray-900 dark:text-white">Round trip</label>
    </div>
    
    </div>
    </fieldset>

          <div class="mb-5">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
      <textarea type="text" id="description" name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  value="{{ $hike->description }}"></textarea>
  </div>
        

         <div>
            <fieldset class="mb-5">
                <legend class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</legend>
            @foreach($tags as $tag)

                <div class="flex items-center gap-2">
                    <input type="checkbox" id="{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" 
                    {{ in_array($tag->id, $hikeTags)? 'checked' : '' }} >
                    <label for="{{ $tag->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $tag->name }}</label>
                </div>
                @endforeach
            </fieldset>
        </div>

        

        <button type='submit' class="items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">Create hike</button>
    </form>
</div>
</div>
</div>
</div>
</x-app-layout>
<?php

use Illuminate\Support\Facades\Auth;

 ?>

@section('pageTitle', 'Hike Details - ' . $hike->name)
@section('meta_description', 'JCVD - Hike Details - ' . $hike->name)

<x-app-layout>
    <x-slot name="header">
        {{ $hike->name }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-hike-details :hike='$hike' :tags='$tags' />

            
            <?php if((Auth::user() && $hike->created_by === Auth::user()->id) || (Auth::user() && Auth::user()->admin === 1)) : ?>
                <form action="{{ route('hike.edit', ['id' => $hike->id]) }}" method="get">
                @csrf
                <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
            </form>
            <form action="{{ route('hike.destroy', ['id' => $hike->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
            </form>
            <?php endif;?>

        </div>
    </div>
</x-app-layout>
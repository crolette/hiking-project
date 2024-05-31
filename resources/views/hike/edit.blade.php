@section('pageTitle', 'Edit a hike')
@section('meta_description', 'JCVD - Edit a hike')

<x-app-layout>
    <x-slot name="header">
        {{ __('Edit a new hike') }}
    </x-slot>
    <form action="{{ route('hike.update', ['id' => $id]) }}" method="POST">
        @csrf
        @method ('PATCH')
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ $hike->name }}" required><br>

        <label for=" location">Location:</label><br>
        <input type="text" id="location" name="location" value="{{ $hike->location }}" required><br>

        <label for="distance">Distance:</label><br>
        <input type="number" id="distance" name="distance" value="{{ $hike->distance }}" required><br>

        <label for="duration">Duration:</label><br>
        <input type="time" id="duration" name="duration" value="{{ $hike->duration }}" required><br>

        <label for="elevation_gain">Elevation Gain:</label><br>
        <input type="number" id="elevation_gain" value="{{ $hike->elevation_gain }}" name="elevation_gain" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ $hike->description }}</textarea><br>

        <button type="submit">Edit Hike</button>
    </form>
</x-app-layout>
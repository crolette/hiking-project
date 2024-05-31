@section('pageTitle', 'Edit a hike')
@section('meta_description', 'JCVD - Edit a hike')

<x-app-layout>
    <x-slot name="header">
        {{ __('Edit a new hike') }}
    </x-slot>
    <form action="{{ route('hike.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="location">Location:</label><br>
        <input type="text" id="location" name="location" required><br>

        <label for="distance">Distance:</label><br>
        <input type="number" id="distance" name="distance" required><br>

        <label for="duration">Duration:</label><br>
        <input type="time" id="duration" name="duration" required><br>

        <label for="elevation_gain">Elevation Gain:</label><br>
        <input type="number" id="elevation_gain" name="elevation_gain" required><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>

        <button type="submit">Edit Hike</button>
    </form>
</x-app-layout>
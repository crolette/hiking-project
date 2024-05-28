@extends('layout.layout')

@section('title', 'Login')
@section('meta_description', 'JCVD - Login')

@section('content')

@endsection
<x-app-layout>
<main class="w-full bg-slate-100 p-4">
    <h1  class="text-2xl font-bold text-teal-500">Welcome <?php echo session('username') ?></h1>
    <h1>All Hikes</h1>
    <a href="/">Home</a>
    <ul>
        @foreach ($hikes as $hike)
        <?php var_dump($hike)?>
        <li>
            <a href="{{ route('hike.details', ['id' => $hike->id]) }}">{{ $hike->name }}</a>
            ({{ $hike->location }})
        </li>
        @endforeach
    </ul>
</main>
</x-app-layout>
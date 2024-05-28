
@section('title', 'Login')
@section('meta_description', 'JCVD - Login')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All hikes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <ul>
        @foreach ($hikes as $hike)
        <?php var_dump($hike)?>
        <li>
            <a href="{{ route('hike.details', ['id' => $hike->id]) }}">{{ $hike->name }}</a>
            ({{ $hike->location }})
        </li>
        @endforeach
    </ul>
</div>
</div>


</x-app-layout>
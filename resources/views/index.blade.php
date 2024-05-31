@section('pageTitle', 'Home')
@section('meta_description', 'JCVD - Home')

<x-app-layout>
    <x-slot name="header">
            {{ __('Welcome') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <h2 class="text-xl font-semibold max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">Latest hikes</h2>
    <div class="flex flex-wrap">
            @foreach($recentHikes as $hike)
            <x-hike-card :hike='$hike' />
        @endforeach
    </div>
    </div>
</div>
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

    <h2 class="text-xl font-semibold max-w-7xl mx-auto sm:px-6 lg:px-8 mt-2">Top hikes</h2>
        <div class="flex flex-wrap">
        @foreach($randomHikes as $hike)
            <x-hike-card :hike='$hike' />
        @endforeach
    </div>
    </div>
</div>
</div>


</x-app-layout>

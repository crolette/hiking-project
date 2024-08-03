@if(isset($tag))
    @section('pageTitle', 'Hikes filtered by ' . $tag)
    @section('meta_description', 'Hikes filtered by ' . $tag)
@else
    @section('pageTitle', 'All hikes')
    @section('meta_description', 'All hikes')
@endif

<x-app-layout>
    <x-slot name="header">
            @if(isset($tag))
                {{ __('Hikes filtered by ' . $tag) }}
            @else
                {{ __('All hikes') }}
            @endif
    </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <div>
                <h3 class="font-bold">Filters</h3>
                <ul class="flex">
                    @foreach ($filters as $filter)
                    <li>
                        <x-filter :href="route('hike.tags', ['tag' => $filter->name])" :active="$tag == $filter->name">
                        {{$filter->name}}
                        </x-filter>
                    </li>
                    @endforeach
                    <li>
                        <a href="{{route('hike.hikes')}}" class="bg-red-300 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 ">Clear filters</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            <ul>
                <div class="grid-cols-1 sm:grid md:grid-cols-3 ">
                    @foreach ($hikes as $hike)
                        <li>
                            <x-hike-card :hike="$hike" :tags="$tags"/>
                        </li>
                    @endforeach
                </div>
            </ul>
            <p>hello</p>
            </div>
    </div>
</x-app-layout>
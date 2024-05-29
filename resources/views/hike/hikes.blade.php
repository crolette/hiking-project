@section('pageTitle', 'All hikes')
@section('meta_description', 'All hikes')

<x-app-layout>
    <x-slot name="header">
            {{ __('All hikes') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <h3>Filters</h3>
                <ul class="flex">
                    @foreach ($filters as $filter)
                    <li>
                        <a href="{{ route('hike.tags', ['tag' => $filter->name]) }}">
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-100">{{$filter->name}}</span>
                         </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <ul>
                <div class="grid-cols-1 sm:grid md:grid-cols-3 ">
                    @foreach ($hikes as $hike)
                        <li>
                            <x-hike-card :hike="$hike" :tags="$tags"/>
                        </li>
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
</x-app-layout>
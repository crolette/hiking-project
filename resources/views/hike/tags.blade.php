@section('pageTitle', 'Hikes - ' . $tag)
@section('meta_description', 'JCVD - Tag')

<x-app-layout>
    <x-slot name="header">
            {{ __('Hikes filtered by ') }} {{$tag}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
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

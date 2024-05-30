@section('pageTitle', 'Hike Details - ' . $hike->name)
@section('meta_description', 'JCVD - Hike Details - ' . $hike->name)

<x-app-layout>
    <x-slot name="header">
        {{ $hike->name }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-hike-details :hike='$hike' :tags='$tags' />
        </div>
    </div>
</x-app-layout>
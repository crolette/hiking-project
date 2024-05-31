@section('pageTitle', 'Hike Details - ' . $hike->name)
@section('meta_description', 'JCVD - Hike Details - ' . $hike->name)

<x-app-layout>
    <x-slot name="header">
        {{ $hike->name }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-hike-details :hike='$hike' :tags='$tags' />
            @if($hike->created_by == $userId)
            <form action="{{ route('hike.edit', ['id' => $hike->id]) }}" method="get">
                <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
            </form>
            <form action="{{ route('hike.destroy', ['id' => $hike->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
            </form>
            @endif
        </div>
    </div>
</x-app-layout>
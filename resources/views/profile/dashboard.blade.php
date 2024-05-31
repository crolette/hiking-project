@section('pageTitle', 'Dashboard')
@section('meta_description', 'JCVD - Dashboard')


<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

                <div>
                    <div class="text-gray-900 bg-gray-200">
                        <div class="p-4 flex">
                            <h2 class="text-3xl">
                                Hikes
                            </h2>

                        </div>
                        <div class="px-3 py-4 flex justify-center">
                            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                                <thead>
                                    <tr class="border-b">
                                        <th class="text-left p-3 px-5">Name</th>
                                        <th class="text-left p-3 px-5">Location</th>
                                        <th class="text-left p-3 px-5">Distance</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($hikes as $hike)
                                    @if ($userId == $hike->created_by)
                                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                        <td class="p-3 px-5">{{$hike->name}}</td>
                                        <td class="p-3 px-5">{{$hike->location}}</td>
                                        <td class="p-3 px-5">
                                            {{$hike->distance}}
                                        </td>
                                        <td class="p-3 px-5 flex justify-end">
                                            <form action="{{ route('hike.edit', ['id' => $hike->id]) }}" method="get">
                                                <button type="submit" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</button>
                                            </form>
                                            <form action="{{ route('hike.destroy', ['id' => $hike->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
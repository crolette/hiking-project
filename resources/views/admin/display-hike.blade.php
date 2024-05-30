@section('pageTitle', 'Admin panel - Search users')
@section('meta_description', 'JCVD - Admin panel - Search users')

<x-app-layout>
    <x-slot name="header">
        @if(isset($parameters['delete']))
            {{ __('Admin - Delete hike') }}
        @endif
            
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Distance
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Duration
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Elevation
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$hike->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$hike->location}}
                            </td>
                            <td class="px-6 py-4">
                                {{$hike->distance}}
                            </td>
                            <td class="px-6 py-4">
                                {{$hike->duration}}
                            </td>
                            
                            <td class="px-6 py-4">
                                {{$hike->elevation_gain}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4">
                                <a href="" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            
            @if(isset($parameters['delete']))
            <form action="" method="post">
                @csrf
                <p>Are you sure you want delete this user ? </p>
              <button type="submit">Yes</button>  
            </form>
            @endif
        </div>
        </div>
        </div>
    </div>
</x-app-layout>
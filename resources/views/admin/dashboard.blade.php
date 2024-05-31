@section('pageTitle', 'Admin panel')
@section('meta_description', 'JCVD - Admin panel')

<x-app-layout>
    <x-slot name="header">
            {{ __('Admin') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col">
                    <a href="{{route('hike.create')}}">
                        <button type="button" class="text-white bg-gradient-to-r from-emerald-400 via-emerald-600 to-emerald-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add a hike</button>
                    </a>
                    <a href="{{route('admin.search-users')}}">
                        <button type="button" class="text-white bg-gradient-to-r from-emerald-400 via-emerald-600 to-emerald-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit users</button>
                    </a>
                    <a href="{{route('admin.search-hikes')}}">
                        <button type="button" class="text-white bg-gradient-to-r from-emerald-400 via-emerald-600 to-emerald-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit hikes</button>
                    </a>
                    <a href="{{route('admin.search-tags')}}">
                        <button type="button" class="text-white bg-gradient-to-r from-emerald-400 via-emerald-600 to-emerald-900 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit tags</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
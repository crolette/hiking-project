@section('pageTitle', 'Admin panel - Edit users')
@section('meta_description', 'JCVD - Admin panel - Edit users')

<x-app-layout>
    <x-slot name="header">
            {{ __('Admin - Edit users') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <form class="max-w-sm mx-auto" method="POST" action="{{route('admin.search-users') }}">
                        @csrf
                        <div class="mb-5">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-700 uppercase 
                             dark:text-gray-400">Search a user</label>
                            <input type="text" id="user" name="user" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{old('user')}}" placeholder="johndoe" required />
                            <x-input-error :messages="$errors->get('user')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                            
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </form>
                </div>
            </div>
            @if(isset($users))
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Firstname
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lastname
                            </th>
                            <th scope="col" class="px-6 py-3">
                                E-mail
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Admin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)                    
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$user->username}}
                            </th>
                            <td class="px-6 py-4">
                                {{$user->firstname}}
                            </td>
                            <td class="px-6 py-4">
                                {{$user->lastname}}
                            </td>
                            <td class="px-6 py-4">
                                {{$user->email}}
                            </td>
                            @if($user->admin === 1)
                                <td class="px-6 py-4">
                                    YES
                                </td>
                            @else
                            <td class="px-6 py-4">
                                <a href="{{route('admin.edit-user', ['id' => $user->id, 'make-admin' => 'yes'])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Make admin</a>
                            </td>
                            @endif
                            <td class="px-6 py-4">
                                <a href="{{route('admin.edit-user', ['id' => $user->id, 'delete' => 'yes'])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div>
            @endif
    </div>
</x-app-layout>
@section('pageTitle', 'Admin panel - Search users')
@section('meta_description', 'JCVD - Admin panel - Search users')

<x-app-layout>
    <x-slot name="header">
        @if(isset($parameters['make-admin']))
            {{ __('Admin - Make user admin') }}
        @endif
        @if(isset($parameters['delete']))
            {{ __('Admin - Delete user') }}
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
                        </tr>
                    </thead>
                    <tbody>                  
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
                            
                            <td class="px-6 py-4">
                                NO
                            </td>
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            @if(isset($parameters['make-admin']))
            <form action="" method="post">
                @csrf
                <p>Are you sure you want make this user admin ? </p>
              <button type="submit">Yes</button>  
            </form>
            @endif
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
@section('pageTitle', 'Admin panel - Edit tag')
@section('meta_description', 'JCVD - Admin panel - Edit tag')

<x-app-layout>
    <x-slot name="header">
        @if(isset($parameters['delete']))
            {{ __('Admin - Delete tag : '.$tag->name) }}
        @endif
        @if(isset($parameters['edit']))
            {{ __('Admin - Edit tag : '.$tag->name) }}
        @endif
            
    </x-slot>
    @if(isset($parameters['delete']))
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
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$tag->name}}
                            </th>
                            
                        </tr>
                    </div>
                </tbody>
            </table>
        </div>
        <div class="mt-2">
            
           
            <form action="" method="post">
                @csrf
                <p>Are you sure you want delete this tag ? </p>
              
              <x-danger-button>Yes</x-danger-button>
            </form>
            @endif

            @if(isset($parameters['edit']))

            <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="max-w-sm mx-auto" method="POST" action="">
                        @csrf
                        <div class="mb-5">
                            <label for="user" class="block mb-2 text-sm font-medium text-gray-700 uppercase 
                             dark:text-gray-400">Edit tag name</label>
                            <input type="text" id="tag" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{$tag->name}}" placeholder="nature" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                            <x-save-button>Save</x-save-button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
            @endif
        </div>
        </div>
        </div>
    </div>
</x-app-layout>
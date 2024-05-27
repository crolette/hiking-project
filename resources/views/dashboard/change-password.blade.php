@extends('layout.layout')

@section('title', 'Modify my password')
@section('meta_description', 'JCVD - Modify my password')

@section('content')
    <main class="w-full bg-slate-100 p-4">

        <h1 class="text-2xl font-bold text-teal-500">Modify my password</h1>
       
        <form method="post" action="" class="max-w-sm mx-auto">
            @csrf

       
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your new password</label>
            <input type="password" id="password" name="pass" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required  />
        </div>
        <div class="mb-5">
            <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900">Repeat your password</label>
            <input type="password" id="repeat-password" name="repeat-pass" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
        </div>
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Modify my password</button>
        </form>

    </main>
    
@endsection
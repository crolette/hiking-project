@extends('layout.layout')

@section('title', 'Edit my profile')
@section('meta_description', 'JCVD - Edit my profile')

@section('content')
    <main class="w-full bg-slate-100 p-4">

        <h1 class="text-2xl font-bold text-teal-500">Edit my profile</h1>
       
        <form method="post" action="" class="max-w-sm mx-auto">
            @csrf

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
            <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value=<?= $user['email'] ?> required />
        </div>
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Your username</label>
            <input type="username" id="username" name="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value=<?= $user['username'] ?> required maxlength="30" />
        </div>
        <div class="mb-5">
            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900">Your firstname</label>
            <input type="firstname" id="firstname" name="firstname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value=<?= $user['firstname'] ?>  maxlength="30" />
        </div>
        <div class="mb-5">
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900">Your lastname</label>
            <input type="lastname" id="lastname" name="lastname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value=<?= $user['lastname'] ?>  maxlength="30" />
        </div>
       
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update my profile</button>
        </form>

    </main>
    
@endsection
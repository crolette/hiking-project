@extends('layout.layout')

@section('title', 'User Profile')
@section('meta_description', 'JCVD - User Profile')

@section('content')

    
<main class="w-full bg-slate-100 p-4">

    <h1 class="text-2xl font-bold text-teal-500">User profile</h1>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
     
        <tbody>
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Username
                </th>
                <td class="px-6 py-4">
                    <?= $user['username']?>
                </td>
                
            </tr>
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    E-mail
                </th>
                <td class="px-6 py-4">
                    <?= $user['email']?>
                </td>
            </tr>
            <tr class="bg-white border-b hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    First name
                </th>
                <td class="px-6 py-4">
                    <?= $user['firstname']?>
                </td>
                
            </tr>
            <tr class="bg-white hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Lastname
                </th>
                <td class="px-6 py-4">
                    <?= $user['lastname']?>
                </td>
            </tr>
            <tr class="bg-white hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Role
                </th>
                <td class="px-6 py-4">
                    <?= $user['admin']?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<button type="button" class="text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"><a href="/user-profile/change-password">Change password</a></button>
<button type="button" class="text-white mt-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none"><a href="/user-profile/edit">Edit profile</a></button>


</main>

@endsection
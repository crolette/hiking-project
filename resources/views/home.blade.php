@extends('layout.layout')

@section('title', 'Login')
@section('meta_description', 'JCVD - Login')

@section('content')
<main class="w-full bg-slate-100 p-4">
    <h1  class="text-2xl font-bold text-teal-500">Welcome <?php echo session('username') ?></h1>
</main>
@endsection

@section('pageTitle', 'Home')
@section('meta_description', 'JCVD - Home')

<x-app-layout>
    <x-slot name="header">
            {{ __('Welcome') }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <p>Hello</p>    
        </div>
    </div>
</x-app-layout>

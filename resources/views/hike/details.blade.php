
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All hikes') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
       <table>
        <tr>
            <th>name</th>
            <th>location</th>
            <th>distance</th>
            <th>duration</th>
            <th>elevation gain</th>
            <th>description</th>
            <th>created at:</th>
            <th>updated at:</th>
        </tr>
        <tr>
            <td>{{ $hike->name }}</td>
            <td>{{ $hike->location }}</td>
            <td>{{ $hike->distance}}</td>
            <td>{{ $hike->duration }}</td>
            <td>{{ $hike->elevation_gain }}</td>
            <td>{{ $hike->description }}</td>
            <td>{{ $hike->created_at }}</td>
            <td>{{ $hike->updated_at }}</td>

        </tr>
    </table>
</div>
</div>


</x-app-layout>
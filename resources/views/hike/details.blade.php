@section('pageTitle', 'Hike Details - ' . $hike->name)
@section('meta_description', 'JCVD - Hike Details - ' . $hike->name)

<x-app-layout>
    <x-slot name="header">
        {{ $hike->name }}
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <table>
                <tr class="text-left font-bold">
                    <th class="px-4 py-3">name</th>
                    <th>location</th>
                    <th>distance</th>
                    <th>duration</th>
                    <th>elevation gain</th>
                    <th>description</th>
                    <th>created at:</th>
                    <th>updated at:</th>
                </tr>
                <tr>
                    <td class="border-t px-4 py-3">{{ $hike->name }}</td>
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



            <x-hike-details :hike='$hike' :tags='$tags'/>
    </div>
</div>

</x-app-layout>
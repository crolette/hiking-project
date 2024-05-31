<?php

use Illuminate\Support\Facades\Auth;

?>
<table>
    <tr>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">name</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">location</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">distance</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">duration</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">elevation gain</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">description</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">created at:</th>
        <th class="text-left px-5 py-2 bg-emerald-900 border-b border-4--emerald-900 border-gray-100 text-gray-300 capitalize">updated at:</th>
    </tr>
    <tr>
        <td class="text-left py-4 px-5 border-4">{{ $hike->name }}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->location }}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->distance}}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->duration }}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->elevation_gain }}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->description }}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->created_at }}</td>
        <td class="text-left py-4 px-5 border-4">{{ $hike->updated_at }}</td>
    </tr>
</table>

@foreach($tags as $tag)
<a href="{{ route('hike.tags', ['tag' => $tag->name]) }}">
    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-100">{{$tag->name}}</span>
</a>


@endforeach
<div class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center text-surface/75 dark:border-white/10 dark:text-neutral-300">
    <small>
        @if(isset($hike->updated_at))
        Last update : {{ $hike->updated_at}}
        @else
        Created at : {{ $hike->created_at}}
        @endif</small>
</div>
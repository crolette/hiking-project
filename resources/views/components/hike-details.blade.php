<?php

use Illuminate\Support\Facades\Auth;

?>
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

    @foreach($tags as $tag)
    <a href="{{ route('hike.tags', ['tag' => $tag->name]) }}">
        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-100">{{$tag->name}}</span>
    </a>
  
        
    @endforeach
    <div
      class="mt-auto border-t-2 border-neutral-100 px-6 py-3 text-center text-surface/75 dark:border-white/10 dark:text-neutral-300">
      <small>
        @if(isset($hike->updated_at))
            Last update : {{ $hike->updated_at}}
        @else 
            Created at : {{ $hike->created_at}}
        @endif</small>
    </div>
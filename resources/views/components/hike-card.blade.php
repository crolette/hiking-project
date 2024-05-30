<div class="mx-3 mt-6 flex flex-col rounded-lg bg-white  shadow-secondary-1 dark:bg-surface-dark dark:text-white sm:shrink-0 sm:grow sm:basis-0">
    <a href="{{ route('hike.details', ['id' => $hike->id]) }}">
      <img
        class="rounded-t-lg"
        src="https://tecdn.b-cdn.net/img/new/standard/city/044.webp"
        alt="Skyscrapers" />
    </a>
    <div class="p-6">
        <h2 class="mb-2 text-xl font-medium leading-tight text-emerald-800">
            <a href="{{ route('hike.details', ['id' => $hike->id]) }}">{{ $hike->name }}</a>
        </h2>
        <p class="mb-4 text-base text-emerald-600">
            {{ $hike->location}}
        </p>
        @if(isset($tags))
        @foreach($tags as $tag)
            @if($hike->id === $tag->hike_id)
                <a href="{{ route('hike.tags', ['tag' => $tag->name]) }}">
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-100">{{$tag->name}}</span>
                </a>
            @endif
        @endforeach
        @endif
    </div>
  </div>
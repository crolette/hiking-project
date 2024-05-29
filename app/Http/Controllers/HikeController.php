<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
use App\Models\Tags;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;

class HikeController extends BaseController
{

    public function hikeDetails(int $id): View
    {
        $hike = Hikes::getHikeById($id);
        $hikeTags = Tags::hikeTag($id);
        
        return view('hike.details', ['hike' => $hike, 'tags' => $hikeTags]);
    }

    public function showCreateForm(): View
    {
        return view('hike.create');
    }

    public function createHike(Request $request): RedirectResponse
    {
        $now = Carbon::now();

        $id = Hikes::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'elevation_gain' => $request->input('elevation_gain'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now
        ]);

        return redirect()->route('hike.details', ['id' => $id]);
    }

    public function index(): View
    {
        $hikes = Hikes::getAllHikes();
        $hikesTags = Tags::hikesTags();
        return view('hike.hikes', ['hikes' => $hikes, 'tags' => $hikesTags]);
    }

    public function hikesByTag(string $tag): View {
        
        $hikesByTag = Tags::hikesByTag($tag);
        $tags = Tags::hikesTags();
        // return view('hike.tags', ['hikes' => $hikes]);
        return view('hike.tags', ['hikes' => $hikesByTag, 'tag' => $tag, 'tags' => $tags]);
    }
}

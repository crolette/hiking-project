<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
use App\Models\Tag;
use App\Models\HikeTag;
use App\Models\Tags;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class HikeController extends BaseController
{

    public function hikeDetails(int $id): View
    {
        $hike = Hikes::getHikeById($id);
        $hikeTags = Tags::hikeTag($id);

        return view('hike.details', ['hike' => $hike, 'tags' => $hikeTags]);
    }

    public function showCreateForm(Request $request): View
    {
        $tags = Tag::getTags();
        return view('hike.create', ['tags' => $tags]);
    }

    public function createHike(Request $request): RedirectResponse
    {

        $validator = Validator::make($request->all(), [
            'tags' => [
                'required',
                'array',
                'min:1',
            ],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $now = Carbon::now();



        $objectInserted = Hikes::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'elevation_gain' => $request->input('elevation_gain'),
            'description' => $request->input('description'),
            'created_at' => $now,
            'updated_at' => $now,
            'created_by' => $request->user()->id
        ]);

        $tags = $request->input('tags');

        foreach ($tags as $tag) {
            $tagId = intval($tag);

            HikeTag::create([
                'hike_id' => $objectInserted->id,
                'tag_id' => $tagId
            ]);
        }

        return redirect()->route('hike.details', ['id' => $objectInserted->id]);
    }

    public function destroy(int $id): RedirectResponse
    {
        Hikes::find($id)->delete();

        return redirect()->back()->with('success', 'Update successful!');
    }



    public function edit(int $id): View
    {
        $hike = Hikes::getHikeById($id);

        return view('hike.edit', ['hike' => $hike, 'id' => $id]);
    }

    public function update(request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'distance' => 'required|numeric',
            'duration' => 'required|string',
            'elevation_gain' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $hike = Hikes::find($id);

        $hike->update([
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
            'distance' => $validatedData['distance'],
            'duration' => $validatedData['duration'],
            'elevation_gain' => $validatedData['elevation_gain'],
            'description' => $validatedData['description'] ?? $hike->description,
        ]);

        return redirect()->route('dashboard')->with('success', 'Hike updated successfully.');
    }



    public function index(): View
    {
        $hikes = Hikes::getAllHikes();
        $hikesTags = Tags::hikesTags();
        $tagsFilter = Tags::index();

        return view('hike.hikes', ['hikes' => $hikes, 'tags' => $hikesTags, 'filters' => $tagsFilter]);
    }

    public function hikesByTag(string $tag): View
    {

        $hikesByTag = Tags::hikesByTag($tag);
        $tags = Tags::hikesTags();
        return view('hike.tags', ['hikes' => $hikesByTag, 'tag' => $tag, 'tags' => $tags]);
    }
}

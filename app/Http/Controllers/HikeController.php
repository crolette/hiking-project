<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
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

    
    public function index(string $tag = null): View
    {
        if(isset($tag)) {
            $hikes = Hikes::hikesByTag($tag);
        } else {
            $hikes = Hikes::getAllHikes();
        }

        $hikesTags = Tags::hikesTags();
        $tagsFilter = Tags::index();

        return view('hike.hikes', ['hikes' => $hikes, 'tag' => $tag, 'tags' => $hikesTags, 'filters' => $tagsFilter]);
    }


    public function hikeDetails(int $id): View
    {
        $hike = Hikes::getHikeById($id);
        $hikeTags = Tags::hikeTag($id);   
        
        

        return view('hike.details', ['hike' => $hike, 'tags' => $hikeTags]);
    }

    public function create(Request $request): View
    {
        $tags = Tags::getTags();
        return view('hike.create', ['tags' => $tags]);
    }

    public function store(Request $request): RedirectResponse
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

        // dd($request->input('distance'));

        $objectInserted = Hikes::create([
            'name' => $request->input('name'),
            'location' => $request->input('location'),
            'distance' => $request->input('distance'),
            'duration' => $request->input('duration'),
            'elevation_gain' => $request->input('elevation_gain'),
            'description' => $request->input('description'),
            'round_trip' =>$request->input('round_trip'),
            'user_id' => $request->user()->id
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

    // public function hikesByTag(): View
    // {
        
    //     $tags = Tags::hikesTags();
    //     return view('hike.hikes', ['hikes' => $hikesByTag, 'tag' => $tag, 'tags' => $tags]);
    // }
}

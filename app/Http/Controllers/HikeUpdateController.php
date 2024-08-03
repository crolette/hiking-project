<?php

namespace App\Http\Controllers;

use App\Models\Hikes;
use App\Models\HikeTag;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HikeUpdateController extends Controller
{
    //
 public function create(int $id): View
    {
        $hike = Hikes::getHikeById($id);
        $hikeTags = Tags::hikeTag($id);
        $tags = Tags::getTags();

        // dd($hikeTags->id);
        foreach($hikeTags as $tag) {
            $results[] = $tag->id;
        }

        // dd($hike);

        return view('hike.edit', ['hike' => $hike, 'id' => $id, 'tags' => $tags, 'hikeTags' => $results]);
    }

    public function update(Request $request, int $id)
    {


        $validatedData = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            'distance' => 'required|numeric',
            'duration' => 'required|string',
            'elevation_gain' => 'required|numeric',
            'round_trip' => 'required|boolean',
            'description' => 'nullable|string',
            'tags' => [
                'required',
                'array',
                'min:1',
            ]
        ]);

        // TODO Find existing hikeTag record with the hike ID and delete the one that do not have the tag id anymore
        $existingHikeTagsRecords = HikeTag::where('hike_id', $id)->get();
        dd($existingHikeTagsRecords);


        $hike = Hikes::find($id);

        $hike->update([
            'name' => $validatedData['name'],
            'location' => $validatedData['location'],
            'distance' => $validatedData['distance'],
            'duration' => $validatedData['duration'],
            'elevation_gain' => $validatedData['elevation_gain'],
            'round_trip' => $validatedData['round_trip'],
            'description' => $validatedData['description'] ?? $hike->description,
        ]);

         $tags = $request->input('tags');

        HikeTag::whereIn('hike_id', [$id])->delete();


        foreach ($tags as $tag) {
            $tagId = intval($tag);

            // DB::table('hikes_tags')
            // ->updateOrInsert(
            //     ['hike_id' => $hike->id, 'tag_id' => $tagId],
            //     ['hike_id' => $hike->id, 'tag_id' => $tagId]
            // );
            // HikeTag::update([
            //     'hike_id' => $hike->id,
            //     'tag_id' => $tagId
            // ]);
            HikeTag::updateHikeTags(
                $hike->id,
                $tagId
            );
        }

        return redirect()->route('dashboard')->with('success', 'Hike updated successfully.');
    }
}

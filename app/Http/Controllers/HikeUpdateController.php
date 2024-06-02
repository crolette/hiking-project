<?php

namespace App\Http\Controllers;

use App\Models\Hikes;
use App\Models\Tags;
use Illuminate\Http\Request;
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

        // dd($results);

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
}

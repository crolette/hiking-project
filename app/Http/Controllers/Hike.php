<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class Hike extends BaseController
{
    public function hikeDetails(int $id): View
    {
        $hike = Hikes::getHikeById($id);
        return view('hike_details', ['hike' => $hike]);
    }

    public function createHike(Request $request): RedirectResponse
    {
        $id = Hikes::createHike(
            $request->input('name'),
            $request->input('location'),
            $request->input('distance'),
            $request->input('duration'),
            $request->input('elevation_gain'),
            $request->input('description')
        );

        return redirect()->route('hike_details', ['id' => $id]);
    }

    public function index(): View
    {
        $hikes = Hikes::getAllHikes();
        return view('index', ['hikes' => $hikes]);
    }
}

<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class Hike extends BaseController
{
    public function hikeDetails(int $id): View
    {
        $result = Hikes::getHikeById($id);
        return view('hike_details', ['result' => $result]);
    }

}

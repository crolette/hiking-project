<?php

namespace App\Http\Controllers;

use App\Models\Hikes;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): view
    {
        $userID = Auth::user()->id;
        $hikes = Hikes::getHikesByUserId($userID);

        return view('profile.dashboard', ['hikes' => $hikes, 'userId' => $userID]);
    }
}

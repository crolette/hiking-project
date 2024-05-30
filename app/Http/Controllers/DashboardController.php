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
        $hikes = Hikes::getAllHikes();
        $userID = Auth::user()->id;

        return view('profile.dashboard', ['hikes' => $hikes, 'userId' => $userID]);
    }
}

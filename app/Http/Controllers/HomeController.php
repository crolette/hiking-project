<?php

namespace App\Http\Controllers;

use App\Models\Hikes;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }
    
    /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        $recentHikes = Hikes::recentHikes(6);
        $randomHikes = Hikes::randomHikes(6);
        return view('index', ['recentHikes' => $recentHikes, 'randomHikes' => $randomHikes]);
    }
}


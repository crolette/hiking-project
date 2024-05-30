<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public static function index(): View {

        $tags = Tags::index();
        return view('tags.hikes', ['tags' => $tags]);
    }
}

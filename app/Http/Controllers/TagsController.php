<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TagsController extends Controller
{
    public static function index(): View {

        $tags = Tags::index();
        return view('tags.hikes', ['tags' => $tags]);
    }

    public static function store(Request $request): RedirectResponse {

        $validated = $request->validate([
            'name' => ['required', 'string', 'alpha:ascii', 'max:30', 'unique:'.Tags::class],
        ]);

        Tags::create([
            'name' => $request->input("name"),
        ]);

        return redirect()->route('admin.edit-tags');

    }

    

}

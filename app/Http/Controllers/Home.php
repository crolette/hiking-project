<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\Hikes;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class Home extends BaseController
{
    public function home(): View
    {
        // User::create([
        //     'username' => "Ginjontonix",
        //     'email' => "ginjontonix@hotmail.com",
        //     'password' => Hash::make('test')
        // ]);

        return view('home');
    }

}

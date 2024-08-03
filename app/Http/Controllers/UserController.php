<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = User::getUserDetailsByUsername(session('username'));
        return view('dashboard.user', ['user' => $user[0]]);
    }


    public function editProfile() {
        $user = User::getUserDetailsByUsername(session('username'));
        return view('dashboard.edit-profile', ['user' => $user[0]]);
    }

    public function changePassword() {
        return view('dashboard.change-password');
    }

    public function adminDashboard() {
        return view('dashboard.admin');
    }
}

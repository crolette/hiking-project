<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hikes;
use App\Models\User;
use Illuminate\Contracts\View\View as View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index():View {
        return view('admin.dashboard');
    }

    public function addTag():View {
        return view('admin.add-tag');
    }

    public function searchUsers():View {
        return view('admin.search-users');
    }

    public function displayUsers(Request $request):View {
        
        var_dump($request->input('user'));

        $users = User::searchByUsername($request->input('user'));

        return view('admin.search-users', ['users' => $users]);
    }



    public function editUser(Request $request, int $id): View {

        if($request->isMethod('get')) {
            $user = User::searchById($id);
            $parameters=$request->query();
            
            return view('admin.display-user', ['user' => $user[0], 'parameters' => $parameters]);
        }

        if($request->isMethod('post')) {
            $parameters=$request->query();
            if(isset($parameters['delete'])) {
                if($id !== Auth::id()) {
                    User::destroy($id);
                } 
            }
            if(isset($parameters['make-admin'])) {
                    User::makeAdmin($id);               
                }
        }
        

        return view('admin.dashboard');

    }


    public function searchHikes():View {
        return view('admin.search-hikes');
    }

    public function displayHikes(Request $request):View {
        

        $hikes = Hikes::getHikesByName($request->input('hike'));

        return view('admin.search-hikes', ['hikes' => $hikes]);
    }

        public function editHike(Request $request, int $id): View {

        if($request->isMethod('get')) {
            $hike = Hikes::getHikeById($id);
            $parameters=$request->query();
            
            return view('admin.display-hike', ['hike' => $hike, 'parameters' => $parameters]);
        }

        if($request->isMethod('post')) {
            $parameters=$request->query();
            if(isset($parameters['delete'])) {
                    Hikes::destroy($id);
            }
            if(isset($parameters['edit'])) {
                    User::makeAdmin($id);               
                }
        }
        

        return view('admin.dashboard');

    }
}
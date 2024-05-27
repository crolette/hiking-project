<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class Authentication extends BaseController {

    public function show(): View {
        return view('login');
    }
    
    public function authenticate(Request $request) {
        
        $credentials = $request->validate([
            'username' => ['required','alpha_dash:ascii'],
            'pass' => ['required'],
        ]);
        
        $user = User::getUserByUsername($credentials['username']);
        

        if(Hash::check($credentials['pass'], $user[0]['password'])) {
            session([
                'user_id' => $user[0]['id'],
                'username' => $credentials['username'],
                'admin' => $user[0]['admin']
            ]);

            return redirect('/');
        } else {
            return redirect('/login');
        }
            
        


    }


    public function logout(): RedirectResponse {
        session([
                'user_id' => null,
                'username' => null
            ]);
        return redirect('/');
    }
    

}
    ?>
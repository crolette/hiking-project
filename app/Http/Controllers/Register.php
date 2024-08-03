<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Register extends BaseController
{    
    /**
     * register
     *
     * @return View
     */
    public function register(): View
    {
        return view('register');
    }
     
     /**
      * addUser
      *
      * @param  mixed $request
      * @return View
      */
     public function addUser(Request $request)
    {

        // $user = $_POST;
        // $user = $request->all();
        

        // VALIDATION
        // todo use of Requests/createUser for validation
       
        $validated = $request->validate([
            'email' => 'required',
            'username' => ['required', 'alpha_dash:ascii'],
            'firstname' => ['nullable', 'alpha_dash:ascii'],
            'lastname' => ['nullable', 'alpha_dash:ascii'],
            'pass' => ['required', 'min:4'],
            'repeat-pass' => ['required', 'min:4']
        ]);

        if($validated['pass'] === $validated['repeat-pass']) {
            $password = Hash::make($validated['pass']);

        } else {
            return redirect('/register');
        }

        $id = User::createUser($validated, $password);
        if($id) {
            session([
                'user_id' =>$id,
                'username' => $validated['username'],
                'admin' => false
            ]);
            return redirect('/');
        }
        
        return redirect('/register');
    }



}

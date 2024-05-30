<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function searchByUsername(string $username) {

        // SELECT * FROM users WHERE username LIKE CONCAT('%','test','%')
        try {
            $result = DB::table('users')->select('id', 'username', 'firstname', 'lastname', 'email', 'admin')->where('username', 'LIKE', '%'. $username. '%')->get();

            return json_decode($result);

        } catch(QueryException $e) {
            dd($e->getMessage());
        }

    }

    
    public static function searchById(int $id) {

        // SELECT * FROM users WHERE username LIKE CONCAT('%','test','%')
        try {
            $result = DB::table('users')->select('id', 'username', 'firstname', 'lastname', 'email', 'admin')->where('id',$id)->get();

            return json_decode($result);

        } catch(QueryException $e) {
            dd($e->getMessage());
        }
    }

    public static function makeAdmin(int $id) {
        try {
            DB::table('users')
                ->where('id', $id)
                ->update(['admin' => '1']);

        } catch(QueryException $e) {
            dd($e->getMessage());
        }
    }

    // public static function createUser(array $validated, string $password) {
    //     echo 'ADD USER';
    //     echo '<br>';
    //     var_dump($validated);
    //     echo '<br>';
    //     var_dump($password);

    //     try {
    //         return $id = DB::table('users')->insertGetId(
    //             [
    //                 'email' => $validated['email'],
    //                 'firstname' => $validated['firstname'],
    //                 'lastname' => $validated['lastname'],
    //                 'username' => $validated['username'],
    //                 'password' => $password
    //             ]
    //             );
    //     } catch(QueryException $e) {
    //         dd($e->getMessage());
    //     }

    // }

    // public static function getUserByUsername(string $username) {

    //     try {
    //         $result = DB::table('users')->where('username', $username)->get();
    //         return json_decode($result, true);

    //     } catch(QueryException $e) {
    //         dd($e->getMessage());
    //     }
    // }

    //    public static function getUserDetailsByUsername(string $username) {

    //     try {
    //         $result = DB::table('users')->select('username', 'firstname', 'lastname', 'email', 'admin')->where('username', $username)->get();
    //         return json_decode($result, true);

    //     } catch(QueryException $e) {
    //         dd($e->getMessage());
    //     }
    // }
}

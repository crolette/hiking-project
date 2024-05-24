<?php 
declare(strict_types=1);
namespace App\Models;

use \Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Hikes extends Model
{

       public static function getAllHikes() {
            $results = DB::table('hikes')->get();
            return $results;
       }

       public static function getHikeById(int $id) {
             $result = DB::table('hikes')->where('id', $id)->get();
            return $result;
       }



}

?>
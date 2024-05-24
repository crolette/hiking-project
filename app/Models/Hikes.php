<?php 
declare(strict_types=1);
use \Exception;
use Illuminate\Support\Facades\DB;

ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Hikes extends Database
{
       public function getAllHikes() {
            $results = DB::select('select * from users where id = ?', [1]);
        
       }



}

?>
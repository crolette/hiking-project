<?php

declare(strict_types=1);

namespace App\Models;

use \Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

ini_set('display_errors', 1);
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Hikes extends Model
{
     /*
     protected $table = 'hikes';
     protected $fillable = ['name', 'location', 'distance', 'duration', 'elevation_gain', 'description'];

     For Eloquent models (laravel)
     */

     public static function getAllHikes(): Collection
     {
          return self::all();
     }

     public static function getHikeById(int $id): ?object
     {
          $result = DB::table('hikes')->where('id', $id)->first();
          return $result;
     }

     public static function createHike(string $name, string $location, int $distance, string $duration, int $elevation_gain, string $description): int
     {
          $id = DB::table('hikes')->insertGetId([
               'name' => $name,
               'location' => $location,
               'distance' => $distance,
               'duration' => $duration,
               'elevation_gain' => $elevation_gain,
               'description' => $description,
          ]);

          return $id;
     }
}

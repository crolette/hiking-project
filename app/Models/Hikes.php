<?php

declare(strict_types=1);

namespace App\Models;

use \Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class Hikes extends Model
{

     protected $table = 'hikes';
     protected $fillable = [
          'name',
          'location',
          'distance',
          'duration',
          'elevation_gain',
          'description',
          'created_at',
          'updated_at',
          'created_by'
     ];



     public static function getAllHikes(): Collection
     {
          return self::all();
     }

     public static function getHikeById(int $id): ?object
     {
          $result = DB::table('hikes')->where('id', $id)->first();
          return $result;
     }
}

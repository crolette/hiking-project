<?php

declare(strict_types=1);

namespace App\Models;

use \Exception;
use Illuminate\Contracts\Database\Query\Builder;
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
          'round_trip',
          'description',
          'created_at',
          'updated_at',
          'user_id'
     ];



     public static function getAllHikes(): Collection
     {
          return self::all();
     }

     public static function getHikeById(int $id): ?object
     {
          $result = DB::table('hikes')
                         ->where('id', $id)
                         ->get()
                         ->first();
                         
          return $result;
     }

     public static function getHikesByUserId(int $userId): Collection
     {
          $specificRows = DB::table('hikes')
                              ->where('user_id', '=', $userId)
                              ->get();

          return $specificRows;
     }



     public static function getHikesByName(string $name): ?object
     {
          $results = DB::table('hikes')
                         ->select('id', 'name', 'location', 'distance', 'duration', 'elevation_gain')
                         ->where('name', 'LIKE', '%' . $name . '%')
                         ->get();
          return $results;
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

     public static function recentHikes(int $limit)
     {
          return $recentHikes = DB::table('hikes')
               ->select('*')
               ->orderByDesc('created_at')
               ->limit($limit)
               ->get();

           // return $recentHikes = DB::table('hikes as h')
          //                     ->leftJoin('hikes as r', 'h.id', '=', 'r.id')
          //                     ->join('hikes_tags as ht', 'h.id', '=', 'ht.hike_id')
          //                     ->join('tags as t', 'ht.tag_id', '=', 't.id')
          //                     ->whereRaw('(r.id IS NULL OR r.id = h.id)')
          //                     ->select('h.*', 't.name as tag_name')
          //                     ->orderBy('h.created_at', 'desc')
          //                     ->take($limit)
          //                     ->get();

     }

     public static function randomHikes(int $limit)
     {
          return $randomHikes = DB::table('hikes')
               ->select('*')
               ->inRandomOrder()
               ->limit($limit)
               ->get();
     }


     public static function hikesByTag(string $tag) {
        $hikesByTag = DB::table('hikes')
                        ->join('hikes_tags', 'hikes_tags.hike_id', '=', 'hikes.id')
                        ->join('tags', 'tags.id', '=', 'hikes_tags.tag_id')
                        ->select('hikes.*')
                        ->where('tags.name', '=', $tag)
                        ->get();

            // SELECT `hikes`.*, `tags`.*
            // FROM `hikes` 
            // LEFT JOIN `hikes_tags` ON `hikes_tags`.`hike_id` = `hikes`.`id`
            // LEFT JOIN `tags` ON `tags`.`id` = `hikes_tags`.`tag_id`
            // WHERE `tags`.`name` = "mountains"

        return $hikesByTag;
    }

}

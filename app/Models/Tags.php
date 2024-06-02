<?php

namespace App\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Tags extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
          'created_at',
          'updated_at',
          'user_id'
    ];

     public static function getTags(): collection
    {
        return self::all();
    }

    public static function index():Collection {

        $tags = DB::table('tags')
                    ->select('*')
                    ->distinct()
                    ->get();
        
        return $tags;
    }

    public static function getTagsByName(string $name): ?object
     {
          $results = DB::table('tags')->select('id', 'name')->where('name', 'LIKE', '%'. $name. '%')->get();
          return $results;
     }

     public static function getTagById(int $id): ?object
     {
          $results = DB::table('tags')->select('id', 'name')->where('id', $id)->get();
          return $results;
     }

    public static function hikesTags() {
        $hikesTags = DB::table('hikes_tags')
                        ->join('tags', 'hikes_tags.tag_id', '=', 'tags.id')
                        ->select('hikes_tags.hike_id', 'tags.name')
                        ->get();

        return json_decode($hikesTags);

        // SELECT `hikes_tags`.`hike_id`, `tags`.`name`
        // FROM `hikes_tags` 
        // LEFT JOIN `tags` ON `hikes_tags`.`tag_id` = `tags`.`id`
    }

    public static function hikeTag(int $id) {
        $hikeTag = DB::table('hikes_tags')
                        ->join('tags', 'hikes_tags.tag_id', '=', 'tags.id')
                        ->select('tags.name', 'tags.id')
                        ->where('hikes_tags.hike_id', '=', $id)
                        ->get();

        return json_decode($hikeTag);
    }

        


}

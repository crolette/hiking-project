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
    protected $table = 'tags';
     protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    public static function index():Collection {

        $tags = DB::table('tags')
                    ->select('*')
                    ->distinct()
                    ->get();
        
        return $tags;
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
                        ->select('tags.name')
                        ->where('hikes_tags.hike_id', '=', $id)
                        ->get();

        return json_decode($hikeTag);
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

        return json_decode($hikesByTag);
    }
}

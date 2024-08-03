<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HikeTag extends Model
{

    protected $table = 'hikes_tags';
    protected $fillable = ['hike_id', 'tag_id'];
    public $timestamps = false;


    public static function updateHikeTags(int $hike_id, int $tag_id) {

        DB::table('hikes_tags')
            ->updateOrInsert(
                ['hike_id' => $hike_id, 'tag_id' => $tag_id],
                ['hike_id' => $hike_id, 'tag_id' => $tag_id]
            );

    }

    
}

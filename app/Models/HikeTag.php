<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HikeTag extends Model
{

    protected $table = 'hikes_tags';
    protected $fillable = ['hike_id', 'tag_id'];
    public $timestamps = false;
}

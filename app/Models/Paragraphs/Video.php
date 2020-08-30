<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'paragraph_video';

    protected $fillable = [
        'paragraph_id', 'banner', 'videoUrl', 'dimension', 'notices'
    ];
}

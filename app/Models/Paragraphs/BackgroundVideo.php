<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class BackgroundVideo extends Model
{
    protected $table = 'paragraph_video_with_background';

    protected $fillable = [
        'paragraph_id', 'banner', 'videoUrl', 'dimension', 'notices', 'header', 'background'
    ];
}

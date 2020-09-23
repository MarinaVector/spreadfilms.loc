<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class VideoWithText extends Model
{
    protected $table = 'paragraph_video_with_text';

    protected $fillable = [
        'paragraph_id', 'banner', 'videoUrl', 'dimension', 'notices', 'header', 'text'
    ];
}

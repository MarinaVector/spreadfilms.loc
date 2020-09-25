<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class VideoSlider extends Model
{
    protected $table = 'paragraph_video_slider';

    protected $fillable = [
        'paragraph_id', 'slidervideos'
    ];
}

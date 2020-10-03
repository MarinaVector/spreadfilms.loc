<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    protected $table = 'paragraph_image_slider';

    protected $fillable = [
        'paragraph_id', 'sliderimages'
    ];
}

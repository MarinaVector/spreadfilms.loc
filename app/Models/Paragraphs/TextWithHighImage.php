<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class TextWithHighImage extends Model
{
    protected $table = 'paragraph_text_with_high_image';

    protected $fillable = [
        'paragraph_id', 'header', 'text', 'image'
    ];
}

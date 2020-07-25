<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class TextImage extends Model
{
    protected $table = 'paragraph_text_image';

    protected $fillable = [
        'paragraph_id', 'header', 'text', 'src'
    ];
}

<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class SimpleImage extends Model
{
    protected $table = 'paragraph_simple_image';

    protected $fillable = [
        'paragraph_id', 'image', 'position'
    ];
}

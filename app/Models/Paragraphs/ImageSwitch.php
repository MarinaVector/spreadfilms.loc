<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class ImageSwitch extends Model
{
    protected $table = 'paragraph_image_switch';

    protected $fillable = [
        'paragraph_id', 'header', 'text', 'textbefore', 'textafter', 'imagebefore', 'imageafter'
    ];
}

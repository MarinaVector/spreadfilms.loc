<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class TxtSpecialImg extends Model
{
    protected $table = 'paragraph_text_special_image';

    protected $fillable = [
        'paragraph_id', 'header', 'text', 'specialtext', 'firstimage', 'secondimage'
    ];
}

<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class TextWithBigFont extends Model
{
    protected $table = 'paragraph_text_with_big_font';

    protected $fillable = [
        'paragraph_id', 'header', 'text', 'buttons'
    ];
}

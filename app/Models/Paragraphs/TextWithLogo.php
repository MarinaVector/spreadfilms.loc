<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class TextWithLogo extends Model
{
    protected $table = 'paragraph_text_with_logo';

    protected $fillable = [
        'paragraph_id', 'header', 'text', 'singletext', 'logo'
    ];
}

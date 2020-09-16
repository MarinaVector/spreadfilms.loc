<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class CenterText extends Model
{
    protected $table = 'paragraph_center_text';

    protected $fillable = [
        'paragraph_id', 'header', 'text'
    ];
}

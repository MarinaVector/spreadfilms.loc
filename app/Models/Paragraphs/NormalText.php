<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class NormalText extends Model
{
    protected $table = 'paragraph_normal_text';

    protected $fillable = [
        'paragraph_id', 'header', 'text'
    ];
}

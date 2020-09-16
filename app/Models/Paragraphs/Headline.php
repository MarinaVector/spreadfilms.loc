<?php

namespace App\Models\Paragraphs;

use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    protected $table = 'paragraph_headline';

    protected $fillable = [
        'paragraph_id', 'header',
    ];
}

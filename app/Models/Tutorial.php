<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $fillable = [
        'name', 'tutorial_background', 'parent_tutorial_id', 'category_id', 'company_id'
    ];
}

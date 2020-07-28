<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TutorialCompanycategory extends Pivot
{
    protected $fillable = [
        'tutorial_id', 'category_id'
    ];
}

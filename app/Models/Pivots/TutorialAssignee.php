<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TutorialAssignee extends Pivot
{
    protected $fillable = [
        'tutorial_id', 'assignee_id'
    ];
}

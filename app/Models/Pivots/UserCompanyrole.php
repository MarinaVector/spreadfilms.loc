<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCompanyrole extends Pivot
{
    protected $fillable = [
        'user_id', 'role_id'
    ];
}

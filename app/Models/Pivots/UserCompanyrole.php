<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCompanyrole extends Pivot
{
    protected $table = 'user_companyrole';

    protected $fillable = [
        'user_id', 'role_id'
    ];
}

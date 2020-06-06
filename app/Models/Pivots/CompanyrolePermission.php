<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyrolePermission extends Pivot
{
    protected $fillable = [
        'role_id', 'permission_id'
    ];
}

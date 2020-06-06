<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SiterolePermission extends Pivot
{
    protected $fillable = [
        'role_id', 'permission_id'
    ];
}

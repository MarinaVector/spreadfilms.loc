<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyCompanyrole extends Pivot
{
    protected $fillable = [
        'company_id', 'role_id'
    ];
}

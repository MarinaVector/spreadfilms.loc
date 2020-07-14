<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CompanyCompanycategory extends Pivot
{
    protected $fillable = [
        'company_id', 'category_id'
    ];
}

<?php

namespace App\Models;

use App\Models\Pivots\CompanyCompanyrole as CompanyCompanyrolePivot;
use Illuminate\Database\Eloquent\Model;

class CompanyTutorialsSettings extends Model
{
    protected $table = 'company_tutorials_settings';

    public $incrementing = true;

    protected $fillable = [
        'theme', 'logo', 'main_page_title', 'main_page_background', 'chapter_complete', 'email_notifications_to', 'company_id'
    ];
}

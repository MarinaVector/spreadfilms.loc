<?php

namespace App\Models;

use App\Models\Pivots\CompanyCompanyrole as CompanyCompanyrolePivot;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    public $incrementing = true;

    protected $fillable = [
        'name', 'description', 'logo', 'adress', 'website'
    ];

    /**
     * Get the users of this company
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function companyroles() {
        return $this->belongsToMany('App\Models\Companyrole', 'company_companyrole', 'company_id', 'role_id');
    }

    public function companycategories() {
        return $this->belongsToMany('App\Models\Companycategory', 'company_companycategory', 'company_id', 'category_id');
    }

    public function addRoleByName($roleName) {
        //create a role
        $companyRole = Companyrole::create(['name' => $roleName]);

        //assign this role to a company
        CompanyCompanyrolePivot::create(['company_id' => $this->id, 'role_id' => $companyRole->id]);
    }
}

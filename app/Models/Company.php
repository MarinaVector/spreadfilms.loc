<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Company extends Pivot
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

    /**
     * Get the roles of this company
     */
    public function roles() {
        return $this->hasManyThrough('App\Models\Siterole', 'App\Models\Pivots\CompanyCompanyrole'

        );
        //return $this->hasManyThrough('App\Post', 'App\User');
    }
}

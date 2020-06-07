<?php

namespace App\Models;

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
}

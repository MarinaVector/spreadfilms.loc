<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companyrole extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function permissions() {
        return $this->belongsToMany('App\Models\CompanyrolePermission', 'companyrole_permission', 'role_id', 'permission_id');
    }
}

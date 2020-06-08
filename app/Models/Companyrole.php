<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pivots\CompanyrolePermission as CompanyrolePermissionPivot;

class Companyrole extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function permissions() {
        return $this->belongsToMany('App\Models\CompanyrolePermission', 'companyrole_permission', 'role_id', 'permission_id');
    }

    public function setOnlyThesePermissionsByPermissionId(int $role_id, array $permissions) {
        //deleting all previous permissions
        CompanyrolePermissionPivot::where('role_id', $this->id)->delete();

        foreach ($permissions as $permissionId => $value) {
            CompanyrolePermissionPivot::create(['role_id' => $this->id, 'permission_id' => $permissionId]);
        }

        return;
    }
}

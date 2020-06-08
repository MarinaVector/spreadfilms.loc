<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiterolePermission extends Model
{
    protected $fillable = [
        'name', 'name_en', 'name_de'
    ];
}

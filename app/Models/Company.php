<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
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
}

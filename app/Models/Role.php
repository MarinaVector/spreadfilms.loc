<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the user of the role.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

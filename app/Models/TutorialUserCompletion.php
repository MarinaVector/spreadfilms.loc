<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TutorialUserCompletion extends Model
{
    protected $table = 'tutorials_users_completion';

    protected $fillable = [
        'user_id', 'tutorial_id', 'completion'
    ];
}

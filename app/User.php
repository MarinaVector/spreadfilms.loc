<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'surname', 'email', 'password', 'gender', 'native_language', 'country', 'postcode', 'location',
        'street', 'homepage', 'phone', 'birth_year', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the company of this user
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id')->first();
    }

    public function inCompany(){
        return $this->company_id ? true : false;
    }

    public function showGender() {
        if ($this->gender === null || $this->gender == "0") {
            return '';
        }

        return $this->gender;
    }

    public function roles() {
        return $this->hasMany('App\Models\Role', '');
    }


}

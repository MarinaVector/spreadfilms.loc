<?php

namespace App;

use App\Models\Pivots\UserCompanyrole as UserCompanyrolePivot;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Siterole;

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

    public function companyroles() {
        return $this->belongsToMany('App\Models\Companyrole', 'user_companyrole', 'user_id', 'role_id');
    }

    /**
     * Get the user's companyroles list.
     *
     * @return string
     */
    public function companyrolesList() {
        $roles = $this->companyroles;
        foreach($roles as $role) {
            $rolesList[] = $role->name;
        }

        return implode(", ", $rolesList);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->surname}";
    }

    /**
     * Remove the user's companyrole.
     *
     * @return void
     */
    public function removeCompanyRoleByName($rolename) {
        $roles = $this->companyroles;

        foreach($roles as $role) {
            if ($role->name == $rolename) {
                UserCompanyrolePivot::where(['user_id' => $this->id, 'role_id' => $role->id])->delete();
                return;
            }
        }

        return;
    }
}

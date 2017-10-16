<?php

namespace App\Core\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roleId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'clientId');
    }

    public function scopeWithProfile($query)
    {
        return $query->with('profile');
    }

    public function isAccessToAdminPanel()
    {
        return $this->roleId <= 2;
    }

    public function changePassword($password)
    {
        $this->password = bcrypt($password);
    }
}

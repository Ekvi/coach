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

    public static function createClient($deviceId, $email): self
    {
        $client = new self();

        $client->roleId = 3;
        $client->deviceId = $deviceId;
        $client->email = $email;
        $client->name = '';
        $client->password = bcrypt('111111');
        $client->remember_token = str_random(30);
        $client->accessToken = str_random(60);

        return $client;
    }
}

<?php

namespace App\Models\Traccar;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends GenericUser implements AuthenticatableContract
{
    use Notifiable;

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'piston';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /* 'name', 'email', 'password', */
        'name', 'email', 'hashedpassword', 'salt',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        /* 'password', 'remember_token', */
        'hashedpassword', 'token',
    ];

    /**
     * Get the devices that belong to this user
     *
     * @return array of App\Traccar\Device
     */
    /* public function devices() */
    /* { */
    /*     return $this->hasMany('App\Traccar\Device'); */
    /* } */

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->attributes['hashedpassword'];
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'token';
    }

    /*
     * TRACCAR RELATED FUNCTIONS
     */

    /*
     * Get the salt for the user.
     *
     * @return string
     */
    public function getAuthSalt()
    {
        return $this->attributes['salt'];
    }

    /*
     * Is the user an administrator?
     *
     * @return boolean
     */
    public function isAdmin()
    {
        /* Casting 0 or 1 to FALSE or TRUE, respectively. */
        return ((bool) $this->attributes['administrator']);
    }
}

?>

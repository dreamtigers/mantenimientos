<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class TraccarUser extends GenericUser implements AuthenticatableContract
{
    use Notifiable;

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
}

?>

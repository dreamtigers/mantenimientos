<?php

namespace App\Models\Traccar;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Record;

class User extends Authenticatable
{
    use Notifiable;

    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'tc_users';
    // Indicates if the model should be timestamped.
    public $timestamps = false;
    // The attributes that are mass assignable.

    protected $fillable = [
        /* 'name', 'email', 'password', */
        'name', 'email', 'hashedpassword', 'salt',
    ];
    // The attributes that should be hidden for arrays.
    protected $hidden = [
        /* 'password', 'remember_token', */
        'hashedpassword', 'token',
    ];

    /**
     * Get the devices that belong to this user
     * @return array of App\Traccar\Device
     */
    public function devices()
    {
        return $this->belongsToMany('App\Models\Traccar\Device', 'tc_user_device', 'userid', 'deviceid');
    }

    public function records()
    {
        return Record::whereHas('device.users', function($query) {
            return $query->where('id', $this->id);
        })->get();
    }

    /*
     * Necessary for CustomEloquentUserProvider to work as intended:
     */

    /* Get the password for the user.
     * @return string */
    public function getAuthPassword()
    {
        return $this->attributes['hashedpassword'];
    }
    /* Get the column name for the "remember me" token.
     * @return string */
    public function getRememberTokenName()
    {
        return 'token';
    }
    /* Get the salt for the user.
     * @return string */
    public function getAuthSalt()
    {
        return $this->attributes['salt'];
    }
    /* Is the user an administrator?
     * @return boolean */
    public function isAdmin()
    {
        /* Casts 0 or 1 to FALSE or TRUE, respectively. */
        return ((bool) $this->attributes['administrator']);
    }
}

?>

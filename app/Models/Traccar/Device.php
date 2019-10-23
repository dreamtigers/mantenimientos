<?php

namespace App\Models\Traccar;

use App\Models\Traccar\Position;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'tc_devices';

    protected $fillable = [
        'name', 'lastupdate', 'positionid', 'groupid',
        'attributes', 'phone', 'model', 'contact', 'category',
    ];

    // Indicates if the model should be timestamped.
    public $timestamps = false;

    const UPDATED_AT = 'lastupdate';

    public function detail()
    {
        return $this->hasOne('App\Models\Detail')->withDefault();
    }

    public function positions()
    {
        return $this->hasMany('App\Models\Traccar\Position', 'deviceid');
    }

    // Each device has lots of records, but a record can only belong to one
    // device.
    public function records()
    {
        return $this->hasMany('App\Models\Record');
    }

    /* Get the users that own this device
     * @return array of App\Models\Traccar\User */
    public function users()
    {
        return $this->belongsToMany('App\Models\Traccar\User', 'tc_user_device', 'deviceid', 'userid');
    }

    public function lastPosition()
    {
        if ($this->positions->last()) {
            return $this->positions->last();
        }

        $position = new Position();
        $this->positions()->save($position);

        return $position;
    }
}

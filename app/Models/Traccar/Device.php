<?php

namespace App\Models\Traccar;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'traccar';
    /*
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tc_devices';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const UPDATED_AT = 'lastupdate';

    public function detail()
    {
        return $this->hasOne('App\Models\Detail'); // fk: device_id
    }
}

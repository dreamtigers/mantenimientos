<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'mt_records';

    protected $fillable = [
        'device_id', 'performed_at', 'maintenance_id',
    ];

    // A record has lots of activities and activities have lots of records,
    // through the intermediate table 'activity_record'. Laravel infers their
    // relation thanks to the name of the table. See Eloquent Documentation.
    // We will make use of that pivot table.
    public function activities()
    {
        return $this->belongsToMany('App\Models\Activity', 'mt_activity_record')->withPivot('observation');
    }

    // Each record belongs only to one device.
    public function device()
    {
        return $this->belongsTo('App\Models\Traccar\Device');
    }

    // Each record belongs only to one maintenance.
    public function maintenance()
    {
        return $this->belongsTo('App\Models\Traccar\Maintenance');
    }

    // I'm not sure if we should link to the positions or not Traccar. For
    // example, does not link through a fk the device to the position, even tho
    // it's capable of.
    /* // Each record belongs only to one position. */
    /* public function position() */
    /* { */
    /*     return $this->belongsTo('App\Models\Traccar\Position'); */
    /* } */
}

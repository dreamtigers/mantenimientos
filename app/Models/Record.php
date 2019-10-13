<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';

    // A record has lots of activities and activities have lots of records,
    // through the intermediate table 'activity_record'. Laravel infers their
    // relation thanks to the name of the table. See Eloquent Documentation.
    // We will make use of that pivot table.
    public function activities()
    {
        return $this->belongsToMany('App\Models\Activity');
    }

    // Each record belongs only to one device.
    public function device()
    {
        return $this->belongsTo('App\Models\Traccar\Device');
    }

    // Each record belongs only to one maintenance.
    public function maintenance()
    {
        return $this->belongsTo('App\Models\Maintenance');
    }
}

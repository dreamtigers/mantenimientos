<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'mt_activities';

    public function maintenances()
    {
        return $this->belongsToMany('App\Models\Traccar\Maintenance', 'mt_activity_maintenance');
    }

    // An activity belongs in a lot of records and each record has lots of
    // activities, through the intermediate table 'activity_record'. Laravel
    // infers their relation thanks to the name of the table. See Eloquent
    // Documentation. We will make use of that pivot table.
    public function records()
    {
        return $this->belongsToMany('App\Models\Record', 'mt_activity_record')->withPivot('observation');
    }
}

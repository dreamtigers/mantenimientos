<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'mt_details';

    public function device()
    {
        return $this->belongsTo('App\Models\Traccar\Device'); // fk: device_id
    }
}

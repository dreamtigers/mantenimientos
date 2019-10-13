<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';

    public function maintenance()
    {
        return $this->belongsTo('App\Models\Traccar\Maintenance');
    }
}

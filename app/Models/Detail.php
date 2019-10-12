<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    public function device()
    {
        return $this->belongsTo('App\Models\Traccar\Device'); // fk: device_id
    }
}

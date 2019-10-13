<?php

namespace App\Models\Traccar;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    // The connection name for the model.
    protected $connection = 'traccar';
    // The table associated with the model.
    protected $table = 'tc_maintenances';
    // Indicates if the model should be timestamped.
    public $timestamps = false;

    /* One maintenance (say, Rutina 1), can have many activities, like
     * Lubricar el cardan
     * Balancear los cauchos
     */
    public function activities() {
        return $this->hasMany('App\Model\Activity');
    }
}

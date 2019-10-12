<?php

namespace App\Models\Traccar;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
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
    protected $table = 'tc_maintenances';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

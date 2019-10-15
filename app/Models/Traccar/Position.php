<?php

namespace App\Models\Traccar;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    // The connection name for the model.
    protected $connection = 'mysql';
    // The table associated with the model.
    protected $table = 'tc_positions';
    // Indicates if the model should be timestamped.
    public $timestamps = false;
    // The attributes that are mass assignable.
}

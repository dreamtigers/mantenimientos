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

    // Default attributes in case we're missing something.
    protected $attributes = [
        'attributes' => '{"totalDistance":0,"hours":0}',
        'valid' => 1,
        'latitude' => 0.0,
        'longitude' => 0.0,
        'altitude' => 0,
        'speed' => 0,
        'course' => 0,
    ];

    public function getHoursAttribute()
    {
        $attributes = json_decode($this->attributes['attributes']);
        $total_hours = $attributes->hours;

        return $total_hours;
    }

    public function getTotalDistanceAttribute()
    {
        $attributes = json_decode($this->attributes['attributes']);
        $total_distance = $attributes->totalDistance;

        return $total_distance;
    }
}

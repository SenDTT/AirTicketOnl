<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flights';

    protected $fillable = [
        'name',
        'route_id',
        'airline_id',
        'airplane_id',
        'depart_date',
        'arrive_date',
        'flight_time',
    ];

    static public $rules = [
        'name' => 'required|min:1:max:255',
        'route_id' => 'required|min:1:max:255',
        'airline_id' => 'required|min:1:max:255',
        'airplane_id' => 'required',
        'arrive_date' => 'required',
        'depart_date' => 'required',
        'flight_time' => 'required',
    ];

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'id');
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id', 'id');
    }

    public function airplane()
    {
        return $this->belongsTo(Airplanes::class, 'airplane_id', 'id');
    }
}

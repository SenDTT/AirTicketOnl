<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'reservation_id',
        'flight_id',
        'status',
    ];

    static public $rules = [
        'reservation_id' => 'required|min:1:max:255',
        'flight_id' => 'required|min:1:max:255',
        'status' => 'required',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class, 'reservation_id', 'id');
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationDetails extends Model
{
    protected $table = 'reservation_details';

    protected $fillable = [
        'reservation_id',
        'gender',
        'first_name',
        'last_name',
        'check_in_baggage'
    ];

    static public $rules = [
        'reservation_id' => 'required|min:1:max:255',
        'gender' => 'required|min:1:max:255',
        'first_name' => 'required|min:1:max:255',
        'last_name' => 'required',
        'check_in_baggage' => 'required'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class, 'reservation_id', 'id');
    }
}

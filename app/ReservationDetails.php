<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationDetails extends Model
{
    protected $table = 'reservation_details';

    protected $fillable = [
        'reservation_id',
        'ticket_type_price_id',
        'quantity',
        'total',
        'check_in_baggage'
    ];

    static public $rules = [
        'reservation_id' => 'required|min:1:max:255',
        'ticket_type_price_id' => 'required',
        'quantity' => 'required',
        'total' => 'required',
        'check_in_baggage' => 'required'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class, 'reservation_id', 'id');
    }
}

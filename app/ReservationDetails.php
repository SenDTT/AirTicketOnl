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
    ];

    static public $rules = [
        'reservation_id' => 'required|min:1:max:255',
        'ticket_type_price_id' => 'required',
        'quantity' => 'required',
        'total' => 'required',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservations::class, 'reservation_id', 'id');
    }

    public function ticket_type_price()
    {
        return $this->belongsTo(TicketTypePrices::class, 'ticket_type_price_id', 'id');
    }
}

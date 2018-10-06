<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketTypePrices extends Model
{
    protected $table = 'ticket_type_prices';

    protected $fillable = [
        'ticket_type_id',
        'flight_id',
        'price'
    ];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'ticket_type_id' => 'required|numeric',
        'flight_id' => 'required|numeric',
        'price' => 'required|numeric',
    ];

    public function flight()
    {
        return $this->hasOne(Flight::class, 'id', 'flight_id');
    }

    public function ticketType()
    {
        return $this->hasOne(TicketType::class, 'id', 'ticket_type_id');
    }

}

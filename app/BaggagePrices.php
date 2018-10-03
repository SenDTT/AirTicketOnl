<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaggagePrices extends Model
{
    protected $table = 'baggage_prices';

    protected $fillable = [
        'weight',
        'unit',
        'airline_id',
        'baggage_price'
    ];

    static public $rules = [
        'weight' => 'required|numeric',
        'unit' => 'required',
        'airline_id',
        'baggage_price' => 'required|numeric',
    ];
    public function airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id', 'id');
    }
}
